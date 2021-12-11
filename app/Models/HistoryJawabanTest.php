<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HistoryJawabanTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_history_practice',
        'daftar_soal',
        'sesi'
    ];

    public $attributes = [
        'daftar_jawaban' => '[]',
        'jumlah_benar' => 0
    ];

    public static function lastHistoryJawaban($idHistoryJawaban){
        return self::where('id_history_test',$idHistoryJawaban)
            ->orderBy('created_at','desc')
            ->first();
    }

    public static function makeHistoryJawaban($idHistoryTest, $sesi, $size){
        $h = new HistoryJawabanTest([
            'id_history_test' => $idHistoryTest,
            'daftar_soal' => self::generateSoal($size),
            'sesi' => $sesi
        ]);
        if($h->save()){
            return $h;
        }
        return false;
    }
    public static function generateSoal($size){
        $daftar = range(1, $size);
        shuffle($daftar);
        return json_encode($daftar);
    }

    public static function getHistoryJawaban($idHistoryTest, $sesi){
        return self::where('id_history_test', $idHistoryTest)
            ->where('sesi',$sesi)
            ->first();
    }

    public static function jawab($idHistoryTest, $sesi, $jawaban, $up = 0){
        $q = DB::table('history_jawaban_tests')
            ->where('id_history_test', $idHistoryTest)
            ->where('sesi', $sesi);

        if($up == -1)
            return $q->decrement('jumlah_benar',1,['daftar_jawaban'=>$jawaban]);
        else if($up == 0)
            return $q->update(['daftar_jawaban'=>$jawaban]);
        else if($up == 1)
            return $q->increment('jumlah_benar',1,['daftar_jawaban'=>$jawaban]);
        return false;
    }

    public static function showHistoryJawaban($idHistoryTest){
        return self::where('id_history_test',$idHistoryTest)
            ->orderBy('sesi','desc')
            ->get();
    }
}
