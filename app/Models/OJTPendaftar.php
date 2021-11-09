<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OJTPendaftar extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_ojt',
        'id_mahasiswa'
    ];
    protected $table = 'ojt_pendaftars';

    public static function show($offset,$limit){
        return self::select('ojt_pendaftars.id_mahasiswa','ojt_pendaftars.status','ojt.nama_ojt','ojt.tanggal_ojt','users.name')
            ->join('ojt','ojt.id','=','ojt_pendaftars.id_ojt')
            ->join('mahasiswas','ojt_pendaftars.id_mahasiswa','=','mahasiswas.id')
            ->join('users','users.id', '=', 'mahasiswas.user_id')
            ->orderBy('ojt_pendaftars.created_at','desc')
            ->offset($offset)
            ->limit($limit)
            ->get();
    }

    public static function createPendaftaran($idOJT, $idEvent,$idMahasiswa){
        $pendaftaran = new OJTPendaftar();
        $pendaftaran->id = $idOJT;
        $pendaftaran->id_ojt = $idEvent;
        $pendaftaran->id_mahasiswa = $idMahasiswa;
        $pendaftaran->status = false;
        if($pendaftaran->save()){
            return $pendaftaran;
        }
        return false;
    }
}
