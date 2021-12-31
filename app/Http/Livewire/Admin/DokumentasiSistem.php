<?php

namespace App\Http\Livewire\Admin;

use App\Models\DokumentasiSistem as ModelsDokumentasiSistem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class DokumentasiSistem extends Component
{
    use WithFileUploads;

    public $fitur = 1;
    public $deskripsi;
    public $msg;
    public $status = 'success';
    public $jenisDokumentasi = [0, 0, 0];
    public $counter = 0;

    protected $rules = [
        'deskripsi.*.deskripsi' => 'string',
        'deskripsi.*file' => 'mimetypes:image/jpeg,video/mp4,video/mpeg,image/png,image/jpg',
        'jenisDokumentasi.*' => 'required|numeric|min:0|max:1'
    ];

    public function mount()
    {
        $this->deskripsi = ModelsDokumentasiSistem::getDokumentasi($this->fitur);
        foreach ($this->deskripsi as $ind => $s) {
            if (strpos($s['file'], 'dokumentasi') !== false) {
                $this->jenisDokumentasi[$ind] = 1;
            }else{
                $this->jenisDokumentasi[$ind] = 0;
            }
        }
    }

    public function updating($name, $value)
    {
        $ctr = explode('.', $name);
        if ($ctr[0] == 'deskripsi') {
            if ($ctr[2] == 'deskripsi') {
                $this->deskripsi[$ctr[1]]['deskripsi'] = $value;
                $this->validateOnly($name, $this->rules);
                DB::beginTransaction();
                $query = DB::table('dokumentasi_sistems')
                    ->where('id', $this->deskripsi[$ctr[1]]['id']);
                $status = $query->update([
                    $ctr[2] => $value
                ]);
                DB::commit();
                if ($status) {
                    $this->deskripsi[$ctr[1]]['deskripsi'] = $value;
                } else {
                    $this->msg = 'Gagal Memperbarui Deskripsi sistem';
                }
            } else if ($ctr[2] == 'file') {

                $old = $this->deskripsi[$ctr[1]]['file'];
                if ($this->jenisDokumentasi[$ctr[1]] == 1) {
                    $this->deskripsi[$ctr[1]]['file'] = $value;
                    $this->validateOnly($name, $this->rules);
                    $path = $value->storeAs('dokumentasi/' . $this->fitur, Str::random(2) . $name . $value->getClientOriginalName(), 'public');
                    DB::beginTransaction();
                    $status = DB::table('dokumentasi_sistems')
                        ->where('id', $this->deskripsi[$ctr[1]]['id'])
                        ->update([
                            $ctr[2] => $path
                        ]);
                    DB::commit();
                    if (!$status) {
                        (Storage::delete('public/' . $path));
                        $this->deskripsi[$ctr[1]]['file'] = $old;
                    } else {
                        (Storage::delete('public/' . $old));
                        $this->deskripsi[$ctr[1]]['file'] = $path;
                    }
                } else if ($this->jenisDokumentasi[$ctr[1]] == 0) {
                    DB::beginTransaction();
                    $status = DB::table('dokumentasi_sistems')
                        ->where('id', $this->deskripsi[$ctr[1]]['id'])
                        ->update([
                            $ctr[2] => $value
                        ]);
                    DB::commit();
                    if ($status) {
                        (Storage::delete('public/' . $old));
                        $this->deskripsi[$ctr[1]]['file'] = $value;
                    }
                }
            }
            if ($status) {
                $this->msg = 'Berhasil memperbarui ' . $ctr[2] . ' dokumentasi-' . ($ctr[1] + 1);
                $this->status = 'success';
            } else {
                $this->msg = 'Gagal memperbarui ' . $ctr[2] . 'dokumentasi-' . ($ctr[1] + 1);
                $this->status = 'danger';
            }
        }
    }

    public function updated($name, $value)
    {
        $ctr = explode('.', $name);
        if ($ctr[0] == 'deskripsi') {
            $this->deskripsi = ModelsDokumentasiSistem::getDokumentasi($this->fitur);
            foreach ($this->deskripsi as $ind => $s) {
                if (strpos($s['file'], 'dokumentasi') !== false) {
                    $this->jenisDokumentasi[$ind] = 1;
                }
            }
        }
    }

    public function updateJenisDokumentasi($ind, $val)
    {
        if ($val == 0 or $val == 1)
            $this->jenisDokumentasi[$ind] = $val;
    }

    public function updatedFitur($value)
    {
        $this->msg = '';
        $this->deskripsi = ModelsDokumentasiSistem::getDokumentasi($this->fitur);
        foreach ($this->deskripsi as $ind => $s) {
            if (strpos($s['file'], 'dokumentasi') !== false) {
                $this->jenisDokumentasi[$ind] = 1;
            }else{
                $this->jenisDokumentasi[$ind] = 0;
            }
        }
    }

    public function render()
    {
        $this->counter = 0;
        return view('livewire.admin.dokumentasi-sistem')
            ->extends('layouts.admin', [
                'title' => 'Kelola Dokumentasi Sistem'
            ])
            ->slot('slot');
    }
}
