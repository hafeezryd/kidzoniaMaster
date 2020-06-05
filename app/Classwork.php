<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classwork extends Model
{
    //
    public function  myclass(){
            return $this->hasMany('App\Myclass','id','class_id');
    }
    public function  subject(){
        return $this->hasMany('App\Subject','id','subject_id');
}
}
