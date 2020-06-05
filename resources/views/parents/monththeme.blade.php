@extends('layouts.header')
@section('content')
@foreach($monththemes as $mt)
<div class="container-fluid" style="width: 200%">
    <img src= "{{asset('/storage/images/monththeme').'/'. $mt->file_path }}" >    
</div>  
@endforeach
@endsection
