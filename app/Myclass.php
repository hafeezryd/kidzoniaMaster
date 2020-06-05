<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Myclass extends Model
{
    protected $table = "classes";
    //
    public function school()
    {
        return $this->belongsTo('App\School');
    }
}
