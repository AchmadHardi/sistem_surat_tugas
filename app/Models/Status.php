<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function employees()
    {
        return $this->belongsToMany(Employee::class)
            ->withPivot(['airline_name', 'price', 'seats', 'origin', 'destination', 'departure_time', 'arrival_time', 'departure_date', 'arrival_date']);
    }
}
