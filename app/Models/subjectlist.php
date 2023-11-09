<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subjectlist extends Model
{
    use HasFactory;
    protected $table = "subjectlist";
    protected $fillable = ['subject_code','description'];
}
