<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\teacherschedules;

class Faculty_List extends Model
{
    use HasFactory;
    protected $table = "facultylist";
    protected $fillable = ['id_no', 'name', 'course', 'email'];

    // public function teacherSchedule()
    // {
    //     return $this->hasMany(teacherschedules::class);
    // }
}
