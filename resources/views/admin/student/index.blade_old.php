<!-- <html>
<head>
    <title>Laravel 7 Datatables Tutorial - ItSolutionStuff.com</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</head>
<body> -->
@extends('layouts.header');
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
    <div class="table-responsive">

    
        
    <table id="student-table" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th></th>
                <th></th>
                <th colspan="3">Student Detail</th>
                <th colspan="4">Father Detail</th>
                <th colspan="4">Mother Detail</th>
                
             </tr>   
            <tr>
               <th>id</th>
               <th>action</th>
                <th>first</th>
                <th>Last </th>
                <th>Class</th>
                <th>first</th>
                <th>Last </th>
                <th>Email</th>
                <th>Mobile</th>
                <th>first</th>
                <th>Last </th>
                <th>Email</th>
                <th>Mobile</th>
                
               
            </tr>
        </thead>
    </table>
    </div>
    </div>
    </div>

</div>
@endsection 
@section('script-additional')
    <script>


  $(document).ready(function () {
    
    var table = $('#student-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.student.index') }}",
        columns: [
            {data: 'id'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
            {data: 'first_name'},
            {data: 'last_name'},
            {data: 'myclass.name'},
            {data: 'first_name_father'},
            {data: 'last_name_father'},
            {data: 'email_father'},
            {data: 'mobile_father'},
            {data: 'first_name_mother'},
            {data: 'last_name_mother'},
            {data: 'email_mother'},
            {data: 'mobile_mother'},

           
        ]
    });
    
  });
</script>

@endsection