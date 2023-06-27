<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Employee extends Model
{
    // use HasFactory;
    protected $guarded = [];

    public function statuses()
    {
        return $this->belongsToMany(Status::class)
            ->withPivot(['airline_name', 'price', 'seats', 'origin', 'destination', 'departure_time', 'arrival_time']);
    }
 

    public function position()

    {
        return $this->belongsTo(Position::class);
    }

    public function jabatan(): belongsTo
    {
        return $this->belongsTo(Jabatan ::class);
    }
    
    public function tickets()
    {
        return $this->belongsToMany(Ticket::class, 'employee_employee_status', 'employee_id', 'employee_status_id');
        return $this->belongsToMany(Ticket::class, 'employee_employee_status', 'employee_id', 'employee_status_id');
    }

}
