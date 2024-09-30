<?php

namespace App\Http\Controllers;
use App\Models\Karyawan;
use App\Export\FormatExcel;
use App\Traits\getData;
use Illuminate\Http\Request;
use App\Export\KaryawanExport;
// use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\ToArray;
// use Dompdf\Dompdf;
use PDF;

class EximController extends Controller
{
    //
    use getData;
    //
    public function download_template(Request $request){
        return Excel::download(new FormatExcel(), 'form import' . '.xlsx');
    }

    public function upload_karyawan(Request $request){
        $file = $request->file('file');

        $dataArray = Excel::toArray(new class implements ToArray{
           public function array(array $array){
            return $array;
           }
        }, $file);

        array_shift($dataArray[0]);

        foreach ($dataArray[0] as $val){
            Karyawan::create([
                'nama'=> $val[0],
                'alamat'=> $val[1],
                'no_telp'=> $val[2],
                'jabatan_id'=> $val[3],
            ]);
        }
        return redirect()->back();
    }

    public function export_file_excel(Request $request){
        return Excel::download(new KaryawanExport, 'karyawan'. '.xlsx');
    }


    public function export_file_pdf(Request $request){
        $result = $this->getKaryawan();
        // $result = [
        //     'result'=> $result,
        // ];
        

        $pdf = PDF::loadview(
            'report_karyawan',
            [
                "karyawan" => $result,
            ]
        )
        ->setPaper('a4','portrait');
        return $pdf->stream("Report Karyawan.pdf");
    }
    public function export_file_csv(Request $request){
        $result = $this->getKaryawan();
      
        $resultCollection = collect($result);
        $csvExporter = new \Laracsv\Export();

        return $csvExporter->build($resultCollection, ['id', 'nama', 'alamat', 'no_telp', 'jabatan'])->download();
    }

}
