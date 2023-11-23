<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\teacherschedules;


class subject extends Model
{
    use HasFactory;
    protected $table = "subject";
    protected $fillable = ['subjectcode', 'subjectname'];

    // public function teacherSchedule()
    // {
    //     return $this->hasMany(teacherschedules::class);
    // }
}
