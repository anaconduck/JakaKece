<?php

namespace App\Http\Controllers;

use App\Models\ExchangeTujuan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        array_push($this->nav, [
            'title' => "Tambah Tujuan SE",
            'link' => url('/admin/se/tujuan/create')
        ]);
        return view('admin.create-exchange-tujuan',[
            'title' => 'Tambah Tujuan SE',
            'nav' => $this->nav
        ]);
    }

    public function push(Request $request){
        $request->validate([
            'nama_universitas' => 'required',
            'dalam_negeri' => 'required|min:0|max:1',
            'file_penjelas' => 'bail|required|max:10240|mimetypes:jpeg,jpg,png,gif,application/msword,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/pdf'
        ]);

        $data = $request->only(['nama_universitas','dalam_negeri']);

        if($request->hasFile('file_penjelas')){
            $name = time().Str::random(2).$request->file('file_penjelas')->getClientOriginalName();
            $path = $request->file('file_penjelas')->storeAs('exchange/tujuan',$name, 'local');
            $data['file_penjelas'] = $path;
        }
        ExchangeTujuan::pushTujuan($data);
        return redirect('/admin/se/tujuan');
    }
}
