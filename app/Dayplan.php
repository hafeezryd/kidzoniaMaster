<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dayplan extends Model
{
    //
    public function  myclass(){
        return $this->hasMany('App\Myclass','id','class_id');
    }
}
