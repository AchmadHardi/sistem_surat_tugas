<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratTugas extends Model
{
    protected $guarded=[];

    // use HasFactory;
    protected $fillable = [
        'id_karyawan',
        'no_st',
        'tgl_pergi',
        'tgl_pulang',
        'asal',
        'tujuan',
        'is_assign',
             
    ];
}
