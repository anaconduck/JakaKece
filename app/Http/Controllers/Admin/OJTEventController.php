<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OJT;
use Illuminate\Http\Request;

class OJTEventController extends Controller
{
    public function index($page = 1){
        $limit = 10;
        $offset = ($page- 1)* $limit;
        return view('admin.ojt-event',[
            'title' => 'Event OJT',
            'page' => $page,
            'ind' => 1,
            'event' => OJT::show($offset,$limit),
            'total' => ceil(OJT::count()/$limit)
        ]);
    }
}
