<?php

namespace App\Exports;

use App\Models\Complaint;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class complaintExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $query = "SELECT DATE(created_at), name, dept, area, spec_area, unsafe_activity, unsafe_envi, recom, status FROM complaint ";
        return collect(\DB::select($query));
    }

    public function headings():array{
        return [
            'Tanggal Lapor',
            'Nama',
            'Departemen',
            'Area Kerja',
            'Lokasi Spesifik',
            'Temuan Aktivitas',
            'Temuan Keadaan',
            'Saran/Rekomendasi',
            'Status',
        ];
    }
}
