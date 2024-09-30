<?php


namespace App\Export;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
// use App\Models\Karyawan;

class FormatExcel implements WithHeadings{
    use Exportable;
    public function headings(): array{
        return [
            ["nama","alamat","no_telp","jabatan_id"],
            // ["sample nama","idn","08123","3"],
        ];
    }

 
}