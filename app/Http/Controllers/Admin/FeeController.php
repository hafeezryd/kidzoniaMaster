<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Student;
use DataTables;

class FeeController extends Controller
{
    //
    public function index(Request $request){
          if ($request->ajax()) {
                $data = Student::with('myclass','studentDues')->get();
               
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                              
                        $btn = '<button type="button" name="edit" id="'.$row->id.'" class="edit btn btn-primary btn-sm"><i class="fas fa-edit"></i></button>';
                                                   
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
         
        }
      
        return view('admin.fee.index');
    }

    public function edit($id)
    {
        if(request()->ajax())
        {
            $data = Student::with('myclass','studentDues')->findOrFail($id);
            //$data = Student::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }
  
}
