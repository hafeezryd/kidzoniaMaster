@extends('layouts.header') 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Classwork List</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('admin.classwork.create') }}"> Create New Classwork</a>
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
        @foreach ($classworks as $classwork)
        
        <tr>
            <td>{{ ++$i ?? '' }}</td>
            
            <td>{{date('d-m-Y', strtotime($classwork->date))}}</td>
            <td>{{ $classwork->myclass[0]->name}}</td>
            <td>{{ $classwork->subject[0]->name}}</td>
            <td>{{ $classwork->description }}</td>
            <td>{{ $classwork->file_path }}</td>
            <td>
                <form action="{{ route('admin.classwork.destroy',$classwork->id) }}" method="POST">
                       <a class="btn btn-info" href="{{ route('admin.classwork.show',$classwork->id) }}">Show</a>
                       <a class="btn btn-primary" href="{{ route('admin.classwork.edit',$classwork->id) }}">Edit</a>
                       @csrf
                    @method('DELETE')
    
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    
      
@endsection