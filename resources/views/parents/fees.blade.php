@extends('layouts.header')

@section('content')
{{print_r($student= json_decode($studentFeeInfo))}}
<div class="container">
    <div class="card">
    <div class="card-body">
    
        <table class="table table-responsive">
            <tr>
                <td>Student Name</td>
                <td>{{$student->first_name}} <td>
                <td>{{$student->student_dues->fee_value}}</td>
                <td><a class="btn btn-success" href="{{url('/parents/ccavenuePayment/'.$student->id.'/'.$student->student_dues->fee_value)}}" >Pay Now</a></td>
                  
            </tr>
            <tr> 
            
        </table>

    </div>    
    </div>

</div>
<div class="row">
<div class="col-lg-4">
<table class="table table-responsive bordered">
<tr>
    <thead>
        <tr>
            <th>Fees Type</th>
            <th>Amount</th>
            <th>Paid</th>
            <th>Balance</th>
        </tr>
    </thead>
</tr>



@endsection