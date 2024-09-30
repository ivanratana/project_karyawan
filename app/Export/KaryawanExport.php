<?php


namespace App\Export;
use App\Models\Karyawan;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

// use Maatwebsite\Excel\Concerns\WithHeadings;

// use Maatwebsite\Excel\Concerns\FromCollection;
// use Maatwebsite\Excel\Concerns\FromView;

class KaryawanExport implements FromQuery, WithHeadings{
    use Exportable;
    
// class KaryawanExport implements FromQuery, WithHeadings
// {
//     use Exportable;

    public function query()
    {
        return DB::table('t_karyawan')
        ->join('t_jabatan', 't_karyawan.jabatan_id', '=', 't_jabatan.jabatan_id')
        ->select('t_karyawan.id', 't_karyawan.nama', 't_karyawan.alamat', 't_karyawan.no_telp', 't_jabatan.jabatan')
        // ->select('t_karyawan.*', 't_jabatan.jabatan')
        ->orderBy('t_karyawan.id', 'asc');
        // ->where('nama LIKE "b%"');
        return Karyawan::query();

 
    }
    public function headings(): array
    {
        
        return 
        [
            'ID', 'Nama', 'Alamat', 'No_telp', 'Jabatan'
        ];
    }
}

    // public function query(){
    //     // $karyawan = DB::table("t_karyawan")->where("id",$id)->get();
    //     // $jabatan = DB::table('t_jabatan')->get();
        
    //     
    //     DB::table("t_karyawan");
    //     // $jabatan = DB::table("t_jabatan");
    //     $sqlquery = "SELECT t1.*, t2.jabatan
    //                 FROM t_karyawan AS t1
    //                 INNER JOIN t_jabatan AS t2
    //                 USING(jabatan_id)";
    //     DB::select($sqlquery);
    //     // $karyawan = DB::select($sqlquery);
    //     // $jabatan = DB::table("")->get();

    //     return Karyawan::all($sqlquery);
    // }

// class KaryawanExport implements FromView
// {
//     public function view(): View
//     {
//         return view('exports.invoices', [
//             'invoices' => Invoice::all()
//         ]);
//     }


