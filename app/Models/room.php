<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\teacherschedules;

class room extends Model
{
    use HasFactory;
    protected $table = "rooms";
    protected $fillable = ['roomcode'];

    // public function teacherSchedule()
    // {
    //     return $this->hasMany(teacherschedules::class);
    // }
}
