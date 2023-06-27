<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Ticket extends Pivot
{
    protected $table = 'employee_status';

    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_employee_status', 'employee_status_id', 'employee_id');
    }
}
