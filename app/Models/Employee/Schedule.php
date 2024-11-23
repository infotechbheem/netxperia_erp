<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $table = 'schedules';

    protected $fillable = [
        'shift_name',
        'time_in',
        'time_out',
    ];
}
