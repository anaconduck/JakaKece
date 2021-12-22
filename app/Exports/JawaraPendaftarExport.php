<?php

namespace App\Exports;

use App\Models\JawaraPendaftar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class JawaraPendaftarExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return JawaraPendaftar::select('jawara_pendaftars.id', 'jawara_pendaftars.id_mahasiswa', 'jawara_events.nama', 'dosens.nama_lengkap', 'jawara_pendaftars.status', 'jawara_pendaftars.status_pendanaan', 'jawara_pendaftars.catatan_pembimbing','jawara_pendaftars.catatan_pendanaan', 'jawara_pendaftars.created_at','jawara_pendaftars.pendanaan')
            ->join('jawara_events', 'jawara_events.id', '=', 'jawara_pendaftars.id_jawara_event')
            ->join('dosens', 'dosens.id', '=', 'jawara_pendaftars.id_dosen')
            ->get();
    }

    public function headings(): array

    {

        return [

            'id Pendaftar',

            'NIM',

            'Nama Event',

            'Nama Dosen',

            'Status Pendaftaran',
            'status Pendanaan',
            'catatan pembimbing',
            'catatan pendanaan',
            'Waktu Pendaftaran',
            'Pendanaan'

        ];

    }
}
