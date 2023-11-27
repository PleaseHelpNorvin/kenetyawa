<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\block;

class batch extends Model
{
    use HasFactory;
    protected $table = "studentbatch";
    protected $fillable = ['batch_name'];


    public function blocks()
    {
        return $this->hasMany(block::class);
    }

    // Define a method to delete associated blocks and students
    public function deleteWithBlocksAndStudents()
    {
        foreach ($this->blocks as $block) {
            $block->deleteWithStudents();
        }

        $this->delete();
    }
}
