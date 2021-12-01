<?php

namespace App\Http\Controllers;

use App\Models\ExchangeTujuan;
use Illuminate\Http\Request;

class PushExchangeTujuan extends Controller
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

    public function index(){
        return view('admin.create-exchange-tujuan',[
            'title' => 'Tambah Tujuan SE',
            'nav' => $this->nav
        ]);
    }

    public function push(Request $request){
        $request->validate([
            'nama_universitas' => 'required',
            'dalam_negeri' => 'required|min:0|max:1'
        ]);

        $data = $request->only(['nama_universitas','dalam_negeri']);

        ExchangeTujuan::pushTujuan($data);
        return redirect('/admin/se/tujuan');
    }
}
