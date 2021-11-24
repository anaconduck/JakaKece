<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OjtTujuan extends Model
{
    use HasFactory;

    public static function riwayat($idTujuan){
        return OjtPaket::join('ojt_events', 'ojt_events.id', '=', 'ojt_pakets.id_ojt_event')
            ->where('ojt_pakets.id_ojt_tujuan', $idTujuan)
            ->orderBy('ojt_pakets.created_at', 'desc')
            ->get();
    }
}
