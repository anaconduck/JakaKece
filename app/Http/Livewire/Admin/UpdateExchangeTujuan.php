<?php

namespace App\Http\Livewire\Admin;

use App\Models\ExchangeMataKuliah;
use App\Models\ExchangeMataKuliahTujuan;
use App\Models\ExchangeTujuan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class UpdateExchangeTujuan extends Component
{
    use WithFileUploads;

    public $nav;
    public ExchangeTujuan $tujuan;
    public $namaUniversitas;
    public $lokasi;
    public $mk;
    public $row = 1;
    public $listMK;
    public $file;
    public $filePath;
    public $tambah;
    public $idMK;

    public function mount(ExchangeTujuan $tujuan){
        $this->nav = [
            [
                'title' => 'Tujuan Student Exchange',
                'link' => url('/admin/se/tujuan')
            ],
            [
                'title' => $tujuan->nama_universitas,
                'link' => url('/admin/se/tujuan/'.$tujuan->id)
            ]
            ];
        $this->tujuan = $tujuan;
        $this->mk = ExchangeMataKuliahTujuan::getMataKuliahFrom($tujuan->id)->toArray();
        $this->listMK = ExchangeMataKuliah::all()->toArray();
        $this->filePath = $tujuan->file_penjelas;
        $this->namaUniversitas = $tujuan->nama_universitas;
        $this->lokasi = $tujuan->dalam_negeri;
        $this->tambah = false;
        $this->idMK = [];
        foreach($this->mk as $m){
            $this->idMK['_'.$m['id']] = $m['id'];
        }
    }

    public function removeFile(){
        if($this->tujuan->file_penjelas){
            Storage::delete($this->tujuan->file_penjelas);
            $this->tujuan->file_penjelas = null;
            $this->tujuan->save(['file_penjelas']);
            $this->filePath = null;
        }
    }
    public function updateMK($id){
        foreach($this->mk as $ind => $m){
            if($m['id'] == $id){
                array_splice($this->mk, $ind, 1);
                unset($this->idMK['_'.$id]);
                DB::beginTransaction();
                DB::table('exchange_mata_kuliah_tujuans')
                    ->where('id_exchange_tujuan', $this->tujuan->id)
                    ->where('id_exchange_mata_kuliah', $id)
                    ->delete();
                DB::commit();
                return;
            }
        }
        $m = ExchangeMataKuliah::find($id);
        if($m){
            $ex = new ExchangeMataKuliahTujuan();
            $ex->id_exchange_tujuan = $this->tujuan->id;
            $ex->id_exchange_mata_kuliah = $m->id;
            if($ex->save()){
                array_push($this->mk, $m->toArray());
                $this->idMK['_'.$m->id] = $m->id;
            }
        }

    }

    public function tambahMK(){
        $this->tambah = true;
    }
    public function closeTambah(){
        $this->tambah = false;
    }

    public function updatedNamaUniversitas($value){
        $this->validate(['namaUniversitas'=>'required']);
        $this->tujuan->nama_universitas = $value;
        if($this->tujuan->save(['nama_universitas']))
            $this->namaUniversitas = $value;
    }

    public function updatedLokasi($value){
        $this->validate(['lokasi' => 'required|numeric|min:0|max:1']);
        $this->tujuan->dalam_negeri = $value;
        if($this->tujuan->save(['dalam_negeri']))
            $this->lokasi = $value;
    }

    public function updatedFile($value){
        $this->validate([
            'file' => 'bail|required|max:10240|mimetypes:jpeg,jpg,png,gif,application/msword,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/pdf'
        ]);

        $name = time().Str::random(2).$this->file->getClientOriginalName();
        $path = $this->file->storeAs('exchange/tujuan', $name, 'local');
        $this->tujuan->file_penjelas = $path;
        if($this->tujuan->save(['file_penjelas']))
            $this->filePath = $path;
    }

    public function render()
    {
        return view('livewire.admin.update-exchange-tujuan')
            ->extends('layouts.admin',[
                'nav' => $this->nav,
                'title' => "Update SE ".$this->tujuan->nama_universitas
            ])
            ->slot('slot');
    }
}
