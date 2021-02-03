<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //
    public function user(){
        return $this->belongstoMany('App\User','user_group','group_id','user_id');
    }
}
