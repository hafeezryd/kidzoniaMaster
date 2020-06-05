@extends('layouts.header') 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Month Theme List</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('admin.dayplan.create') }}"> Create New dayplan</a>
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
            
            <th>Description</th>
            <th>File </th>
            <th width="280px">Action</th>
        </tr>
        <!-- {{$i =0}} -->
        @foreach ($dayplans as $dayplan)
        
        <tr>
            <td>{{ ++$i ?? '' }}</td>
            
            <td>{{date('d-m-Y', strtotime($dayplan->date))}}</td>
            <td>{{ $dayplan->myclass[0]->name}}</td>
            
            <td>{{ $dayplan->description }}</td>
            <td><img style="width: 100px" src= "{{asset('/storage/images/dayplan').'/'.$dayplan->file_path }}" ></td>
            <td>
                <form action="{{ route('admin.dayplan.destroy',$dayplan->id) }}" method="POST">
                       <a class="btn btn-info" href="{{ route('admin.dayplan.show',$dayplan->id) }}"><i class="fas fa-eye"></i></a>
                       
                       @csrf
                    @method('DELETE')
    
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    
      
@endsection