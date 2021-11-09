<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentExchange extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_mahasiswa',
        'id_exchange_event'
    ];
    protected $attributes = [
        'ketersediaan' => false
    ];

    public static function getRiwayatPertukaran(){
        return self::join('exchange_events','exchange_events.id','=','student_exchanges.id_exchange_event')
            ->orderBy('akhir','asc')
            ->get();
    }

    public static function daftar($data){
        $daftar = self::where('id_mahasiswa',$data['id_mahasiswa'])
            ->where('id_exchange_event',$data['id_exchange_event'])
            ->first();
        if($daftar){
            return null;
        }
        $se = new StudentExchange($data);
        $se->save();
        return $se->isClean();
    }

    public static function getRiwayatMahasiswa($id){
        return self::join('exchange_events','exchange_events.id','=','student_exchanges.id_exchange_event')
            ->join('mahasiswas','mahasiswas.id','=','student_exchanges.id_mahasiswa')
            ->join('users','users.id','=','mahasiswas.user_id')
            ->where('id_exchange_event','=',$id)
            ->get();
    }

    public static function show($offset, $limit){
        return self::select('student_exchanges.*','exchange_events.*','users.name')
            ->join('exchange_events','student_exchanges.id_exchange_event','=','exchange_events.id')
            ->join('mahasiswas','mahasiswas.id','=','student_exchanges.id_mahasiswa')
            ->join('users','users.id','=','mahasiswas.user_id')
            ->orderBy('student_exchanges.created_at')
            ->offset($offset)
            ->limit($limit)
            ->get();
    }
}
