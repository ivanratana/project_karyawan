<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    
    protected $fillable = ['id', 'nama', 'alamat', 'no_telp', 'jabatan_id'];

    protected $table = 't_karyawan';

    protected $primarykey = "id";

    public $timestamps = false;
}
