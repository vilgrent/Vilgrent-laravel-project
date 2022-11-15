<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PinNumber extends Model
{
    use HasFactory;
    public $timestamps = false;
   
    protected $table='user_details';
    protected $primaryKey = 'user_id';
    protected $fillable=['pin_number'];
}
