@extends('layouts.header')
@section('content')
<div class="row">
    <div class="col-lg-12 ">
        <div class="float-left">
            <h2>Add New homework</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-primary" href="{{ route('admin.homework.index') }}"> Back</a>
        </div>
    </div>
    <br>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('admin.homework.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
  
    <form>

    <div class="form-group row">
     <label for="Date" class="col-sm-2 col-form-label">Date</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" id="date" name="date">
        </div>
    </div>

    <div class="form-group row">
     <label for="class" class="col-sm-2 col-form-label">Class</label>
        <div class="col-sm-10" >
        <select name="class" id="class" class="float-left">
            <option value="0"> Select </option>
        @foreach($classes as $class)

             <option value="{{$class->id}}">{{$class->name}}</option>
               
        @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
     <label for="subject" class="col-sm-2 col-form-label">Subject</label>
        <div class="col-sm-10" >
        <select name="subject" id="subject" class="float-left">
        @foreach($subjects as $subject)
                <option value="{{$subject->id}}">{{$subject->name}}</option>
                
        @endforeach
            </select>
        </div>
    </div>  

    <div class="form-group row">
     <label for="title" class="col-sm-2 col-form-label">Title</label>
        <div class="col-sm-10">
          <input type="text" class="float-left" name="title" id="title"> 
        </div>
    </div>
    <div class="form-group row">
     <label for="image" class="col-sm-2 col-form-label">Worksheet  </label>
        <div class="col-sm-10">
          <input class="float-left" type="file" name="image[]" id="image" multiple="multiple"> 
        </div>
    </div>
    <!-- <div class="form-group row">
     <label for="image" class="col-sm-2 col-form-label">Video Files </label>
        <div class="col-sm-10">
          <input class="float-left" type="file" name="videoFiles[]" id="videoFiles" multiple="multiple"> 
        </div>
    </div> -->
  
  
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>

   
</form>
@endsection

@section('script-additional')
<script>
$(document).ready(function(){
    $('#class').change(function(){
        var classId = $(this).val();
        console.log(classId);
        $.ajax({
            url: '/admin/getSection/'+classId,
            type: 'GET',
            dataType: 'json',
            success: function(data){
                console.log(data);
                $('#subject').empty();
                $.each(data,function(key,value){
                    $('#subject').append('<option value=" ' + key +'">' +value + '</option>');
                });
            }
        });
    });
})
</script>
@endsection