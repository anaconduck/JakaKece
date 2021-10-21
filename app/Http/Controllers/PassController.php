<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PassController extends Controller
{
   //
   public function passdaftarjc($id)
   {
      return view('daftarjc', ['id' => $id]);
   }
   public function passpe($id)
   {
      return view('detailspe', ['id' => $id]);
   }
   public function passpm($id)
   {
      return view('detailspm', ['id' => $id]);
   }
   public function passem($id)
   {
      return view('detailsem', ['id' => $id]);
   }
   public function passet($id)
   {
      return view('detailset', ['id' => $id]);
   }
   public function passdaftarojt($id)
   {
      return view('daftarojt', ['id' => $id]);
   }
   public function passpojt($id)
   {
      return view('detailspojt', ['id' => $id]);
   }
   public function passojtm($id)
   {
      return view('detailsojtm', ['id' => $id]);
   }
   public function passojtt($id)
   {
      return view('detailsojtt', ['id' => $id]);
   }
}
