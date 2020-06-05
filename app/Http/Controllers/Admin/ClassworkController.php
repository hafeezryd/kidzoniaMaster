<?php

namespace App\Http\Controllers\Admin;
use App\School;
use App\Classwork;
use App\Model;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassworkController extends Controller
{
    //
    public function index(){
        // $classworks = DB::table('Classworks')->get();

        //db facades class
        // $classworks = DB::table('classworks')
        //     ->join('classes', 'classworks.class_id', '=', 'classes.id')
        //     ->join('subjects','classworks.subject_id','=','subjects.id')
        //     ->select('classworks.*','classes.name as classname','subjects.name as subjectname')
        //     ->get();
        // return view ('admin.classwork.index',compact('classworks'));


        //   $classworks = Classwork::with('Myclass','subject')->latest()->paginate(5);
        //       return view('admin.classwork.index',compact('classworks'))
        //      ->with('i', (request()->input('page', 1) - 1) * 5);

        // $classwork = Classwork::bySchool(auth()->user()->school_id)->with('Myclass','subject')->get(); 
        
        //to get all classes of login admin schools 
        // $classes = \App\Myclass::where('school_id',\Auth::user()->school_id)
        //           ->get();


        $classIds = \App\Myclass::where('school_id',\Auth::user()->school_id)
                  ->pluck('id')
                  ->toArray();          

                
        $classworks = Classwork::with('Myclass','subject')
             ->whereIn('class_id',$classIds)->get();

        
        return view ('admin.classwork.index',compact('classworks'));
        
    }
    public function create(){

        $classes = \App\Myclass::where('school_id',\Auth::user()->school_id)
                ->get();

        $classIds = \App\Myclass::where('school_id',\Auth::user()->school_id)
                ->pluck('id')
                ->toArray();          
      
        $subjects = \App\Subject::whereIn('class_id',$classIds)
                ->get();

        return view('admin.classwork.create',compact('classes','subjects'));
    }
    public function store(request $request){
        // $todayDate = date('mm/dd/yyyy');
        $request->validate([
            'date' => 'required|date|after_or_equal:today'
        ]);

            $classwork = new Classwork;
            $classwork->file_path = 'nofile';
            $classwork->description = $request->title;
            $classwork->user_id = \Auth::User()->id;
            $classwork->subject_id = $request->subject;
            $classwork->class_id = $request->class;
            $classwork->date = $request->date;
            
            //Images saving
            if($request->hasfile('image'))
            {
                $x = 1;
               foreach($request->file('image') as $file)
               {
                   //$name=$file->getClientOriginalName();
                   $name = time().'-i'.$x.'.'.$file->extension();
                   //live server
                   //$file->move(public_path('../../storage/images/classwork'), $name);                     
                   $file->move(public_path('storage/images/classwork'), $name);                     
                   $data[] = $name;  
                   $x++;
               }
            }
            // $file= new File();
            $classwork->image_files=json_encode($data);
            $data= array();
            //Video Saving
            if($request->hasfile('videoFiles'))
            {
                $x = 1;
               foreach($request->file('videoFiles') as $file)
               {
                   //$name=$file->getClientOriginalName();
                   $name = time().'-v'.$x.'.'.$file->extension();
                   //live server
                   //$file->move(public_path('../../storage/images/classwork'), $name);                     
                   $file->move(public_path('storage/images/classwork'), $name);                     
                   $data[] = $name;  
                   $x++;
               }
            }
            // $file= new File();
            $classwork->file_path=json_encode($data);
   
            
            
            // $input = $request->all();
            // if ($request->hasFile('image')){
            //     $input['image'] = time().'.'.$request->image->extension();
            //     $request->image->move(public_path('images\classwork'), $input['image']);
            // } 
            // else { $input['image']='nofile';}

            // $classwork->file_path = $input['image'];
            $classwork->save();
            return redirect()->route('admin.classwork.index')
            ->with('success','Classwork created successfully.');
    }
    public function destroy(Classwork $classwork)
    {
        $classwork->delete();
  
        return redirect()->route('admin.classwork.index')
                        ->with('success','Classwork  deleted successfully');
    }

    public function show(Classwork $classwork)
    {
        return view('admin.classwork.show',compact('classwork'));
    }

    public function getSection($id){
        $subjects = \App\Subject::where('class_id',$id)->pluck('name','id');
        return json_encode($subjects);
    }
}

