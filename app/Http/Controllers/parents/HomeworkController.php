<?php

namespace App\Http\Controllers\parents;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeworkController extends Controller
{
    //
     //
     public function clickSubject($subjectName){
        
        //Find subject ID by Subject Name
       $subjectId = \App\Subject::where('name',$subjectName)
                                ->where('class_id',\Auth::user()->class_id)
                                
                                ->pluck('id');

        //$homeworks = \App\homework::where('class_id',\Auth::user()->class_id)->get();        
        $homeworks = \App\Homework::with('subject')->where('subject_id',$subjectId)
                                    ->whereRaw('Date(date) >= CURDATE()-7')
                                    ->get();
        
        // return $homeworks;
        return view('parents.homework',compact('homeworks'));
    }
    public function getHomework($subjectName,$date){
       //Find subject ID by Subject Name
        $subjectId = \App\Subject::where('name',$subjectName)
                                ->where('class_id',\Auth::user()->class_id)                          
                                ->pluck('id');
       
        $homeworks = \App\homework::with('subject')->where('subject_id',$subjectId)
                                    ->whereRaw('Date(date) >= '.$date)
                                    ->get();
       
        // return $homeworks;
        return view('parents.homework',compact('homeworks'));
    }
    public function index(){
        //Find subject ID by Subject Name
         $subjectId = \App\Subject::where('name',$subjectName)
                                 ->where('class_id',\Auth::user()->class_id)                          
                                 ->pluck('id');
        
         $homeworks = \App\homework::with('subject')->where('subject_id',$subjectId)
                                     ->whereRaw('Date(date) >= '.$date)
                                     ->get();
        
         // return $homeworks;
         return view('parents.homework',compact('homeworks'));
     }
 

}
