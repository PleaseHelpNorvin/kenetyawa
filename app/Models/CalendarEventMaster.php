<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarEventMaster extends Model
{
    use HasFactory;
    protected $table = 'events';
    protected $fillable = ['title','start_date','end_date'];
    
    // protected $primaryKey = 'event_id';
    // protected $fillable = ['event_name', 'event_start_date', 'event_end_date'];

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($event) {
    //         $latestEventId = self::max('event_id');
    //         $nextEventId = $latestEventId + 1;
    //         $event->event_id = $nextEventId;
    //     });
    // }
}
