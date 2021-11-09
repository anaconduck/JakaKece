<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExchangeEvent;
use Illuminate\Http\Request;

class ExchangeEventController extends Controller
{
    public function index($page = 1){
        $limit = 10;
        $offset = ($page - 1) * $limit;
        return view('admin.exchange-event',[
            'title' => 'Event Student Exchange',
            'event' => ExchangeEvent::show($offset, $limit),
            'page' => $page,
            'total' => ceil(ExchangeEvent::count()/$limit),
            'ind' => 1
        ]);
    }

    public function create(){

    }
}
