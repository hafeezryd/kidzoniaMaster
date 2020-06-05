<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dayplan;

class DayplanController extends Controller
{
    //
    public function index(){
        $classIds = \App\Myclass::where('school_id',\Auth::user()->school_id)
            ->pluck('id')
            ->toArray();    
        $dayplans = Dayplan::with('Myclass')
            ->whereIn('class_id',$classIds)->get();
        return view ('admin.dayplan.index',compact('dayplans'));
    }

    //create
    public function create(){

        $classes = \App\Myclass::where('school_id',\Auth::user()->school_id)
                ->get();

        $classIds = \App\Myclass::where('school_id',\Auth::user()->school_id)
                ->pluck('id')
                ->toArray();          
      
        return view('admin.dayplan.create',compact('classes'));
    }

     //store function
     public function store(request $request){
        // $todayDate = date('mm/dd/yyyy');
        
        $request->validate([
            'date' => 'required|date|after_or_equal:today|unique:dayplans',
            
        ],[
            'unique'=> 'Day Upload is duplicated'
        ]);


            $dayplan = new Dayplan;
            $dayplan->file_path = 'nofile';
            $dayplan->description = $request->title;
            $dayplan->user_id = \Auth::User()->id;
            
            $dayplan->class_id = $request->class;
            $dayplan->date = $request->date;
        
            
            //Images saving
            $filename = "";
            if($request->hasfile('image'))
            {
                           
                   //$name=$file->getClientOriginalName();
                   $file = $request->image;
                   $name = time().'-i'.$file->extension();
                   //$file->move(public_path('../../storage/images/dayplan'), $name);
                   $file->move(public_path('/storage/images/dayplan'), $name);                     
                   $filename = $name;  
              
              
            }  
          
            // $file= new File();
            $dayplan->file_path=$filename;
                   
                    
            
            $dayplan->save();
            return redirect()->route('admin.dayplan.index')
            ->with('success','Day plan created successfully.');
    }


    public function show(Dayplan $dayplan)
    {
        return view('admin.dayplan.show',compact('dayplan'));
    }

    public function destroy(Dayplan $dayplan)
    {
        $dayplan->delete();
  
        return redirect()->route('admin.dayplan.index')
                        ->with('success','dayplan  deleted successfully');
    }
}
