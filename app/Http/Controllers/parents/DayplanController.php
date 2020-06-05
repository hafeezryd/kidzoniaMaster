<?php

namespace App\Http\Controllers\parents;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DayplanController extends Controller
{
    //
    public function getMonth(){
        return view('parents.dayplan')->with('currentMonth',date('M'));
    }
}
