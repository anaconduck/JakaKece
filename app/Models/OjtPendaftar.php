<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OjtPendaftar extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_prodi',
        'id_paket',
        'identity',
        'status_pendaftaran'
    ];
    public $attributes = [
        'status_kelulusan' => false
    ];

    public static function countTraining($idPaket, $idProdi){
        return self::where('id_paket',$idPaket)
            ->where('id_prodi', $idProdi)
            ->where('status_pendaftaran', 3)
            ->count();
    }

    public static function riwayat($identity){
        return self::select('ojt_pendaftars.*','ojt_tujuans.nama_instansi')
            ->join('ojt_pakets','ojt_pendaftars.id_paket','=','ojt_pakets.id')
            ->join('ojt_tujuans','ojt_tujuans.id','=','ojt_pakets.id_ojt_tujuan')
            ->where('identity',$identity)
            ->get();
    }
}
