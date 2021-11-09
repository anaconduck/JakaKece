<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OJTPendaftar;
use Illuminate\Http\Request;

class OJTPendaftarController extends Controller
{
    public function index($page = 1){
        $limit = 10;
        $offset = ($page-1)*$limit;
        return view('admin.ojt-pendaftar',[
            'title' => 'Pendaftar OJT',
            'ind' => 1,
            'page' => $page,
            'pendaftar' => (OJTPendaftar::show($offset,$limit)),
            'total' => ceil(OJTPendaftar::count()/$limit)
        ]);
    }
}
