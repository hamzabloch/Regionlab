<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\clientController;
use App\Http\Controllers\clientuserController;
use App\Http\Controllers\userController;
use App\Models\clientuser;

class Client extends Model
{
    use HasFactory;
      
   protected $guarded = [];

    /*protected $guarded=[];*/

  
   public function users()
    {
        return $this->belongsToMany(User::class, 'clientusers', 'client_id', 'user_id');
    }


}
