<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InkubasiBahasa;
use App\Models\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function index($page = 1){
        $limit = 6;
        $offset = ($page-1)*$limit;
        return view('admin.materi',[
            'title' => 'Materi',
            'materi' => Materi::showMateri($offset, $limit),
            'total' => ceil(Materi::count()/$limit),
            'ind' => 1,
            'page' => $page
        ]);
    }

    public function detail(Materi $materi){
        return view('admin.update-materi',[
            'title' => 'Update',
            'materi' => $materi
        ]);
    }

    public function update(Request $request,Materi $materi){
        if(!$materi){
            return $this->index();
        }
        else if(!$request->has("delete")){
            return $this->push($request, $materi, false);
        }
        $materi->delete();
        return $this->index();
    }

    public function create(){
        return view('admin.create-materi',[
            'title' => 'Create'
        ]);
    }

    public function push(Request $request,Materi $materi, $new = true){
        if(!InkubasiBahasa::find($request->input('nama_course'))){

        }
        if($new){
            $materi = new Materi();
        }
        $data = $request->all();
        unset($data['token']);
        $materi->title = $data['title'];
        $materi->teks = $data['teks'];
        $materi->id_course = $request->input('nama_course');
        $materi->materi = $data['materi'];

        if($materi->save()){
            return $this->index();
        }

    }
}
