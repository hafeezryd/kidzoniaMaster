@extends('layouts.header') 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Homework List</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('admin.homework.create') }}"> Create New homework</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered compact">
        <tr>
            <th>Srno </th>
            <th>Date</th>
            <th>Class </th>
            <th>Subject</th>
            <th>Description</th>
            <th>File </th>
            <th width="280px">Action</th>
        </tr>
        {{$i =0}}
        @foreach ($homeworks as $homework)
        
        <tr>
            <td>{{ ++$i ?? '' }}</td>
            
            <td>{{date('d-m-Y', strtotime($homework->date))}}</td>
            <td>{{ $homework->myclass[0]->name}}</td>
            <td>{{ $homework->subject[0]->name}}</td>
            <td>{{ $homework->description }}</td>
            <td>{{ $homework->file_path }}</td>
            <td>
                <form action="{{ route('admin.homework.destroy',$homework->id) }}" method="POST">
                       <a class="btn btn-info" href="{{ route('admin.homework.show',$homework->id) }}">Show</a>
                       <a class="btn btn-primary" href="{{ route('admin.homework.edit',$homework->id) }}">Edit</a>
                       @csrf
                    @method('DELETE')
    
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    
      
@endsection