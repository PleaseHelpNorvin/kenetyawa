<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studentbatches extends Model
{
    use HasFactory;
    protected $table = "studentbatch";
    protected $fillable = ['student_no', 'year', 'start_date', 'end_date', 'block'];
}
