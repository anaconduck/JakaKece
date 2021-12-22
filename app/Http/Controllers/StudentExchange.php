<?php

namespace App\Http\Controllers;

use App\Models\DeskripsiSistem;
use App\Models\ExchangeMataKuliah;
use App\Models\ExchangeMataKuliahTujuan;
use App\Models\ExchangePendaftar;
use App\Models\ExchangePersyaratan;
use App\Models\ExchangeTujuan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class StudentExchange extends Controller
{
    public $nav;
    public function __construct()
    {
        $this->nav = [
            [
                'title' => 'Student Exchange',
                'link' => url('/exchange')
            ]
        ];
    }
    public function index($message = [-2, null])
    {
        $slides = DeskripsiSistem::getDeskripsiSistem(config('app.fitur.exchange'));
        return view('exchange', [
            'title' => "Student Exchange",
            'exchange' => 'selected',
            'nav' => $this->nav,
            'message' => $message,
            'totalMahasiswaExchange' => 0,
            'totalExchangeEvent' => 0,
            'totalPendaftar' => 0,
            'slides' => $slides,
            'section' => Request('s')
        ]);
    }

    public function showPaket($lokasi, ExchangeTujuan $tujuan)
    {
        if (($lokasi != 'dn' and $lokasi != 'ln') or !$tujuan)
            abort(404);

        array_push($this->nav, [
            'title' => 'paket student exchange' . $tujuan->nama_universitas,
            'link' => url("/exchange/$lokasi/$tujuan->id")
        ]);

        $persyaratan = ExchangePersyaratan::lazy();

        $mk = ExchangeMataKuliah::getMK($tujuan->id);

        return view('exchange-paket', [
            'title' => 'Paket Student Exchange ' . $tujuan->nama_universitas,
            'exchange' => 'selected',
            'nav' => $this->nav,
            'tujuan' => $tujuan,
            'persyaratan' => $persyaratan,
            'lokasi' => $lokasi,
            'mk' => $mk
        ]);
    }

    public function showDaftar(Request $request, $lokasi, ExchangeTujuan $tujuan)
    {
        if (($lokasi != 'dn' and $lokasi != 'ln') or !$tujuan)
            abort(404);

        if (ExchangePendaftar::checkPendaftaran(auth()->user()->identity, $tujuan->id)) {
            return $this->index([1, 'Anda telah terdaftar. Tunggu info selanjutnya!']);
        }

        $mk = [];

        foreach ($request->all() as $ind => $val) {
            if (strpos($ind, 'mk') !== false) {
                array_push($mk, $val);
            }
        }

        if (sizeof($mk) === 0) return redirect()->back();

        $mk = ExchangeMataKuliah::filterMk($tujuan->id, $mk);

        if ($mk->count() == 0) abort(404);

        $mahasiswa = Mahasiswa::find(auth()->user()->identity);

        if (!$mahasiswa)
            return redirect('/home');

        array_push($this->nav, [
            'title' => 'pendaftaran student exchange' . $tujuan->nama_universitas,
            'link' => url("/exchange/$lokasi/$tujuan->id")
        ]);

        return view('pendaftaran-exchange', [
            'title' => 'Pendaftaran Student Exchange ' . $tujuan->nama_universitas,
            'exchange' => 'selected',
            'nav' => $this->nav,
            'tujuan' => $tujuan,
            'mahasiswa' => $mahasiswa,
            'mk' => $mk,
            'lokasi' => $lokasi
        ]);
    }

    public function daftar(Request $request, $lokasi, ExchangeTujuan $tujuan, $identity)
    {
        if (($lokasi != 'dn' and $lokasi != 'ln') or !$tujuan)
            abort(404);

        if (ExchangePendaftar::checkPendaftaran(auth()->user()->identity, $tujuan->id)) {
            return $this->index([1, 'Anda telah terdaftar. Tunggu info selanjutnya!']);
        }

        $mk = [];

        foreach ($request->all() as $ind => $val) {
            if (strpos($ind, 'mk') !== false) {
                array_push($mk, $val);
            }
        }
        if (sizeof($mk) === 0) return redirect()->back();

        $mk = ExchangeMataKuliah::filterMk($tujuan->id, $mk);
        $mkTujuan = [];
        foreach ($mk as $m) {
            array_push($mkTujuan, $m->id);
        }

        $mahasiswa = Mahasiswa::find(auth()->user()->identity);

        if (!$mahasiswa)
            return redirect('/home');

        $input = $request->file();
        $validator = Validator::make($input, [
            '*' => 'bail|required|max:10240|mimetypes:image/jpeg,image/jpg,image/png,image/gif,application/msword,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/pdf'
        ]);
        if ($validator->fails()) {
            return redirect('/exchange')
                ->withErrors($validator);
        }

        $fileU = [];

        if ($request->file()) {
            foreach ($request->file() as $key => $file) {
                $filename = time() . '_' . Str::random(10) . $file->getClientOriginalName();
                $filePath = $file->storeAs('berkas_student_exchange', $filename, 'local');
                $fileU[$key] = $filePath;
            }
            $pendaftar = new ExchangePendaftar([
                'identity' => $mahasiswa->id,
                'id_exchange_tujuan' => $tujuan->id,
                'file' => json_encode($fileU),
                'id_exchange_mata_kuliah' => json_encode($mkTujuan)
            ]);
            if ($pendaftar->save())
                return $this->index([1, 'Pendaftaran Anda berhasil!']);
        }
        return $this->index([0, 'Pendaftaran Anda gagal!']);
    }


    public function detail(ExchangeTujuan $tujuan)
    {
        if (!$tujuan) abort(404);

        $mk = ExchangeMataKuliah::getMK($tujuan->id);

        $dokumentasi = ExchangePendaftar::getDokumentasi($tujuan->id);

        array_push($this->nav, [
            'title' => 'Detail Tujuan SE - ' . $tujuan->nama_universitas,
            'link' => url("/exchange/riwayat/$tujuan->id")
        ]);
        return view('details-exchange', [
            'title' => 'Detail Tujuan SE - ' . $tujuan->nama_universitas,
            'tujuan' => $tujuan,
            'nav' => $this->nav,
            'exchange' => 'selected',
            'dokumentasi' => $dokumentasi,
            'mk' => $mk,
            'jumlahPendaftar' => ExchangePendaftar::jumlahPendaftar($tujuan->id)
        ]);
    }
}
