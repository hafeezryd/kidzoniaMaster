@extends('layouts.header')
@section('content')
<div class="container-fluid" style="width: 200%">
    @foreach($days as $day)
    <img src= "{{asset('/storage/images/dayplan').'/'. $day->file_path }}" >
    @endforeach
</div>  
@endsection
