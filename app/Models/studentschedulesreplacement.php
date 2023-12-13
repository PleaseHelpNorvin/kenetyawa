<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studentschedulesreplacement extends Model
{
    use HasFactory;
    protected $table = "student_schedulesreplacement";
    protected $fillable = [
        'block_id',
        'batch_id',
        'student_name',
        'room_code',
        'subject_name',
        'teacher_name',
        'day',
        'status',
        'time_in',
        'time_out',
    ];
}
