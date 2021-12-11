<?php

namespace App\Http\Livewire\Admin;

use App\Models\OjtEvent;
use App\Models\OjtMataKuliah;
use App\Models\OjtMataKuliahEvent;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateOjtEvent extends Component
{

    public OjtEvent $event;
    public $namaEvent;
    public $max;
    public $prodi;
    public $mk;
    public $idMk;
    public $tambah;
    public $row =1;

    public function mount(OjtEvent $event){
        if(!$event) abort(404);
        $this->event = $event;
        $this->namaEvent = $event->nama_event;
        $this->max = $event->max_konversi_sks;
        $this->prodi = $event->id_prodi;

        $this->mk = OjtMataKuliah::getMatkul($event->id)->toArray();
        $this->idMk = [];
        foreach($this->mk as $m){
            $this->idMk['_'.$m['id']] = $m['id'];
        }
    }

    public function updateMk($id){
        foreach($this->mk as $ind => $m){
            if($m['id'] == $id){
                array_splice($this->mk, $ind, 1);
                unset($this->idMk['_'.$id]);
                DB::beginTransaction();
                DB::table('ojt_mata_kuliah_events')
                    ->where('id_ojt_event', '=', $this->event->id)
                    ->where('id_ojt_mata_kuliah', '=', $m['id'])
                    ->delete();
                DB::commit();
                return;
            }
        }
        $m = OjtMataKuliah::find($id);
        if($m){
            $em = new OjtMataKuliahEvent();
            $em->id_ojt_event = $this->event->id;
            $em->id_ojt_mata_kuliah = $m->id;
            if($em->save()){
                array_push($this->mk, $m->toArray());
                $this->idMk['_'.$m->id] = $m->id;
            }
        }
    }

    public function updatedNamaEvent($value){
        $this->validate(['namaEvent' => 'required']);
        $this->event->nama_event = $value;
        $this->event->save(['nama_event']);
    }

    public function updatedMax($value){
        $this->validate(['max' => 'required|min:0']);
        $this->event->max_konversi_sks = $value;
        $this->event->save(['max_konversi_sks']);
    }

    public function updatedProdi($value){
        $this->validate(['prodi' => 'required|min:0|max:1']);
        $this->event->prodi = $value;
        $this->event->save(['prodi']);
    }

    public function tambahMK(){
        $this->tambah = true;
    }
    public function closeTambah(){
        $this->tambah = false;
    }

    public function render()
    {
        $listMk = OjtMataKuliah::lazy();
        $this->row = 1;
        $nav = [
            [
                'title' => 'OJT Event',
                'link' => url('/admin/ojt/event')
            ],
            [
                'title' => $this->event->nama_event,
                'link' => url('/admin/ojt/event/'.$this->event->id)
            ]
            ];
        return view('livewire.admin.update-ojt-event',[
            'listMK' => $listMk
        ])
            ->extends('layouts.admin',[
                'nav' => $nav,
                'title' => 'Update '.$this->event->nama_event
            ])
            ->slot('slot');
    }
}
