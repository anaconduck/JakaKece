<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PushBerita extends Controller
{
    public $nav;

    public function __construct()
    {
        $this->nav = [
            [
                'title' => 'Berita',
                'link' => url('/admin/berita')
            ],
            [
                'title' => 'Tambah Berita',
                'link' => url('/admin/berita/create')
            ]
            ];
    }

    public function index(){
        return view('admin.push-berita',[
            'title' => 'Tambah Berita',
            'nav' => $this->nav
        ]);
    }

    public function push(Request $request){
        $request->validate([
            'judul' => 'required|string',
            'deskripsi' => 'required|string',
            'tipe' => 'required|min:1|max:2',
            'file' => 'required|mimetypes:video/avi,video/mpeg,video/x-msvideo,image/jpeg',
            'display' => 'required|boolean'
        ]);

        $data = $request->only([
            'judul', 'deskripsi', 'tipe', 'display'
        ]);
        if($request->hasFile('file')){
            $name = time().Str::random(3).$request->file('file')->getClientOriginalName();
            $path = $request->file('file')->storeAs('berita', $name, 'public');
            $data['file'] = $path;
        }
        $data['created_at'] = now();
        DB::beginTransaction();
        $status = DB::table('beritas')->insert($data);
        DB::commit();
        if($status) return redirect('/admin/berita');

        abort(404);
    }
}
