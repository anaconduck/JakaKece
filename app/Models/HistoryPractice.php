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
        'full_sesi',
        'pendek'
    ];
    public $attributes = [
        'status_selesai' => false,
        'full_sesi' => true,
        'pendek' => false
    ];
    public static function getLastPractice($idCourse, $sesi = true, $tipe = null)
    {
        $query = self::where('identity', auth()->user()->identity)
            ->where('id_course', $idCourse)
            ->where('full_sesi', $sesi);
        if ($tipe !== null) $query = $query->where('pendek', $tipe);
        return $query->where('status_selesai', false)
            ->first();
    }

    public static function makeHistoryPractice($identity, $course, $fullSesi = true, $pendek = false, $sesi = 0)
    {
        $idCourse = config('app.indexCourse')[$course];
        $h = new HistoryPractice([
            'identity' => $identity,
            'id_course' => $idCourse,
            'full_sesi' => $fullSesi,
            'pendek' => $pendek
        ]);

        DB::beginTransaction();
        $h->save();
        $size = min(config('app.' . $course)[$sesi]['num'], Practice::countQuest($idCourse, $sesi));
        $historyJawaban = HistoryJawabanPractice::makeHistoryJawaban($h->id, $sesi, $size, $pendek);
        DB::commit();

        return [$h, $historyJawaban];
    }

    public static function countPractice($identity)
    {
        return self::selectRaw('id_course ,count(id_course) as jumlah')
            ->where('identity', $identity)
            ->groupBy('id_course')
            ->get()->toArray();
    }

    public static function report($identity)
    {
        return self::join('history_jawaban_practices', 'history_practices.id', '=', 'history_jawaban_practices.id_history_practice')
            ->where('history_practices.identity', $identity)
            ->orderBy('history_practices.created_at', 'desc')
            ->get();
    }
    public static function allWithIdentity($identity, $limit = null, $paginate = false)
    {
        $query =  self::where('identity', $identity)
            ->orderBy('created_at', 'desc');
        if ($limit) $query = $query->limit($limit);
        if ($paginate) return $query->paginate(9);
        return $query->get();
    }

    public static function countTaker()
    {
        return self::selectRaw('distinct identity')
            ->get()->count();
    }

    public static function mean($idCourse = null)
    {
        if(!$idCourse){
            $q = self::select('jumlah_benar', 'sesi', 'id_course')
                ->join('history_jawaban_practices', 'history_jawaban_practices.id_history_practice', '=', 'history_practices.id')
                ->lazy();
            $mean = 0;
            if($q->count() == 0) return $mean;
            foreach($q as $data){
                $course = config('app.allCourse.'. $data->id_course);
                $mean += $data->jumlah_benar*100/config("app.$course.$data->sesi.num");
            }
            $mean /= $q->count();
            return $mean;
        }
        return self::selectRaw('history_practices.*, sum(jumlah_benar)')
            ->join('history_jawaban_practices', 'history_practices.id', '=', 'history_jawaban_practices.id_history_practice')
            ->groupBy('history_practices.id')
            ->get();
    }

    public static function countHP()
    {
        return self::select('identity')
            ->groupBy('identity')
            ->lazy()
            ->count();
    }

    public static function pointer($idCourse){
        return self::where('created_at', '>', now()->subYear())
            ->where('id_course',$idCourse)
            ->lazy();
    }

}
