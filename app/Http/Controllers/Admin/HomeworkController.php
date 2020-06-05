<?php

namespace App\Http\Controllers\Admin;
use App\Homework;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeworkController extends Controller
{
    //
    public function index(){
        $classIds = \App\Myclass::where('school_id',\Auth::user()->school_id)
            ->pluck('id')
            ->toArray();    
        $homeworks = Homework::with('Myclass','subject')
            ->whereIn('class_id',$classIds)->get();
        return view ('admin.homework.index',compact('homeworks'));
    }

    //create
    public function create(){

        $classes = \App\Myclass::where('school_id',\Auth::user()->school_id)
                ->get();

        $classIds = \App\Myclass::where('school_id',\Auth::user()->school_id)
                ->pluck('id')
                ->toArray();          
      
        $subjects = \App\Subject::whereIn('class_id',$classIds)
                ->get();

        return view('admin.homework.create',compact('classes','subjects'));
    }

    //store function
    public function store(request $request){
        // $todayDate = date('mm/dd/yyyy');
        $request->validate([
            'date' => 'required|date|after_or_equal:today'
        ]);

            $homework = new homework;
            $homework->file_path = 'nofile';
            $homework->description = $request->title;
            $homework->user_id = \Auth::User()->id;
            $homework->subject_id = $request->subject;
            $homework->class_id = $request->class;
            $homework->date = $request->date;
            
            //Images saving
            $data[]= 'nofile';
            if($request->hasfile('image'))
            {
                $x = 1;
               foreach($request->file('image') as $file)
               {
                   //$name=$file->getClientOriginalName();
                   $name = time().'-i'.$x.'.'.$file->extension();
                   //$file->move(public_path('../../storage/images/homework'), $name);
                   $file->move(public_path('/storage/images/homework'), $name);                     
                   $data[] = $name;  
                   $x++;
               }
            }
            // $file= new File();
            
            $homework->file_path=json_encode($data);
            $data= array();
          
                    
            
            $homework->save();
            return redirect()->route('admin.homework.index')
            ->with('success','homework created successfully.');
    }

    //show function
    public function destroy(homework $homework)
    {
        $homework->delete();
  
        return redirect()->route('admin.homework.index')
                        ->with('success','homework  deleted successfully');
    }

    public function show(homework $homework)
    {
        return view('admin.homework.show',compact('homework'));
    }

    public function getSection($id){
        $subjects = \App\Subject::where('class_id',$id)->pluck('name','id');
        return json_encode($subjects);
    }

}
