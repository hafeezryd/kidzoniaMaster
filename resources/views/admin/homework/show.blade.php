@extends('layouts.header')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2> Show homework</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('admin.homework.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date: </strong>
                {{ $homework->date }}
            </div>
        </div>
        
    </div>
    <div class="card-body">
        <table class="table table-responsive">
        <tr>
            <td> Class </td><td><strong> {{$homework->myclass[0]->name}} </strong></td>
        </tr>
        <tr>
            <td>{{$homework->subject[0]->name}} </td><td> <strong>{{$homework->description}}</strong></td>

        </tr>
        </table>
        @foreach (json_decode($homework->file_path) as $file)
           <a href= "{{asset('/storage/images/homework').'/'.$file }}" download>{{$file }}  </a>
        @endforeach
    </div>
@endsection