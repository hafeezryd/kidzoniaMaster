@extends('layouts.header')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2> Show Month Theme</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('admin.dayplan.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date: </strong>
                {{ $dayplan->date }}
            </div>
        </div>
        
    </div>
    <div class="card-body">
        <table class="table table-responsive">
        <tr>
            <td> Class </td><td><strong> {{$dayplan->myclass[0]->name}} </strong></td>
        </tr>
        <tr>
           <td> <strong>{{$dayplan->description}}</strong></td>

        </tr>
        </table>
        
            @if ($dayplan->file_path)
                <img src= "{{asset('/storage/images/dayplan').'/'.$dayplan->file_path }}" >
            @endif
        
    </div>
@endsection