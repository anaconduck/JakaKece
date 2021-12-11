<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\ExchangeMataKuliah;
use App\Models\ExchangePendaftar;
use App\Models\ExchangeTujuan;
use App\Models\HistoryJawabanPractice;
use App\Models\HistoryJawabanTest;
use App\Models\HistoryPractice;
use App\Models\HistoryTest;
use App\Models\JawaraEvent;
use App\Models\JawaraPendaftar;
use App\Models\Mahasiswa;
use App\Models\OjtEvent;
use App\Models\OjtMataKuliah;
use App\Models\OjtPaket;
use App\Models\OjtPendaftar;
use App\Models\OjtTujuan;
use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class User extends Controller
{
    public $nav;
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->nav = [
            [
                'title' => 'User',
                'link' => url('/user')
            ],
            [
                'title' => 'Report',
                'link' => url('/user')
            ]
        ];
    }
    public function report(Request $request, HistoryPractice $historyPractice)
    {
        if ($historyPractice->identity != auth()->user()->identity)
            abort(404);

        $now = strtotime(now());
        $test = strtotime($historyPractice->created_at);

        $course = config("app.allCourse.$historyPractice->id_course");

        if (($now - $test) / 60 < config("app.totalTimeTest.$course")) {
            return redirect("/latihan/$course");
        }
        session()->forget('hasListenPractice');

        if (!$historyPractice->status_selesai) {
            $historyPractice->status_selesai = true;
            $historyPractice->save(['status_selesai']);
        }

        $info = [];
        switch (auth()->user()->status) {
            case "mahasiswa": {
                    $info = Mahasiswa::find(auth()->user()->identity);
                    break;
                }
            case "dosen": {
                    $info = Dosen::find(auth()->user()->identity);
                    break;
                }
            default: {
                    abort(404);
                }
        }
        $historyJawaban = HistoryJawabanPractice::showHistoryJawaban($historyPractice->id);
        array_push($this->nav, [
            'title' => 'Report ' . $historyPractice->id,
            'link' => url('/report/practice') . "/$historyPractice->id"
        ]);
        return view('report', [
            'title' => 'Report',
            'user_s' => 'selected',
            'course' => $course,
            'info' => $info,
            'history' => $historyPractice,
            'report' => $historyJawaban,
            'nav' => $this->nav,
        ]);
    }

    public function riwayatJawara()
    {
        $riwayat = JawaraPendaftar::riwayat(auth()->user()->identity, null, true);
        $this->nav[1] = [
            'title' => 'Riwayat Pendaftaran Jawara',
            'link' => url('/user/riwayat-jawara')
        ];
        return view('riwayat-jawara', [
            'title' => 'Riwayat Pendaftaran Jawara',
            'nav' => $this->nav,
            'riwayat' => $riwayat,
            'user_s' => 'selected'
        ]);
    }

    public function riwayatJawaraPendaftar(JawaraPendaftar $pendaftar)
    {
        if (!$pendaftar)
            abort(404);

        else if (strpos($pendaftar->id_mahasiswa, auth()->user()->identity) === false) {
            abort(404);
        }

        $event = JawaraEvent::find($pendaftar->id_jawara_event);
        $dosen = Dosen::find($pendaftar->id_dosen);
        $nim = json_decode($pendaftar->id_mahasiswa, false);
        $mahasiswa = ModelsUser::getMahasiswa($nim);

        $this->nav[1] = [
            'title' => 'Riwayat Pendaftaran Jawara',
            'link' => url('/user/riwayat-jawara')
        ];
        array_push($this->nav, [
            'title' => $event->nama,
            'link' => url('/user/riwayat-jawara/' . $pendaftar->id)
        ]);
        if ($pendaftar->file)
            $pendaftar->file = json_decode($pendaftar->file, false);

        return view('riwayat-jawara-pendaftar', [
            'title' => 'Riwayat Jawara ' . $event->nama,
            'nav' => $this->nav,
            'user_s' => 'selected',
            'pendaftar' => $pendaftar,
            'event' => $event,
            'dosen' => $dosen,
            'mahasiswa' => $mahasiswa,
            'ind' => 1
        ]);
    }

    public function updateRiwayatJawaraPendaftar(Request $request, JawaraPendaftar $pendaftar)
    {
        if (!$pendaftar)
            abort(404);

        else if (strpos($pendaftar->id_mahasiswa, auth()->user()->identity) === false) {
            abort(404);
        }


        $request->validate([
            'delete' => 'numeric',
            'file' => 'mimetypes:application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/jpeg,video/mp4,video/mpeg,image/png,application/pdf,application/vnd.ms-powerpoint,application/vnd.openxmlformats-officedocument.presentationml.presentation,application/vnd.rar, video/webm, application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,	application/zip'
        ]);
        if ($request->has('delete')) {
            $ind = $request->only('delete')['delete'];
            $file = null;
            if ($pendaftar->file) {
                $file = json_decode($pendaftar->file, false);
            }
            if ($ind < 0 or $ind >= sizeof($file))
                abort(500);

            Storage::delete($file[$ind]);

            array_splice($file, $ind, 1);
            $pendaftar->file = json_encode($file);

            if ($pendaftar->save(['file'])) {
                return redirect()->back();
            }
        } else if ($request->has('file')) {
            if (!$request->file('file')->isValid())
                abort(500);

            $name = time() . Str::random(4) . $request->file('file')->getClientOriginalName();

            $path = 'storage/' . $request->file('file')->storeAs("riwayat/jawara", $name, 'public');

            $file = json_decode($pendaftar->file, false);
            if ($file == null) $file = [];
            array_push($file, $path);
            $pendaftar->file = json_encode($file);

            if ($pendaftar->save(['file'])) {
                return redirect()->back();
            }
        }
        abort(500);
    }

    public function riwayatLatihan()
    {
        $riwayat = HistoryPractice::allWithIdentity(auth()->user()->identity, null, true);
        $this->nav[1] = [
            'title' => 'Riwayat Latihan',
            'link' => url('/user/riwayat-latihan')
        ];
        return view('riwayat-latihan', [
            'title' => 'Riwayat Latihan',
            'nav' => $this->nav,
            'riwayat' => $riwayat,
            'ind' => 0,
            'user_s' => 'selected'
        ]);
    }

    public function detailRiwayatLatihan(HistoryPractice $riwayat)
    {
        if (!$riwayat) abort(404);

        else if ($riwayat->identity != auth()->user()->identity) abort(404);

        $now = strtotime(now());
        $test = strtotime($riwayat->created_at);

        $course = config("app.allCourse.$riwayat->id_course");
        if ($riwayat->pendek) {
            $sesi = HistoryJawabanPractice::getHistoryJawaban($riwayat->id)->sesi;
            if (($now - $test) / 60 < config("app.$course")[$sesi]['time']) {

                return redirect("/latihan/$course/" . config("app.$course")[$sesi]['sesi'] . '/pendek');
            }
        } else {
            if (($now - $test) / 60 < config("app.totalTimeTest.$course")) {
                return redirect("/latihan/$course");
            }
        }

        if (!$riwayat->status_selesai) {
            $riwayat->status_selesai = true;
            $riwayat->save(['status_selesai']);
        }

        $this->nav[1] = [
            'title' => 'Riwayat Latihan',
            'link' => url('/user/riwayat-latihan')
        ];

        array_push($this->nav, [
            'title' => config('app.allCourse.' . $riwayat->id_course),
            'link' => url('/user/riwayat-latihan/' . $riwayat->id)
        ]);

        $report = HistoryJawabanPractice::showHistoryJawaban($riwayat->id)->toArray();
        return view('report', [
            'title' => 'Hasil Latihan ' . config('app.allCourse.' . $riwayat->id_course),
            'nav' => $this->nav,
            'user_s' => 'selected',
            'riwayat' => $riwayat,
            'report' => $report,
            'info' => Mahasiswa::find($riwayat->identity),
            'course' => config('app.allCourse.' . $riwayat->id_course),
            'counter' => 0,
            'tipe' => 'Latihan'
        ]);
    }

    public function riwayatTest()
    {
        $riwayat = HistoryTest::riwayat(auth()->user()->identity, null, true);

        $this->nav[1] = [
            'title' => 'Riwayat Test',
            'link' => url('/user/riwayat-test')
        ];

        return view('riwayat-test', [
            'title' => 'Riwayat Latihan',
            'nav' => $this->nav,
            'riwayat' => $riwayat,
            'ind' => 0,
            'user_s' => 'selected'
        ]);
    }

    public function detailRiwayatTest(HistoryTest $riwayat)
    {
        if (!$riwayat) abort(404);

        else if ($riwayat->identity != auth()->user()->identity) abort(404);

        $this->nav[1] = [
            'title' => 'Riwayat Test',
            'link' => url('/user/riwayat-test')
        ];

        array_push($this->nav, [
            'title' => config('app.allCourse.' . $riwayat->id_course),
            'link' => url('/user/riwayat-test/' . $riwayat->id)
        ]);

        $report = HistoryJawabanTest::showHistoryJawaban($riwayat->id)->toArray();
        return view('report', [
            'title' => 'Hasil Test ' . config('app.allCourse.' . $riwayat->id_course),
            'nav' => $this->nav,
            'user_s' => 'selected',
            'riwayat' => $riwayat,
            'report' => $report,
            'info' => Mahasiswa::find($riwayat->identity),
            'course' => config('app.allCourse.' . $riwayat->id_course),
            'counter' => 0,
            'tipe' => 'Test'
        ]);
    }

    public function riwayatSE()
    {
        $riwayat = ExchangePendaftar::riwayat(auth()->user()->identity, null, true);

        $this->nav[1] = [
            'title' => 'Riwayat SE',
            'link' => url('/user/riwayat-se')
        ];
        return view('riwayat-se', [
            'title' => "Riwayat SE",
            'nav' => $this->nav,
            'riwayat' => $riwayat,
            'user_s' => 'selected'
        ]);
    }

    public function detailRiwayatSE(ExchangePendaftar $riwayat)
    {
        if (!$riwayat) abort(404);
        elseif ($riwayat->identity !== auth()->user()->identity) abort(404);

        $tujuan = ExchangeTujuan::find($riwayat->id_exchange_tujuan);
        $mk = ExchangeMataKuliah::find(json_decode($riwayat->id_exchange_mata_kuliah, false));
        $riwayat->file = json_decode($riwayat->file, true);
        $dokumentasi = [];
        for ($i = 0; $i < sizeof($riwayat->file); $i++) {
            if (array_key_exists('_'.$i, $riwayat->file)) {
                array_push($dokumentasi, $riwayat->file['_'.$i]);
            } else break;
        }

        $this->nav[1] = [
            'title' => 'Riwayat SE',
            'link' => url('/user/riwayat-se')
        ];

        array_push($this->nav, [
            'title' => $tujuan->nama_universitas,
            'link' => url('/user/riwayat-se/' . $riwayat->id)
        ]);
        return view('details-riwayat-exchange', [
            'title' => 'Detail riwayat SE ' . $tujuan->nama_universitas,
            'nav' => $this->nav,
            'tujuan' => $tujuan,
            'riwayat' => $riwayat,
            'mk' => $mk,
            'dokumentasi' => $dokumentasi,
            'user_s' => 'selected'
        ]);
    }

    public function updateRiwayatSE(Request $request, ExchangePendaftar $riwayat)
    {
        if (!$riwayat) abort(404);
        else if ($riwayat->identity !== auth()->user()->identity) abort(404);

        $request->validate([
            'delete' => 'numeric',
            'file' => 'mimetypes:application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/jpeg,video/mp4,video/mpeg,image/png,application/pdf,application/vnd.ms-powerpoint,application/vnd.openxmlformats-officedocument.presentationml.presentation,application/vnd.rar, video/webm, application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,	application/zip'
        ]);
        $riwayat->file = json_decode($riwayat->file, true);

        if ($request->has('delete')) {
            $ind = $request->only('delete')['delete'];
            if (array_key_exists('_'.$ind, $riwayat->file)) {
                Storage::delete($riwayat->file['_'.$ind]);
                $file = $riwayat->file;
                unset($file['_'.$ind]);
                $size = sizeof($file) - sizeof(config('app.dokumentasi'));
                for ($i = $ind; $i < $size; $i++) {
                    $file['_'.$ind] = $file['_'.($ind + 1)];
                }
                unset($file['_'.($size)]);
                $riwayat->file = json_encode($file);
                if ($riwayat->save(['file']))
                    return redirect()->back();
            }
            abort(500);
        } else if ($request->has('file')) {
            if (!$request->file('file')->isValid())
                abort(500);

            $name = time() . Str::random(4) . $request->file('file')->getClientOriginalName();

            $path = 'storage/' . $request->file('file')->storeAs("riwayat/exchange", $name, 'public');

            $ind = sizeof($riwayat->file) - sizeof(config('app.dokumentasi'));
            $file = $riwayat->file;
            $file['_'.$ind] = $path;
            $riwayat->file = json_encode($file);
            if ($riwayat->save(['file'])) return redirect()->back();
        }
        abort(500);
    }

    public function riwayatMagang()
    {
        $riwayat = OjtPendaftar::riwayat(auth()->user()->identity, null, true);

        $this->nav[1] = [
            'title' => 'Riwayat Magang',
            'link' => url('/user/riwayat-magang')
        ];
        return view('riwayat-ojt', [
            'title' => 'Riwayat Magang',
            'nav' => $this->nav,
            'riwayat' => $riwayat,
            'user_s' => 'selected'
        ]);
    }
    public function detailRiwayatMagang(OjtPendaftar $riwayat)
    {
        if (!$riwayat) abort(404);
        else if ($riwayat->identity !== auth()->user()->identity) abort(404);

        $paket = OjtPaket::find($riwayat->id_paket);
        $tujuan = OjtTujuan::find($paket->id_ojt_tujuan);
        $event = OjtEvent::find($paket->id_ojt_event);
        $mk = OjtMataKuliah::getMatkul($paket->id_ojt_event);

        $this->nav[1] = [
            'title' => 'Riwayat Magang',
            'link' => url('/user/riwayat-magang')
        ];
        array_push($this->nav, [
            'title' => $tujuan->nama_instansi,
            'link' => url('/user/riwayat-magang/' . $riwayat->id)
        ]);
        $dokumentasi = [];
        if ($riwayat->file) {
            $riwayat->file = json_decode($riwayat->file, true);

            for ($i = 0; $i < sizeof($riwayat->file); $i++) {
                if (array_key_exists('_'.$i, $riwayat->file)) {
                    array_push($dokumentasi, $riwayat->file['_'.$i]);
                } else break;
            }
        }

        return view('details-riwayat-magang', [
            'title' => 'Riwayat Magang ' . $tujuan->nama_instansi,
            'nav' => $this->nav,
            'user_s' => 'selected',
            'tujuan' => $tujuan,
            'event' => $event,
            'mk' => $mk,
            'riwayat' => $riwayat,
            'dokumentasi' => $dokumentasi
        ]);
    }

    public function updateRiwayatMagang(Request $request, OjtPendaftar $riwayat){
        if(!$riwayat) abort(404);
        elseif($riwayat->identity !== auth()->user()->identity) abort(404);

        $request->validate([
            'delete' => 'numeric',
            'file' => 'mimetypes:application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/jpeg,video/mp4,video/mpeg,image/png,application/pdf,application/vnd.ms-powerpoint,application/vnd.openxmlformats-officedocument.presentationml.presentation,application/vnd.rar, video/webm, application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,	application/zip'
        ]);
        $riwayat->file = json_decode($riwayat->file, true);

        if(!$riwayat->file) $riwayat->file = [];

        if ($request->has('delete')) {
            $ind = $request->only('delete')['delete'];
            if (array_key_exists('_'.$ind, $riwayat->file)) {
                Storage::delete($riwayat->file['_'.$ind]);
                $file = $riwayat->file;
                unset($file['_'.$ind]);
                $size = sizeof($file) - sizeof(config('app.dokumentasi_ojt'));
                for ($i = $ind; $i < $size; $i++) {
                    $file['_'.$ind] = $file['_'.($ind + 1)];
                }
                unset($file['_'.$size]);
                $riwayat->file = json_encode($file);
                if ($riwayat->save(['file']))
                    return redirect()->back();
            }
            abort(500);
        } else if ($request->has('file')) {
            if (!$request->file('file')->isValid())
                abort(500);

            $name = time() . Str::random(4) . $request->file('file')->getClientOriginalName();

            $path = 'storage/' . $request->file('file')->storeAs("riwayat/magang", $name, 'public');

            $ind = sizeof($riwayat->file) - sizeof(config('app.dokumentasi_ojt'));
            $file = $riwayat->file;
            $file['_'.$ind] = $path;
            $riwayat->file = json_encode($file);
            if ($riwayat->save(['file'])) return redirect()->back();
        }
        abort(500);
    }

    public function index()
    {
        $user = auth()->user();
        $mahasiswa = Mahasiswa::find($user->identity);
        $report = HistoryPractice::allWithIdentity($user->identity, 3);
        $reportTest = HistoryTest::riwayat($user->identity, 3);
        $jawara = JawaraPendaftar::riwayat($user->identity, 3);
        $exchange = ExchangePendaftar::riwayat($user->identity, 3);
        $ojt = OjtPendaftar::riwayat($user->identity, 3);
        array_pop($this->nav);
        return view('user', [
            'title' => 'User',
            'user_s' => 'selected',
            'user' => $user,
            'mahasiswa' => $mahasiswa,
            'jawara' => $jawara,
            'data' => $report,
            'nav' => $this->nav,
            'reportTest' => $reportTest,
            'exchange' => $exchange,
            'ojt' => $ojt
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('home');
    }
}
