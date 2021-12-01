<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Practice;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PushPractice extends Controller
{
    public $nav;
    public function __construct()
    {
        $this->nav = [
            [
                'title' => 'Practice',
                'link' => url('/admin/inkubasi/practice')
            ],
            [
                'title' => 'Tambah Practice',
                'link' => url('/admin/inkubasi/practice/create')
            ]
            ];
    }
    public function index(){
        return view('admin.create-quest',[
            'title' => "Tambah Practice",
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
            Practice::pushPractice($data);
            return redirect(url('/admin/inkubasi/practice'));
        }else{
            Practice::pushPractice($data);
            return redirect(url('/admin/inkubasi/practice'));
        }
        abort(500);
    }
}
