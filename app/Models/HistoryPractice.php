<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HistoryPractice extends Model
{
    use HasFactory;

    protected $fillable = [
        'identity',
        'id_course',
    ];
    public $attributes =[
        'status_selesai' => false
    ];
    public static function getLastPractice($idCourse){
        return self::where('identity', auth()->user()->identity)
            ->where('id_course',$idCourse)
            ->orderBy('created_at','desc')
            ->first();
    }

    public static function makeHistoryPractice($identity, $course){
        $idCourse = config('app.indexCourse')[$course];
        $h = new HistoryPractice([
            'identity' => $identity,
            'id_course' => $idCourse
        ]);

        DB::beginTransaction();
        $h->save();
        $size = config('app.'.$course)[0]['num'];
        $historyJawaban = HistoryJawabanPractice::makeHistoryJawaban($h->id,0,$size);
        DB::commit();

        return [$h, $historyJawaban];
    }

    public static function countPractice($identity){
        return self::selectRaw('id_course ,count(id_course) as jumlah')
            ->where('identity',$identity)
            ->groupBy('id_course')
            ->get()->toArray();
    }

    public static function report($identity){
        return self::join('history_jawaban_practices','history_practices.id','=','history_jawaban_practices.id_history_practice')
            ->where('history_practices.identity', $identity)
            ->orderBy('history_practices.created_at','desc')
            ->get();
    }
    public static function allWithIdentity($identity){
        return self:: where('identity', $identity)
            ->get();
    }

    public static function countTaker(){
        return self::selectRaw('distinct identity')
            ->get()->count();
    }

    public static function mean($idCourse){
        return self::selectRaw('history_practices.*, sum(jumlah_benar)')
            ->join('history_jawaban_practices','history_practices.id', '=' , 'history_jawaban_practices.id_history_practice')
            ->groupBy('history_practices.id')
            ->get();
    }
}
