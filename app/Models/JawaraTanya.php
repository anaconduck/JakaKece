<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JawaraTanya extends Model
{
    use HasFactory;

    public $attributes = [
        'jawaban' => null
    ];

    public static function tanya($data){
        DB::beginTransaction();
        $res = DB::table('jawara_tanyas')->insert($data);
        DB::commit();
        return $res;
    }
}
