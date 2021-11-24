<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HistoryJawabanPractice extends Model
{
    use HasFactory;

    protected $fillable =[
        'id_history_practice',
        'daftar_soal',
        'sesi'
    ];

    public $attributes =[
        'daftar_jawaban' => '[]',
        'jumlah_benar' => 0
    ];

    public static function lastHistoryJawaban($idHistoryPractice){
        return self::where('id_history_practice',$idHistoryPractice)
            ->orderBy('created_at','desc')
            ->first();
    }

    public static function makeHistoryJawaban($idHistoryPractice, $sesi ,$size){
        $h = new HistoryJawabanPractice([
            'id_history_practice' => $idHistoryPractice,
            'daftar_soal' => self::generateSoal($size),
            'sesi' => $sesi
        ]);
        if($h->save()){
            return $h;
        }
        return false;
    }

    public static function generateSoal($size){
        $daftar = range(1,$size);
        shuffle($daftar);
        $daftar[0] = 1;
        $daftar[1] = 2;
        return json_encode($daftar);
    }

    public static function getHistoryJawaban($idHistoryPractice, $sesi){
        return self::where('id_history_practice',$idHistoryPractice)
            ->where('sesi', $sesi)
            ->first();
    }

    public static function jawab($idHistoryPractice, $sesi, $jawaban, $up = 0){
        $q = DB::table('history_jawaban_practices')
        ->where('id_history_practice',$idHistoryPractice)
        ->where('sesi',$sesi);
        if($up == -1)
            return $q->decrement('jumlah_benar',1,['daftar_jawaban'=>$jawaban]);
        else if($up == 0)
            return $q->update(['daftar_jawaban'=> $jawaban]);
        else if($up == 1){
            return $q->increment('jumlah_benar',1, ['daftar_jawaban'=>$jawaban]);
        }
        return false;
    }

    public static function showHistoryJawaban($idHistoryPractice){
        return self::where('id_history_practice',$idHistoryPractice)
            ->get();
    }
}
