<?php

namespace App\Http\Livewire\Admin;

use App\Models\DeskripsiSistem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class KelolaSlide extends Component
{
    use WithFileUploads;


    public $fitur = 1;
    public $slide;
    public $msg;
    public $status = 'success';
    public $delete;

    protected $rules = [
        'slide.*.deskripsi' => 'required|string',
        'slide.*.file' => 'required|image'
    ];

    public function mount()
    {
        $this->slide = DeskripsiSistem::getDeskripsiSistem($this->fitur)->toArray();
    }

    public function updated($name, $value)
    {
        $ctr = explode('.', $name);
        if ($ctr[0] == 'slide') {
            $this->validateOnly($name, $this->rules);
            if ($ctr[2] == 'deskripsi') {
                DB::beginTransaction();
                $query = DB::table('deskripsi_sistems')
                    ->where('id', '=', $this->slide[$ctr[1]]['id']);
                $status = false;
                if (!$this->slide[sizeof($this->slide) - 1]['id'])
                    $status = $query->updateOrInsert([
                        $ctr[2] => $value,
                        'fitur' => $this->fitur
                    ]);
                else $status = $query->update([
                    $ctr[2] => $value,
                    'fitur' => $this->fitur
                ]);
                DB::commit();
                $this->slide = DeskripsiSistem::getDeskripsiSistem($this->fitur)->toArray();
            } elseif ($ctr[2] == 'file') {
                if ($this->slide[$ctr[1]]['file']) {
                    Storage::delete($this->slide[$ctr[1]]['file']);
                }
                $path = $value->storeAs('deskripsi/' . $this->fitur, $name . $value->getClientOriginalName(), 'public');
                $this->slide[$ctr[1]]['file'] = $path;
                DB::beginTransaction();
                $status = DB::table('deskripsi_sistems')
                    ->where('id', $this->slide[$ctr[1]]['id'])
                    ->update([
                        $ctr[2] => $path
                    ]);
                DB::commit();
                $ctr[2] = 'background';
            }
            if ($status) {
                $this->msg = "Berhasil memperbarui " . $ctr[2] . " slide-" . ($ctr[1] + 1);
                $this->status = 'success';
            } else {
                $this->msg = "Gagal memperbarui " . $ctr[2] . " slide-" . ($ctr[1] + 1);
                $this->status = 'danger';
            }
        }
    }

    public function updatedFitur($value){
        $this->msg = '';
        $this->delete = -1;
        $this->slide = DeskripsiSistem::getDeskripsiSistem($this->fitur)->toArray();
    }

    public function tambahSlide()
    {
        array_push($this->slide, [
            'deskripsi' => null,
            'file' => null,
            'id' => null
        ]);
    }

    public function confirmDelete($ind)
    {
        $this->delete = $ind;
    }
    public function batal()
    {
        $this->delete = -1;
    }

    public function deleteSlide($ind)
    {
        $ind = $this->slide[$ind]['id'];
        DB::beginTransaction();
        DB::table('deskripsi_sistems')->delete($ind);
        DB::commit();

        $this->slide = DeskripsiSistem::getDeskripsiSistem($this->fitur)->toArray();
        $this->delete = -1;
    }

    public function render()
    {
        return view('livewire.admin.kelola-slide')
            ->extends('layouts.admin', [
                'title' => 'Kelola Deskripsi Sistem'
            ])
            ->slot('slot');
    }
}
