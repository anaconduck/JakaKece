<?php

namespace App\Http\Livewire;

use App\Models\JawaraPendaftar;
use Livewire\Component;

class MeanDanaJawara extends Component
{
    public $labels;

    public function render()
    {
        $this->labels = array();
        $nav = [
            [
                'title' => 'Statistik',
                'link' => url('/admin/dashboard')
            ],
            [
                'title' => 'Rerata Pendanaan',
                'link' => url('/admin/mean-jawara')
            ]
        ];

        $pointer = JawaraPendaftar::pointerDana();
        foreach ($pointer as $p) {
            $thn = config('app.periode.start');
            $time = strtotime($p->created_at);
            $periode = 0;
            while (true) {
                $tgl = null;
                if ($periode % 2 == 0) {
                    $tgl = config('app.periode.batas_tengah') . ' ' . $thn;
                } else {
                    $thn += 1;
                    $tgl = config('app.periode.batas_awal') . ' ' . $thn;
                }
                $interval = $time - strtotime($tgl);
                if ($interval < 0) break;
                $periode += 1;
            }
            $tl = null;
            if ($periode % 2 == 0) $tl = 'Genap';
            else $tl = 'Gasal';
            $key = $tl . ' ' . ($thn - 1) . '/' . ($thn);
            if (!isset($this->labels[$key])) {
                $this->labels[$key] = [
                    'mhs' => 1,
                    'total' => $p->pendanaan
                ];
            } else {
                $this->labels[$key]['mhs'] += 1;
                $this->labels[$key]['total'] += $p->pendanaan;
            }
        }
        return view('livewire.mean-dana-jawara')
            ->extends('layouts.admin', [
                'nav' => $nav,
                'title' => 'Rerata Pendanaan'
            ])
            ->slot('slot');
    }
}
