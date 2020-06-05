@extends('layouts.header') 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Month Theme List</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('admin.monththeme.create') }}"> Create New monththeme</a>
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
        @foreach ($monththemes as $monththeme)
        
        <tr>
            <td>{{ ++$i ?? '' }}</td>
            
            <td>{{date('d-m-Y', strtotime($monththeme->date))}}</td>
            <td>{{ $monththeme->myclass[0]->name}}</td>
            
            <td>{{ $monththeme->description }}</td>
            <td><img style="width: 100px" src= "{{asset('/storage/images/monththeme').'/'.$monththeme->file_path }}" ></td>
            <td>
                <form action="{{ route('admin.monththeme.destroy',$monththeme->id) }}" method="POST">
                       <a class="btn btn-info" href="{{ route('admin.monththeme.show',$monththeme->id) }}"><i class="fas fa-eye"></i></a>
                       
                       @csrf
                    @method('DELETE')
    
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    
      
@endsection