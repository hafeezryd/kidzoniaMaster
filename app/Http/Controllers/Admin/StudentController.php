<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use App\Student;
use App\Myclass;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class StudentController extends Controller
{
    //
    public function index(Request $request){
        // $students = Student::with('myclass')->get();
        // return Datatables::of(Student::query())->make(true);
        // return $students;
        if ($request->ajax()) {
            // $data = Student::latest()->get();
            $data = Student::with('myclass')->get();
            // return Datatables::of(Student::query())->make(true);
            
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                              
                        $btn = '<button type="button" name="edit" id="'.$row->id.'" class="edit btn btn-primary btn-sm"><i class="fas fa-edit"></i></button>';
                        $btn .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="'.$row->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                           
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
         
        }
      
        return view('admin.student.index');
    }
    public function store(Request $request)
    {
        $rules = array(
            'first_name'    =>  'required',
            'dob'     =>  'required'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'first_name'        =>  $request->first_name,
            'last_name'         =>  $request->last_name,
            'dob'               =>  $request->dob,
            'first_name_father' =>  $request->first_name_father,
            'last_name_father'  =>  $request->last_name_father,
            'email_father'      =>  $request->email_father,
            'mobile_father'      => $request->mobile_father,
            'first_name_mother' =>  $request->first_name_mother,
            'last_name_mother'  =>  $request->last_name_mother,
            'email_mother'      =>  $request->email_mother,
            'mobile_mother'      => $request->mobile_mother,
            'class_id'          =>  1,
            'admission_no'      =>  2,
            'gender'            =>  $request->gender,
        );

        Student::create($form_data);

        return response()->json(['success' => 'Data Added successfully.']);

    }

    public function edit($id)
    {
        if(request()->ajax())
        {
            $data = Student::with('myclass')->findOrFail($id);
            //$data = Student::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    //update function
    public function update(Request $request, Student $sample_data)
    {
        $rules = array(
            'first_name'        =>  'required',
            'dob'         =>  'required'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'first_name'    =>      $request->first_name,
            'last_name'     =>      $request->last_name,
            'dob'               =>  $request->dob,
            'first_name_father' =>  $request->first_name_father,
            'last_name_father'  =>  $request->last_name_father,
            'email_father'      =>  $request->email_father,
            'mobile_father'      => $request->mobile_father,
            'first_name_mother' =>  $request->first_name_mother,
            'last_name_mother'  =>  $request->last_name_mother,
            'email_mother'      =>  $request->email_mother,
            'mobile_mother'      => $request->mobile_mother,
            'class_id'          =>  1,
            'admission_no'      =>  2,
            'gender'            =>  $request->gender,
        );

        Student::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Data is successfully updated']);

    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sample_data  $sample_data
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Student::findOrFail($id);
        $data->delete();
    }

}
