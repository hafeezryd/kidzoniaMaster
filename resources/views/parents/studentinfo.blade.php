@extends('layouts.header')
@section('content')

<div class="container">
    <div class="card">
    <div class="card-header">
        <h3> Student Information </h3>
    </div>
    <div class="card-body">
    @foreach($studentInfo as $student)
        <table class="table table-responsive">
            <tr>
                <td>Student Name</td>
                <td><strong>{{$student->first_name}} {{$student->last_name}}</strong></td>
            </tr><tr>   
                <td>Date of Birth</td>
                <td class="font-weight-bold">{{date('d-m-Y',strtotime($student->dob))}}</td>
            </tr><tr>       
                <td>Class</td>
                <td class="font-weight-bold">{{$student->myclass->name}}</td>
            </tr>
            <tr>
                <td>Father Name </td>
                <td class="font-weight-bold">{{$student->first_name_father}} {{$student->last_name_father}}</td>
                <td>Email</td>
                <td class="font-weight-bold">{{$student->email_father}} </td>
                <td>Mobile </td>
                <td class="font-weight-bold">{{$student->mobile_father}} </td>
            </tr>
            <tr>
                <td>Mother Name </td>
                <td class="font-weight-bold">{{$student->first_name_mother}} {{$student->last_name_mother}}</td>
                <td>Email</td>
                <td class="font-weight-bold">{{$student->email_mother}} </td>
                <td>Mobile </td>
                <td class="font-weight-bold">{{$student->mobile_mother}} </td>
            </tr>
        </table>
    @endforeach
    </div>    
    </div>
</div>
@endsection