<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    // use HasFactory;
    protected $table = 'pembelian';

    protected $fillable = [
        'id_karyawan',
        'id_atasan',
        'id_tiket',
        'id_surat_tugas',
        'status',
    ];
}
