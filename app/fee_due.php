<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fee_due extends Model
{

    //
    public function student(){
        return $this->belongsTo('App\Student','id','student_id');
    }
    public function fee_structure(){
        return $this->hasOne('App\fee_structure_head','id','fee_structure_head_id');
    }
}
