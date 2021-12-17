<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UpdateBerita extends Controller
{
    public $nav;

    public function __construct()
    {
        $this->nav = [
            [
                'title' => 'Berita',
                'link' => url('/admin/berita')
            ]
            ];
    }

    public function index(Berita $berita){
        if(!$berita) abort(404);

        array_push($this->nav, [
            'title' => 'Update Berita-'.$berita->id,
            'link' => url('/admin/berita/'.$berita->id)
        ]);

        return view('admin.update-berita', [
            'title' => 'Update Berita-'.$berita->id,
            'nav' => $this->nav,
            'berita' => $berita
        ]);
    }

    public function update(Request $request, Berita $berita){
        if(!$berita) abort(404);

        $request->validate([
            'judul' => 'required|string',
            'deskripsi' => 'required|string',
            'tipe' => 'required|min:1|max:2',
            'file' => 'mimetypes:video/avi,video/mpeg,video/x-msvideo,image/jpeg',
            'display' => 'required|boolean'
        ]);

        $data = $request->only([
            'judul', 'deskripsi', 'tipe', 'display'
        ]);
        if($request->hasFile('file')){
            Storage::delete($berita->file);

            $name = time().Str::random(3).$request->file('file')->getClientOriginalName();
            $path = $request->file('file')->storeAs('berita', $name, 'public');
            $data['file'] = $path;
        }
        $data['updated_at'] = now();

        DB::beginTransaction();
        $status = DB::table('beritas')->where('id', $berita->id)
            ->update($data);
        DB::commit();
        if($status) return redirect('/admin/berita');
        abort(404);
    }
}
