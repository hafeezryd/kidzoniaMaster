@extends('layouts.header')
@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-center">
                <h2>Classwork</h2>
            </div>
        
        </div>       
</div>

    <div class="row">
        @foreach($classworks as $classwork)

        <div class="col-lg-12">
        <table class="table table-responsive">
        <tr>
            <td> Class </td><td><strong> {{$classwork->myclass[0]->name}} </strong></td>
        </tr>
        <tr>
            <td>{{$classwork->subject[0]->name}} </td><td> <strong>{{$classwork->description}}</strong></td>

        </tr>
        </table>
            
        </div>
    </div>
    <div class="row">
            
                <div class="card col">
                    <div class="card-header">
                        <p>Pictures </p>
                    </div>
                    <div class="card-body">
                        @foreach (json_decode($classwork->image_files) as $file)
                        <img src="{{asset('images/classwork/').'/'.$file }}" style="width: 200px">
                        @endforeach
                    </div>
                </div>

                <div class="card col">
                    <div class="card-header">
                        <p>Videos </p>
                    </div>
                    <div class="card-body">
                        @foreach (json_decode($classwork->file_path) as $file)
                        <video width="320" height="240"  controls controlsList="nodownload" >
                            <source src="{{asset('images/classwork/').'/'.$file }}" type="video/mp4">
                        </video>
                        @endforeach
                    </div>
                </div>
     </div>
        
        @endforeach
      
         
    

@endsection
