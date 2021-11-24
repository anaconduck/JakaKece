<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OjtPaket extends Model
{
    use HasFactory;
    public static function getPaket($idTujuan, $prodi){
        return self::join('ojt_events', 'ojt_events.id','=','ojt_pakets.id_ojt_event')
            ->join('ojt_prodis', 'ojt_events.id_prodi','=', 'ojt_prodis.id')
            ->where('nama_prodi', $prodi)
            ->where('id_ojt_tujuan', $idTujuan)
            ->where('mulai_daftar','<=', now())
            ->where('akhir_daftar', '>', now())
            ->get();
    }


    
}
