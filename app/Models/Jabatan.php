<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    
    protected $fillable = ['jabatan_id', 'jabatan'];

    protected $table = 't_jabatan';

    protected $primarykey = 'jabatan_id';

    public $timestamps = false;
}