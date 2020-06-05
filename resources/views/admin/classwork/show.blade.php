@extends('layouts.header')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2> Show classwork</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('admin.classwork.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="card-body">
        <table class="table table-responsive">
        <tr>
            <td> Class </td><td><strong> {{$classwork->myclass[0]->name}} </strong></td>
        </tr>
        <tr>
            <td>{{$classwork->subject[0]->name}} </td><td> <strong>{{$classwork->description}}</strong></td>

        </tr>
        </table>
        <div class="row">
            
            <div class="card col">
                <div class="card-header">
                    <p>Pictures </p>
                </div>
                <div class="card-body">
                    @foreach (json_decode($classwork->image_files) as $file)
                    <img src="{{asset('/storage/images/classwork').'/'.$file }}" style="width: 200px">
                    @endforeach
                </div>
            </div>

            <div class="card col">
                <div class="card-header">
                    <p class="text-center text-primary">Videos </p>
                </div>
                <div class="card-body">
                    @foreach (json_decode($classwork->file_path) as $file)
                    <video width="320" height="240"  controls controlsList="nodownload" >
                        <source src="{{asset('/storage/images/classwork').'/'.$file }}" type="video/mp4">
                    </video>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection