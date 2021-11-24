<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Practice;
use Illuminate\Http\Request;

class UpdatePractice extends Controller
{
    public $nav;
    public function __construct()
    {
        $this->nav = [
            [
                'title' => 'Update Practice',
                'link' => url('/admin/inkubasi/practice')
            ]
            ];
    }
    public function index(Practice $practice){
        if($practice == null){
            abort(404);
        }

        return view('admin.update-practice',[
            'title' => 'Update Practice',
            'nav' => $this->nav,
            'practice' => $practice
        ]);
    }
    public function update(){
    }
}
