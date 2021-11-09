<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JawaraCenter;
use App\Models\JawaraEvent;
use Illuminate\Http\Request;

class JawaraPendaftarController extends Controller
{
    public function index($page = 1){
        $limit = 10;
        $offset = ($page-1)*$limit;
        return view('admin.jawara-pendaftar',[
            'title' => 'Pendaftar Jawara',
            'ind' => 1,
            'page' => $page,
            'pendaftar' => (JawaraCenter::show($offset,$limit)),
            'total' => ceil(JawaraCenter::count()/$limit)
        ]);
    }

    public function detail(JawaraCenter $pendaftar){

    }

    public function update(Request $request){

    }
}
