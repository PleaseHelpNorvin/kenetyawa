<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\students;


class block extends Model
{
    use HasFactory;
    protected $table = "blocks";
    protected $fillable = ['block_name','batch_id'];

    public function students()
    {
        return $this->hasMany(students::class, 'block', 'id');
    }


    // Define a method to delete associated students
    public function deleteWithStudents()
    {
        $this->students()->delete();
        $this->delete();
    }
}
