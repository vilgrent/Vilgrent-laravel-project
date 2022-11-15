<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    use HasFactory;
     public $timestamps = false;
   
    protected $table='user_details';
    protected $primaryKey = 'user_id';
    
    protected $fillable=['pin_number','user_phone_number','role_as','subscribe_villageid','user_id'];
}
