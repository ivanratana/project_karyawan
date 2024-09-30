<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KaryawanController extends Controller
{
    public function tambah_karyawan(Request $request)
    {
        // $karyawan = Karyawan::with('jabatan')->get();
        // $jabatan = Jabatan::all();

        // return view('karyawan.index', compact('karyawan', 'jabatan'));

        $nama = $request->nama;
        $alamat = $request->alamat;
        $no_telp = $request->no_telp;
        $jabatan_id = $request->jabatan_id;

        DB::statement("INSERT INTO t_karyawan (nama, alamat, no_telp, jabatan_id) VALUES(?, ?, ?, ?)",[
            $nama,
            $alamat,
            $no_telp,
            $jabatan_id
        ]);

        return redirect("karyawan");
    }

    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'nama' => 'required',
    //         'alamat' => 'required',
    //         'no_telp' => 'required',
    //         'jabatan_id' => 'required|exists:t_jabatan,jabatan_id',
    //     ]);

    //     Karyawan::create($validated);

    //     return redirect()->route('karyawan.index');
    // }

    public function edit_karyawan($id)
    {
    
       $karyawan = DB::table("t_karyawan")->where("id",$id)->get();
       $jabatan = DB::table('t_jabatan')->get();
       
       $data =[
        'judul'=> 'edit_karyawan',
        'content'=> 'ini halaman edit karyawan',
        'karyawan'=> $karyawan,
        'jabatan'=> $jabatan
       ];
       return view ('edit_karyawan', compact('data'));
    }

    public function hapus_karyawan($id){
        DB::table('t_karyawan')->where('id',$id)->delete();
        $karyawan = DB::table('t_karyawan')->get();
        $jabatan = DB::table('t_jabatan')->get();
                    $data = [
                        'judul'=> 'karyawan',
                        'content'=> 'ini halaman karyawan',
                        'karyawan'=> $karyawan,
                        'jabatan'=> $jabatan
                    ];
                    return redirect('karyawan');
        // return view('karyawan', compact('data'));
    }

    public function cari_karyawan($nama){
        
        
        $sqlquery = "SELECT t1.*, t2.jabatan
                    FROM t_karyawan AS t1
                    INNER JOIN t_jabatan AS t2  
                    USING(jabatan_id) 
                    WHERE t1.nama LIKE '%".$nama."%'";
                    
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
}

