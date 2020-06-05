<?php

namespace App\Http\Controllers\parents;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClassworkController extends Controller
{
    //
    public function clickSubject($subjectName){
        // $classId = \App\Myclass::where('class_id',\Auth::user()->class_id)
        //         ->pluck('id');

        //Find subject ID by Subject Name

        $subjectId = \App\Subject::where('name',$subjectName)
                                ->where('class_id',\Auth::user()->class_id)                                
                                ->pluck('id');

                                //$classworks = \App\Classwork::where('class_id',\Auth::user()->class_id)->get();        
        $classworks = \App\Classwork::with('subject')->where('subject_id',$subjectId)
                                    ->whereRaw('Date(date) >= CURDATE()-7')
                                    ->get();
        
        // return $classworks;
        return view('parents.classwork',compact('classworks'));
    }
}
