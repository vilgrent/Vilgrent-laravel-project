<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class village_detail extends Model
{
    use HasFactory;
     protected $table ='village_details';
     protected $fillable =['village_image','village_name','district','address','village_pin_code','rural_id','map_details'];
}
