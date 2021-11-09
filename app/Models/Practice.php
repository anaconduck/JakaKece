<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
    use HasFactory;

    public static function getQuest($type, $kategori, $offset){
        $data = self::select('id','teks','opsi','kategori')
            ->where('type', $type)
            ->where('kategori',$kategori)
            ->offset($offset)
            ->first();

        if($data == null)return;

        $data->opsi = explode('|',$data->opsi);
        return $data;
    }

    public static function countCategory($type, $kategori='Reading'){
        return self::where('kategori',$kategori)
            ->where('type',$type)
            ->count();
    }

    public static function allQuest($type){
        $data = self::where('type',$type)
            ->get();

        if($data == null)return;

        foreach($data as &$quest){
            $quest['opsi'] = explode('|',$quest['opsi']);
        }
        return $data;
    }

    public static function showQuest($offset, $limit){
        return self::orderBy('created_at','desc')
            ->offset($offset)
            ->limit($limit)
            ->get();
    }

}
