<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PushTest extends Controller
{
    public $nav;
    public function __construct()
    {
        $this->nav = [
            [
                'title' => 'Test',
                'link' => url('/admin/inkubasi/test')
            ],
            [
                'title' => 'Tambah Soal Test',
                'link' => url('/admin/inkubasi/test/create')
            ]
            ];
    }

    public function index(){
        return view('admin.create-quest',[
            'title' => 'Tambah Soal Test',
            'nav' => $this->nav
        ]);
    }

    public function push(Request $request){
        $request->validate([
            'id_course' => 'required|numeric|min:1|max:4',
            'sesi' => 'required|numeric|min:0|max:5',
            'soal' => 'required',
            'tipe' => 'required',
            'opsi1' => 'required',
            'jawaban' => 'required',
            'file' => 'mimetypes:audio/mpeg|max:10240'
        ]);

        $data = $request->only(['id_course','sesi','soal','tipe','opsi1','opsi2','opsi3','opsi4','jawaban','teks']);
        if($request->hasFile('file')){
            $name = time().Str::random(10).$request->file("file")->getClientOriginalName();
            $course = config('app.allCourse.'.$request->get('id_course'));
            $sesi = config('app.allSesi')[$request->get('sesi')-1];
            $path = $request->file('file')->storeAs("$course/$sesi",$name, 'public');
            $data['file'] = $path;
            Test::pushTest($data);
            return redirect(url('/admin/inkubasi/test'));
        }else{
            Test::pushTest($data);
            return redirect(url('/admin/inkubasi/test'));
        }
        abort(500);
    }
}
