<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JawaraEvent;
use Illuminate\Http\Request;

class JawaraEventController extends Controller
{
    public function index($page = 1){
        $limit = 10;
        $offset = ($page-1)*$limit;
        return view('admin.jawara-event',[
            'title' => 'Jawara Event',
            'event' => JawaraEvent::showEvent($offset,$limit),
            'page' => $page,
            'total' => ceil(JawaraEvent::count()/$limit),
            'ind' => 1
        ]);
    }

    public function detail(JawaraEvent $event){

    }

    public function update(Request $request){
            
    }

    public function create(){

    }

    public function push(Request $request){

    }

}
