<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\getData;

class IndexController extends Controller
{
    //
    use getData;
    public function index(request $request){
       
        return redirect("karyawan");
    }

    public function karyawan(Request $request){
        $karyawan = DB::table('t_karyawan')->get();

        $sqlquery = "SELECT t1.*, t2.jabatan
                    FROM t_karyawan AS t1
                    INNER JOIN t_jabatan AS t2  
                    USING(jabatan_id)";
        $karyawan = DB::select($sqlquery);
        //ambil database si jabatan
        $jabatan = DB::table('t_jabatan')->get();
        $data = [
            'judul'=> 'karyawan',
            'content'=> 'ini halaman karyawan',
            'karyawan'=> $karyawan,
            'jabatan'=> $jabatan
        ];
        return view("karyawan", compact ("data"));
    }

    public function datatables(Request $request){
        $karyawan = DB::table("t_karyawan")->get();
        // dd($karyawan);
        
        $data = [
            'judul' => 'Datatables',
            'content'=> 'ini halaman karyawan',
            'karyawan'=> $karyawan
            // 'jabatan'=> $jabatan
        ];
        return view('datatables'    , compact ('data'));

        // <-------------------------------------------------------> //

        // $this->getKaryawan();
            // $dataCollection



    }
    
    
}
