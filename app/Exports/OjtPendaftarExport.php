<?php

namespace App\Exports;

use App\Models\OjtPendaftar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OjtPendaftarExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return OjtPendaftar::select('id', 'identity', 'status_pendaftaran', 'status_kelulusan', 'periode', 'catatan', 'created_at')
            ->get();
    }

    public function headings(): array

    {

        return [

            'id Pendaftar',

            'NIM',

            'Status Pendaftaran',

            'Status Kelulusan',

            'Periode',

            'Catatan',
            'tgl_daftar'

        ];

    }
}
