@extends('layouts.header')
@section('content')
<div class="row">
        <div class="col-lg-12">
            <h2 style="text-align: center">Homework    </h2>
        </div>       
</div>
@for ($i = 0; $i < 7; $i++)
   <a class="btn btn-success" href="#{{ date('d-m-Y',strtotime('-'.$i .' Days'))}}">{{ date('d-m-Y',strtotime('-'.$i .' Days'))}}</a>
@endfor


@for ($i = 0; $i < 7; $i++)
<section id="{{ date('d-m-Y',strtotime('-'.$i .' Days'))}}">
<div class="row">
<div class="col-lg-12">
        <div class="card">
                    <div class="card-header">
                        <p>Homework on  {{ date('d-m-Y',strtotime('-'.$i .' Days'))}} </p>
                    </div>
@php $hwfound = 0; @endphp                    
@foreach($homeworks as $homework)

 
    @if(date('Y-m-d',strtotime($homework->date)) === date('Y-m-d',strtotime('-'.$i .' Days')))

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
           <a href= "{{asset('images/homework/').'/'.$file }}" download>{{$file }}  </a>
                     @endforeach
                    </div>
     
        
        
    @php $hwfound = 1; @endphp
    @endif    
@endforeach
@if($hwfound ===0)
<img style="width: 10%" src="{{asset('images/homework/no-homework.jpg') }}"> 
@endif
</div>
     </div>
</div>
</section>
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