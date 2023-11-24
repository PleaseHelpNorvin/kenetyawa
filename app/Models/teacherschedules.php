<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Faculty_List;
// use App\Models\subject;
// use App\Models\room;


class teacherschedules extends Model
{
    use HasFactory;
    protected $table ="teacherschedule";
    protected $fillable = ['faculty_list_id','day','time_from','time_to','year','semester','faculty_list_id','room_id','subject_id'];

    
    // public function teacher()
    // {
    //     return $this->belongsTo(Faculty_List::class, 'faculty_list_id');
    // }

    // public function subject()
    // {
    //     return $this->belongsTo(Subject::class, 'subject_id');
    // }

    // public function room()
    // {
    //     return $this->belongsTo(Room::class, 'room_id');
    // }
}
