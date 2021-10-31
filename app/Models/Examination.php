<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examination extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'kategori',
        'mahasiswa_id',
        'jawaban',
        'id_course',
        'nomor_ujian',
        'kode_ujian',
        'history_exam_id'
    ];

    public static function getExamination($type, $kategori){
        $mahasiswa = Mahasiswa::getMahasiswa();
        $history = HistoryExam::getLastHistoryExam($type);
        $start = strtotime($history->created_at);
        $now = strtotime(now());
        $diff = $now-$start;

        if($diff >= 125*60){
            return false;
        }
        else if($diff >= 100 * 60 and $diff < 125*60){
            if($kategori != 'WRITING')
                return false;
        }
        else if($diff >= 65*60 and $diff < 100 * 60){
            if($kategori != "LISTENING")
                return false;
        }
        else if($diff>= 55 * 60 and $diff < 65*60){
            return false;
        }
        else if($diff <= 55 * 60){
            if($kategori != 'READING')
                return false;
        }


        $data = self::where('type',$type)
            ->where('kategori',$kategori)
            ->where('mahasiswa_id', $mahasiswa->id)
            ->where('history_exam_id',$history->id)
            ->first();  
        if($data == null){
            $data = new Examination([
                'type' => $type,
                'kategori' => $kategori,
                'mahasiswa_id' => $mahasiswa->id,
                'jawaban' => '',
                'id_course' => InkubasiBahasa::getCourse($type)['id_course'],
                'nomor_ujian' => uniqid('n',true),
                'kode_ujian' => uniqid('c',true),
                'history_exam_id' => $history->id
            ]);
        }
        return $data;
    }

    public static function jawab($type, $kategori, $id, $jawaban){
        $data = self::getExamination($type,$kategori);
        if(!$data)
            return false;
        $listJawaban = explode('|',$data->jawaban);
        $added = false;

        if($listJawaban[0] == ''){
            $listJawaban[0] = "$id,$jawaban";
        }else{
            foreach($listJawaban as &$dataJawaban){
                $temp = explode(',',$dataJawaban);
                if($temp[0] == $id){
                    $temp[1] = $jawaban;
                    $added = true;
                    $dataJawaban = implode(',',$temp);
                    break;
                }
            }
            if(! $added){
                array_push($listJawaban,"$id,$jawaban");
                $added = true;
            }
        }

        $data->jawaban = implode('|',$listJawaban);

        $data->save();
        return $data->isClean();
    }
}
