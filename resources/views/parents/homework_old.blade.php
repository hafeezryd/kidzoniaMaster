@extends('layouts.header')
@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-center">
              <h2>Homework    </h2>
            </div>
        
        </div>       
</div>
    
    <div class="row">
        @if (count($homeworks) >= 1)
        <!-- <img style="width: 20%" src="{{asset('images/homework/homework.jpg') }}">  -->
<!-- 
        <select name="seldate" id="seldate">
        @foreach($homeworks as $hw)
         <option value="{{$hw->date}}">{{$hw->date}} </option>
        @endforeach -->
        <br>
        
        <input type="date" name="seldate" id="seldate" min= "{{ date('Y-m-d',strtotime('-7 Days'))}}" max = "{{ date('Y-m-d')}}" value="{{ date('Y/m/d')}}">
        </select>
        @foreach($homeworks as $homework)

        <div class="col-lg-12">
        <table class="table table-responsive">
        <tr>
            <td> Class </td><td><strong> {{$homework->myclass[0]->name}} </strong></td>
        </tr>
        <tr>
            <td>{{$homework->subject[0]->name}} </td><td> <strong>{{$homework->description}}</strong></td>

        </tr>
        </table>
            
        </div>
    </div>
    <div class="row">
            
                <div class="card col">
                    <div class="card-header">
                        <p>Material for Download </p>
                    </div>
                    <div class="card-body">
                        @foreach (json_decode($homework->file_path) as $file)
                        <a href= "{{asset('images/homework/').'/'.$file }}" download>{{$file }}  </a>
                        
                        @endforeach
                    </div>
                </div>
     </div>
        
        @endforeach
        @else 
        <div class="container">
         <!-- <h5> No Homework for Today</h5> -->
         <img style="width: 20%" src="{{asset('images/homework/no-homework.jpg') }}"> 
         </div>
        @endif
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