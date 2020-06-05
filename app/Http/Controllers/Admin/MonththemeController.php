<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\month_theme;

class MonththemeController extends Controller
{
    //
    public function index(){
        $classIds = \App\Myclass::where('school_id',\Auth::user()->school_id)
            ->pluck('id')
            ->toArray();    
        $monththemes = month_theme::with('Myclass')
            ->whereIn('class_id',$classIds)->get();
        return view ('admin.monththeme.index',compact('monththemes'));
    }

    //create
    public function create(){

        $classes = \App\Myclass::where('school_id',\Auth::user()->school_id)
                ->get();

        $classIds = \App\Myclass::where('school_id',\Auth::user()->school_id)
                ->pluck('id')
                ->toArray();          
      
        return view('admin.monththeme.create',compact('classes'));
    }

     //store function
     public function store(request $request){
        // $todayDate = date('mm/dd/yyyy');
        $request->month_theme = date('mY',strtotime($request->date));
        $request->validate([
            'date' => 'required|date|after_or_equal:today',
            
        ],[
            'unique'=> 'Month theme is duplicated'
        ]);


            $monththeme = new month_theme;
            $monththeme->file_path = 'nofile';
            $monththeme->description = $request->title;
            $monththeme->user_id = \Auth::User()->id;
            
            $monththeme->class_id = $request->class;
            $monththeme->date = $request->date;
            $monththeme->month_theme = date('mY',strtotime($request->date));
            
            //Images saving
            $filename = "";
            if($request->hasfile('image'))
            {
                           
                   //$name=$file->getClientOriginalName();
                   $file = $request->image;
                   $name = time().'-i'.$file->extension();
                   //$file->move(public_path('../../storage/images/monththeme'), $name);
                   $file->move(public_path('/storage/images/monththeme'), $name);                     
                   $filename = $name;  
              
              
            }  
          
            // $file= new File();
            $monththeme->file_path=$filename;
                   
                    
            
            $monththeme->save();
            return redirect()->route('admin.monththeme.index')
            ->with('success','homework created successfully.');
    }


    public function show(month_theme $monththeme)
    {
        return view('admin.monththeme.show',compact('monththeme'));
    }

    public function destroy(month_theme $monththeme)
    {
        $monththeme->delete();
  
        return redirect()->route('admin.monththeme.index')
                        ->with('success','monththeme  deleted successfully');
    }

}
