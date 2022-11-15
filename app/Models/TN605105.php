<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TN605105 extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='user_details';
    protected $primaryKey = 'user_id';
    protected $fillable=['user_name','user_email_id','user_phone_number','user_village','user_age','user_sex', 'user_occupation','user_address','user_map_details'];
}
