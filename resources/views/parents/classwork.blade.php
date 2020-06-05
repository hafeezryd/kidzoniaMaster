@extends('layouts.header')
@section('content')
<div class="float-button">
    <button data-toggle="modal" data-target=".your-modal"></button>
</div>
<div class="row">
        <div class="col-lg-12">
            <h2 style="text-align: center">C L A S S W O R K    </h2>
        </div>       
</div>
@for ($i = 0; $i < 7; $i++)
   <a class="btn btn-success" href="#{{ date('d-m-Y',strtotime('-'.$i .' Days'))}}">{{ date('d-m-Y',strtotime('-'.$i .' Days'))}}</a>
@endfor
<br>
<br>
@for ($i = 0; $i < 7; $i++)
<section id="{{ date('d-m-Y',strtotime('-'.$i .' Days'))}}">
<div class="row">
<div class="col-lg-12">
        <div class="card border-primary">
                    <div class="card-header text-primary">
                        <p class="text-monoscope text-center">Classwork on  {{ date('d-m-Y',strtotime('-'.$i .' Days'))}} </p>
                    </div>
@php $hwfound = 0; @endphp                    
@foreach($classworks as $classwork)
    @if(date('Y-m-d',strtotime($classwork->date)) === date('Y-m-d',strtotime('-'.$i .' Days')))

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
                    <img src="{{asset('images/classwork/').'/'.$file }}" style="width: 200px">
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
                        <source src="{{asset('images/classwork/').'/'.$file }}" type="video/mp4">
                    </video>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
     
        
        
    @php $hwfound = 1; @endphp
    @endif    
@endforeach
@if($hwfound ===0)
<h2 class="text-center">No Classwork</h2>
<!-- <img style="width: 10%" src="{{asset('images/classwork/no-classwork.jpg') }}">  -->
@endif
</div>
     </div>
</div>
</section>
<hr class="btn-warning">
@endfor

 @endsection
@section('script-additional')
<script>
$(document).ready(function(){
    $('#seldate').change(function(){
        alert('date change');
    })
})
// $(document).ready(function(){
//       $("#seldate").datepicker({
//         "dateFormat": "dd-mm-yy",
//         "minDate": -7,
//         "maxDate": new Date()
//     })
//     .attr("readonly", true);
//   })
  </script> 

@endsection