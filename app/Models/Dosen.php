<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    public static  function getDosenPembimbing(){
        return self::where('pembimbing',true)
            ->get();
    }
}
