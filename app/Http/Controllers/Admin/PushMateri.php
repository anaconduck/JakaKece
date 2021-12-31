<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PushMateri extends Controller
{

    public $nav = [];
    public function __construct()
    {
        $this->nav = [
            [
                'title' => 'Materi',
                'link' => url('/admin/inkubasi/materi')
            ]
        ];
    }
    public function index(Request $request)
    {
        array_push($this->nav, [
            'title' => 'Tambah Materi',
            'link' => url('/admin/inkubasi/materi/create')
        ]);

        return view('admin.create-materi', [
            'title' => "Penambahan Materi",
            'nav' => $this->nav
        ]);
    }

    public function push(Request $request)
    {
        $request->validate([
            'judul' => 'required|bail',
            'sesi' => 'required|numeric|bail',
            'id_course' => 'required|numeric',
            'file' => 'mimetypes:video/mp4,image/jpeg,image/jpg,i,image/png,image/gif,application/msword,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/pdf',
            'transcript' => 'mimetypes:application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/pdf',
            'teks' => 'required'
        ]);

        $data = $request->only(['judul', 'sesi', 'id_course', 'file', 'teks']);
        if ($request->hasFile('file') and $request->file('file')->isValid()) {
            $name = time() . Str::random(10) . $request->file('file')->getClientOriginalName();
            $path = $request->file('file')->storeAs('materi', $name, 'public');
            $data['file'] = $path;
            if($request->hasFile('transcript') and $request->file('transcript')->isValid()){
                $name = time().Str::random(3).$request->file('transcript')->getClientOriginalName();
                $path = $request->file('transcript')->storeAs('materi/transcript',$name, 'public');
                $data['transcript'] = $path;
            }
            Materi::pushMateri($data);
            return redirect(url('/admin/inkubasi/materi'));
        }
        abort(500);
    }
}
