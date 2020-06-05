<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class month_theme extends Model
{
    //
    // protected $table = "month_themes";
    public function  myclass(){
        return $this->hasMany('App\Myclass','id','class_id');
    }
}
