<?php

namespace App\Http\Controllers;

use App\Models\ExchangeMataKuliah;
use App\Models\ExchangeMataKuliahTujuan;
use App\Models\ExchangeTujuan;
use Illuminate\Http\Request;

class UpdateExchangeTujuan extends Controller
{
    public $nav;
    public function __construct()
    {
        $this->nav = [
            [
                'title' => 'Tujuan Student Exchange',
                'link' => url('/admin/se/tujuan')
            ]
            ];
    }

    public function index(ExchangeTujuan $tujuan){
        if(!$tujuan)
            abort(404);

        array_push($this->nav,[
            'title' => 'Update '. $tujuan->nama_universitas,
            'link' => url('/admin/se/tujuan/'.$tujuan->id)
        ]);

        $mk = ExchangeMataKuliahTujuan::getMataKuliahFrom($tujuan->id);
        dd($mk);
        return view('admin.update-exchange-tujuan',[
            'title' => 'Update '. $tujuan->nama_universitas,
            'nav' => $this->nav,
            'tujuan' => $tujuan,
            'mk' => $mk
        ]);
    }

    public function update(Request $request, ExchangeTujuan $tujuan){
        if(!$tujuan)
            abort(404);

        $request->validate([
            'nama_universitas' => 'required',
            'dalam_negeri' => 'required|min:0|max:1'
        ]);

        if($request->get('submit') == 'update'){
            $data = $request->only([
                'nama_universitas',
                'dalam_negeri'
            ]);
            $tujuan->nama_universitas = $data['nama_universitas'];
            $tujuan->dalam_negeri = $data['dalam_negeri'];
            if($tujuan->save())
                return redirect('/admin/se/tujuan');

        }
        else if($request->get('submit') == 'delete'){
            $tujuan->delete();
            return redirect('/admin/se/tujuan');
        }
        abort(500);
    }
}
