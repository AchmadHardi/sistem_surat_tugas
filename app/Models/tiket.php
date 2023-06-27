<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class tiket extends Model
{
    // use HasFactory;
    
    protected $fillable = [
      
        'nama_maskapai',
        'harga',
        'tgl_pergi',
        'tgl_pulang',
        'asal',
        'tujuan',
        'jumlah_kursi',
        'kelas',
        'status',      
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
