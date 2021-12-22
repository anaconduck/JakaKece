<?php

namespace App\Exports;

use App\Models\ExchangePendaftar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExchangePendaftarExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ExchangePendaftar::select('id', 'identity', 'status_kelulusan', 'status_pendaftaran', 'id_exchange_tujuan', 'id_exchange_mata_kuliah', 'catatan', 'periode', 'created_at as tgl_daftar')
            ->get();
    }
    public function headings(): array

    {

        return [

            'id pendaftar',

            'NIM',

            'Status Kelulusan',

            'Status Pendaftaran',

            'Id TUjuan Exchange',

            'Id Exchange Mata Kuliah',

            'Catatan',

            'Periode',
            'tgl_daftar'

        ];

    }
}
