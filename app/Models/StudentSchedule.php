<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSchedule extends Model
{
    use HasFactory;
    protected $table = "student_schedules";
    protected $fillable = [
        'block_id',
        'batch_id',
        'room_code',
        'subject_name',
        'teacher_name',
        'day',
        'time_in',
        'time_out',
    ];

}
