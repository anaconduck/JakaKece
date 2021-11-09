<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InkubasiBahasa;
use Illuminate\Http\Request;
use App\Models\Practice;

class PracticeController extends Controller
{
    public function index($page = 1){
        $limit = 10;
        $offset = ($page-1)*$limit;
        return view('admin.practice',[
            'title' => 'Practice',
            'ind' => 1,
            'quest' => Practice::showQuest($offset, $limit),
            'page' => $page,
            'total' => ceil(Practice::count()/$limit)
        ]);
    }

    public function detail(Practice $practice){
        $practice->opsi = explode('|',$practice->opsi);
        return view('admin.update-practice',[
            'title' => 'Update',
            'practice' => $practice
        ]);
    }

    public function update(Request $request, Practice $practice){

    }

    public function create(){
        return view('admin.create-quest',[
            'title' => 'Create Quest'
        ]);
    }

    public function push(Request $request, Practice $practice, $new = true){
        if(!InkubasiBahasa::find($request->input('type'))){

        }
        if($new){
            $practice = new Practice();
        }
        $data = $request->all();
        unset($data['token']);
        $practice->type = $data['type'];
        $practice->kategori = $data['kategori'];
        $practice->teks = $data['teks'];
        $practice->id_course = $request->input('nama_course');
        $practice->materi = $data['materi'];

        if($practice->save()){
            return $this->index();
        }
    }
}
