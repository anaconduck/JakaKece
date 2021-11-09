<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentExchange;
use Illuminate\Http\Request;

class ExchangePendaftarController extends Controller
{
    public function index($page = 1){
        $limit = 10;
        $offset = ($page-1) * $limit;

        return view('admin.exchange-pendaftar',[
            'title' => 'Pendaftar Student Exchange',
            'page' => $page,
            'ind' => 1,
            'pendaftar' => (StudentExchange::show($offset,$limit)),
            'total' => ceil(StudentExchange::count()/$limit)
        ]);
    }
}
