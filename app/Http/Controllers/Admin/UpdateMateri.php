<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UpdateMateri extends Controller
{
    public $nav;

    public function __construct()
    {
        $this->nav = [
            [
                'title' => 'Materi',
                'link' => url('/admin/inkubasi/materi')
            ]
        ];
    }

    public function index(Materi $materi)
    {
        if ($materi == null)
            abort(404);

        array_push($this->nav, [
            'title' => 'Update Materi',
            'link' => url('/inkubasi/materi/' . $materi->id)
        ]);

        return view('admin.update-materi', [
            'title' => 'Update Materi',
            'nav' => $this->nav,
            'materi' => $materi
        ]);
    }

    public function update(Request $request, Materi $materi)
    {
        if ($materi == null)
            abort(404);
        if ($request->get('submit') == 'update') {
            $request->validate([
                'judul' => 'required|bail',
                'sesi' => 'required|numeric|bail',
                'id_course' => 'required|numeric',
                'file' => 'mimetypes:jpeg,jpg,png,gif,application/msword,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/pdf',
                'teks' => 'required'
            ]);

            $data = $request->only(['judul', 'sesi', 'id_course', 'teks']);
            if ($request->hasFile('file') and $request->file('file')->isValid()) {
                if ($materi->file) {
                    Storage::delete('$materi->file');
                }
                $name = time() . Str::random(10) . $request->file('file')->getClientOriginalName();
                $path = $request->file('file')->storeAs('materi', $name, 'public');
                $materi->file = $path;
            }

            $materi->judul = $data['judul'];
            $materi->sesi = $data['sesi'];
            $materi->id_course = $data['id_course'];
            $materi->teks = $data['teks'];
            $materi->save();
            if ($materi->isClean())
                return redirect(url('/admin/inkubasi/materi'));
        }
        else if($request->get('submit') == 'delete'){
            $materi->delete();
            return redirect(url('/admin/inkubasi/materi'));
        }

        abort(500);
    }
}
