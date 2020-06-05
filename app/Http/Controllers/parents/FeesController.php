<?php

namespace App\Http\Controllers\parents;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeesController extends Controller
{
    //
    public function index(){
        // $studentDueFees = \App\fee_due::with('student')->get();
        //for all
        // $studentInfo = \App\Student::where('id',\Auth::user()->student_id)->get();
        //individual student
        $studentInfo = \App\Student::where('id',\Auth::user()->student_id)->find(1);
        
        // return $studentInfo;
        $studentDueFees = \App\fee_due::with('fee_structure')->get();
        $fee_payment_methods = \App\fee_structure_detail::where('fee_structure_head_id','1')->get();

        $studentFeeInfo = \App\Student::where('id',\Auth::user()->student_id)
                        ->with('studentDues')
                        ->find(1);

        // return view('parents.fees',compact('studentDueFees','studentInfo','fee_payment_methods'));

        //single student fee detail 
        // return $studentFeeInfo;
        return view('parents.fees',['studentFeeInfo'=> $studentFeeInfo]);
    }
}
