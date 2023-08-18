<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Http\Controllers\userController;
use app\Http\Controllers\clientuserController;
use app\Http\Controllers\clientController;
use App\Models\client;
use App\Models\clientuser;
use App\Models\User;


class message extends Model
{
    use HasFactory;
   /*   public function usermessage()
    {
        return $this->belongsTo(User::class,'messages');
    }
*/

   public function sender()
    {
        return $this->belongsTo(User::class,'sender_id','id');
    }

public function reciever()
    {
        return $this->belongsTo(User::class,'reciever_id','id');
    }




}
