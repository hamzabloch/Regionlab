<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\client;
use App\Models\clientuser;
use App\Http\Controllers\clientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\clientuserController;

class clientuser extends Model
{
    use HasFactory;
    public function userbelongs(){
    	  return $this->belongsTo(user::class,'user_id');
    }
      public function clientbelongs(){
    	  return $this->belongsTo(client::class,'client_id');
    }
}
