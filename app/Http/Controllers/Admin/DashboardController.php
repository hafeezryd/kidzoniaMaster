<?php

namespace App\Http\Controllers\Admin;

use App\Model;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
      //$files = User::bySchool(\Auth::user()->id)->where('active',1)->get();

      //return view('admin.dashboard',['files'=>$files]);
      return view('admin.dashboard');
    }
}
