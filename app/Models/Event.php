<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
     protected $table ='event_details';
     protected $fillable =['event_name','event_date','address','event_start_date','event_end_date','event_map_details','event_photo'];
}
