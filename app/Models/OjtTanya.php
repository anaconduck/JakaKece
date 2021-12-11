<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OjtTanya extends Model
{
    use HasFactory;

    public static function tanya($data){
        DB::beginTransaction();
        $val = DB::table('ojt-tanyas')->insert($data);
        DB::commit();
        return $val;
    }
}
