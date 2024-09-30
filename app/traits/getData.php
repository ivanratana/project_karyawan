<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;

trait getData{
    public function getKaryawan(){
        
        $sqlquery = "SELECT t1.id, t1.nama, t1.alamat, t1.no_telp, t2.jabatan   
        FROM t_karyawan AS t1
        INNER JOIN t_jabatan AS t2  
        USING(jabatan_id)";

        $result = DB::select( $sqlquery );

        return $result;
    }

}