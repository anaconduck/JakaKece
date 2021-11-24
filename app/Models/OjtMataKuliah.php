<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OjtMataKuliah extends Model
{
    use HasFactory;

    public static function getMatkul($id_event_ojt){
        return self::select('ojt_mata_kuliahs.*')
            ->join('ojt_mata_kuliah_events','ojt_mata_kuliah_events.id_ojt_mata_kuliah','=','ojt_mata_kuliahs.id')
            ->where('id_ojt_event',$id_event_ojt)
            ->get();
    }
}
