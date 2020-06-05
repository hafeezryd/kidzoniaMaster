<?php

namespace App\Http\Controllers\parents;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentInfoController extends Controller
{
    //
    public function index(){
        // $studentDueFees = \App\fee_due::with('student')->get();
        $studentInfo = \App\Student::where('id',\Auth::user()->student_id)->with('myclass')->get();
        // return $studentInfo;
        $studentDueFees = \App\fee_due::with('fee_structure')->get();

     //   $fee_payment_methods = \App\fee_structure_detail::where('fee_structure_head_id','1')->get();

        return view('parents.studentinfo',compact('studentDueFees','studentInfo'));
        //  return $studentInfo;
    }
}
