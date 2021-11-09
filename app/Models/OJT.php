<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OJT extends Model
{
    use HasFactory;

    protected $table = 'ojt';
    public $timestamps = false;

    public static function show($offset, $limit){
        return self::orderBy('tanggal_pendaftaran_mulai','desc')
            ->offset($offset)
            ->limit($limit)
            ->get();
    }
}
