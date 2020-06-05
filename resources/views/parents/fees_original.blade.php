@extends('layouts.header')

@section('content')


<div class="container">
    <div class="card">
    <div class="card-body">
    @foreach($studentInfo as $student)
        <table class="table table-responsive">
            <tr>
                <td>Student Name</td>
                <td>{{$student->first_name}} {{$student->last_name}}</td>
                  
            </tr>
        </table>
    @endforeach
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
@foreach($studentDueFees as $duefee )

            <tr>
                <td>{{$duefee->fee_structure->fee_type}}</td>
                <td>{{$duefee->fee_value}}</td>
                <td>{{$duefee->fee_paid}}</td>
                <td>{{$duefee->fee_value - $duefee->fee_paid}}</td>
                @if($duefee->fee_value - $duefee->fee_paid == '0' )
                    <td><a class="btn btn-success bt-sm " href="{{url('/parents/payment'.$duefee)}}" >Paid </a></td>
                @else
                    <td><a class="btn btn-success bt-sm " href="{{url('/parents/payment')}}" >Pay Now </a></td>
                @endif
    
            </tr>
@endforeach
</table>
</div>
<div class="col-lg-4">
    <h3>Terms wise</h3>
    <table class="table table-responsive">
    <tr>
        <th>Description </th>
        <th>Amount </th>
        <th>Pay Now </th>
    </tr>
    @foreach ($fee_payment_methods as $fpm)
    @if($fpm->fee_payment_type == "Term")
    <tr>
        <td>{{$fpm->fee_payment_desc}}</td>
        <td>{{$fpm->fee_payment_value}}</td>
        <td><a class="btn btn-success bt-sm " href="{{url('/parents/payment')}}" >Pay Now </a></td>
    </tr>
    @endif

    @endforeach
    </table>
</div>

<div class="col-lg-4">
    <h3>Monthly</h3>
    <table class="table ">
    <tr>
        <th>Description </th>
        <th>Amount </th>
        <th>Pay Now </th>
    </tr>
    @foreach ($fee_payment_methods as $fpm)
    @if($fpm->fee_payment_type == "Monthly")
    <tr>
        <td>{{$fpm->fee_payment_desc}}</td>
        <td>{{$fpm->fee_payment_value}}</td>
        <td><input type="button" class="btn btn-success bt-sm " name="fee_pay" value="Pay Now"></td>
    </tr>
    @endif

    @endforeach
    </table>
</div>

</div>
@endsection