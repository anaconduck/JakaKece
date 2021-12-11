<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Mail as MailMail;
use App\Models\ExchangeTanya;
use App\Models\JawaraTanya;
use App\Models\OjtTanya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TanyaAdmin extends Controller
{
    public function jawab($menu, $id){
        $pertanyaan = null;
        if($menu == 'jawara'){
            $pertanyaan = JawaraTanya::find($id);
        }elseif($menu == 'se'){
            $pertanyaan = ExchangeTanya::find($id);
        }elseif($menu == 'ojt'){
            $pertanyaan = OjtTanya::find($id);
        }
        if($pertanyaan == null) abort(404);

        return view('admin.tanya-admin',[
            'title' => 'Jawab Pertanyaan',
            'id' => $id,
            'pertanyaan' => $pertanyaan
        ]);
    }

    public function kirim(Request $request, $menu, $id){
        $pertanyaan = null;
        if($menu == 'jawara'){
            $pertanyaan = JawaraTanya::find($id);
        }elseif($menu == 'exchange'){
            $pertanyaan = ExchangeTanya::find($id);
        }elseif($menu == 'ojt'){
            $pertanyaan = OjtTanya::find($id);
        }
        if($pertanyaan == null) abort(404);

        $request->validate([
            'jawaban' => 'required|max:256'
        ]);

        $details = [
            'pertanyaan' => $pertanyaan->pertanyaan,
            'jawaban' => $request->get('jawaban')
        ];

        Mail::to($pertanyaan->email)->send(new MailMail($details));

        $pertanyaan->jawaban = $request->get('jawaban');
        $pertanyaan->terjawab = true;
        if($pertanyaan->save()){
            return redirect(url("/admin/$menu/tanya"));
        }
        abort(500);
    }
}
