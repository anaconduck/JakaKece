<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PassController extends Controller
{
    //
    public function passpe($id)
    {
       return view('detailspe',['id'=>$id]);
 
}public function passpm($id)
{
   return view('detailspm',['id'=>$id]);

}
public function passem($id)
    {
       return view('detailsem',['id'=>$id]);
 
}public function passet($id)
{
   return view('detailset',['id'=>$id]);

}
}
