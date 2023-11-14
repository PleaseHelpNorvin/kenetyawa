<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class students extends Model
{
    use HasFactory;
    protected $table = "students";
    // protected $fillable = ['student_no','name','block','course', 'contact_no', 'email'];
    protected $fillable = ['student_no','name','block','batch','course', 'contact_no', 'email'];

}
