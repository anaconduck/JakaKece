<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawaraEvent extends Model
{
    use HasFactory;
    protected $table = 'event';
    public $timestamps = false;

    public static function showEvent($offset, $limit){
        return self::orderBy('tanggal_pendaftaran_mulai','desc')
            ->offset($offset)
            ->limit($limit)
            ->get();
    }

}

