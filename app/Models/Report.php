<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    public static function getReport($mhsid, $historyexamId, $finish = false){
        $historyexam = HistoryExam::getHistoryExam($mhsid,$historyexamId);

        if(! $historyexam)
            return false;

        $start = strtotime($historyexam->created_at);
        $now = strtotime(now());
        $diff = $now-$start;

        if($diff >= 125*60 or $finish){
            if(!$historyexam->status){
                $report = self::makeReport($mhsid, $historyexam);
                if($report){
                    $historyexam->status = true;
                    $historyexam->save();
                    return $report;
                }
            }
            else {
                return self::where('history_exam_id',$historyexamId)
                    ->where('mahasiswa_id', $mhsid)
                    ->first();
            }
        }
        
        return null;


    }

    public static function getAllReports($mhsid){
        $historyexam = HistoryExam::where('mahasiswa_id',$mhsid)
            ->where('status',false)
            ->get();
        if($historyexam != null){
            foreach($historyexam as $history){
                $start = strtotime($history->created_at);
                $now = strtotime(now());
                $diff = $now-$start;
                if($diff >= 125*60){
                    $report = self::makeReport($mhsid, $history);
                    if($report){
                        $history->status = true;
                        $history->save();
                    }
                }
            }
        }
        return self::where('mahasiswa_id',$mhsid)
            ->orderBy('created_at','desc')
            ->get();
    }

    public static function makeReport($mhsid, &$historyexam){
        $examination = Examination::where('history_exam_id',$historyexam->id)
            ->where('mahasiswa_id',$mhsid)
            ->get();

        $report = new Report();
        $report->mahasiswa_id = $mhsid;
        $report->history_exam_id = $historyexam->id;
        $report->type = $historyexam->type;
        $report->score_reading = 0;
        $report->score_listening = 0;
        $report->score_writing = 0;
        $report->score_speaking = 0;

        foreach($examination as $exam){
            if($exam->kategori == "READING" or $exam->kategori == "LISTENING"){
                $jawaban =  explode('|',$exam->jawaban);
                $temp = [
                    'id' => [],
                    'jawaban' => []
                ];
                foreach($jawaban as $jawab){
                    $prt = explode(',',$jawab);
                    array_push($temp['id'],$prt[0]);
                    array_push($temp['jawaban'],$prt[1]);
                }

                $jawabanReal = Practice::select('jawaban')
                    ->where('type', $exam->type)
                    ->where('kategori',$exam->kategori)
                    ->get()->toArray();
                for($ind = 0;$ind < sizeof($temp['id']); $ind++){
                    if($jawabanReal[$temp['id'][$ind]-1]['jawaban'] == $temp['jawaban'][$ind]){
                        if($exam->kategori == "READING"){
                            $report->score_reading++;
                        }else if($exam->kategori == 'LISTENING'){
                            $report->score_listening++;
                        }
                    }
                }
            }
        }
        $report->save();

        if($report->isClean()){
            $historyexam->status = true;
            $historyexam->save(['status']);
            return $report;
        }
        return false;
    }

}
