<?php

namespace App\Http\Livewire\Admin;

use App\Models\Dashboard;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class KelolaDashBoard extends Component
{
    use WithFileUploads;


    public $section;
    public Dashboard $data;
    public $videoId;
    public $background;
    public $backgroundPath;
    public $tentangAplikasi;
    public $msg;

    protected $rules = [
        'videoId' => 'required',
        'background.*' => 'image|max:1024',
        'tentangAplikasi' => 'required|string'
    ];

    public function mount()
    {
        $data = Dashboard::first();
        $this->data = $data;
        $this->videoId = $data->banner;
        if ($data->background != null)
            $this->backgroundPath = json_decode($data->background, true);
        else $this->backgroundPath = [
            'inkubasi' => null,
            'exchange' => null,
            'jawara' => null,
            'training' => null
        ];
        if ($data->tentangAplikasi != null)
            $this->tentangAplikasi = json_decode($data->tentangAplikasi,true);
        else $this->tentangAplikasi = [
            'deskripsi1' => null,
            'deskripsi2' => null
        ];
    }

    public function updatedVideoId($value){
        $this->validateOnly('videoId', $this->rules);
        $this->data->banner = $value;
        if($this->data->save(['banner'])) $this->msg = "Berhasil mengubah banner aplikasi";
    }

    public function updatedBackgroundInkubasi($value)
    {
        $this->validateOnly('background.inkubasi', $this->rules);
        if ($this->backgroundPath['inkubasi'] !== null) {
            Storage::delete($this->backgroundPath['inkubasi']);
        }
        $path = $this->background['inkubasi']->storeAs('dashboard', $value->getClientOriginalName(), 'public');
        if ($path) {
            $this->backgroundPath['inkubasi'] = $path;
            $this->data->background = json_encode($this->backgroundPath);
            $this->data->save(['background']);
            $this->msg = "Berhasil upload background inkubasi";
        }
    }

    public function updatedBackgroundJawara($value)
    {
        $this->validateOnly('background.jawara', $this->rules);
        if ($this->backgroundPath['jawara'] !== null) {
            Storage::delete($this->backgroundPath['jawara']);
        }
        $path = $this->background['jawara']->storeAs('dashboard', 'jawara', 'public');
        if ($path) {
            $this->backgroundPath['jawara'] = $path;
            $this->data->background = json_encode($this->backgroundPath);
            $this->data->save(['background']);
            $this->msg = "Berhasil upload background jawara";
        }
    }

    public function updatedBackgroundExchange($value)
    {
        $this->validateOnly('background.exchange', $this->rules);
        if ($this->backgroundPath['exchange'] !== null) {
            Storage::delete($this->backgroundPath['exchange']);
        }
        $path = $this->background['exchange']->storeAs('dashboard', 'exchange', 'public');
        if ($path) {
            $this->backgroundPath['exchange'] = $path;
            $this->data->background = json_encode($this->backgroundPath);
            $this->data->save(['background']);
            $this->msg = "Berhasil upload background exchange";
        }
    }

    public function updatedBackgroundTraining($value)
    {
        $this->validateOnly('background.training', $this->rules);
        if ($this->backgroundPath['training'] !== null) {
            Storage::delete($this->backgroundPath['training']);
        }
        $path = $this->background['training']->storeAs('dashboard', 'training', 'public');
        if ($path) {
            $this->backgroundPath['training'] = $path;
            $this->data->background = json_encode($this->backgroundPath);
            $this->data->save(['background']);
            $this->msg = "Berhasil upload background magang";
        }
    }

    public function updatedTentangAplikasi($value)
    {
        $this->validateOnly('tentangAplikasi.*', $this->rules);
        $this->data->tentangAplikasi = json_encode($this->tentangAplikasi);
        if($this->data->save(['tentangAplikasi'])) $this->msg = 'Berhasil Mengupdate deskripsi aplikasi';
    }

    public function render()
    {
        $nav = [
            [
                'title' => 'Kelola Dashboard',
                'link' => url('/admin/kelola-dashboard')
            ]
        ];
        return view('livewire.admin.kelola-dash-board')
            ->extends('layouts.admin', [
                'nav' => $nav,
                'title' => "Kelola Dashboard"
            ])
            ->slot('slot');
    }
}
