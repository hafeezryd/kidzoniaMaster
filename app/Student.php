<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $fillable = [
        'first_name', 'last_name','dob','first_name_father','last_name_father','email_father','mobile_father',
        'first_name_mother','last_name_mother','mobile_mother','email_mother','class_id','admission_no','gender'
       ];

    public function myclass(){
        return $this->hasOne('App\Myclass','id','class_id');
    }
    public function studentDues(){
        return $this->hasOne('App\fee_due','id','fee_id');
    }

}
