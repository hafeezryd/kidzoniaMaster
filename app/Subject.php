<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //
    public function myclass() {
        return $this->belongsTo('App\Myclass','id','class_id');
    }
}
