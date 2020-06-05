<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    //
    protected $fillable = [
        'name', 'about', 'medium', 'code', 'theme',
    ];

    public function users()
  {
    return $this->hasMany('App\User');
  }
  public function myclass()
  {
    return $this->hasMany('App\Myclass','id','class_id');
  }
  
}
