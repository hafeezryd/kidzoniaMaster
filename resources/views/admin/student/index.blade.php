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
<div align="right">
      <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Create Record</button>
</div>
<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th></th>
                <th>First name</th>
                
                <th>class</th>
                <th>father</th>
                <th>mobile</th>
                <th>action</th>
            </tr>
        </thead>
        <tfoot >
            <tr>
                <th></th>
                <th>First name</th>
                
                <th>class</th>
                <th>father</th>
                <th>mobile</th>
                <th>action</th>
            </tr>
        </tfoot>
    </table>
@endsection 
</div>

<div id="formModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Record</h4>
        </div>
        <div class="modal-body">
         <span id="form_result"></span>
         <form method="post" id="sample_form" class="form-horizontal">
          @csrf
          <h5>Child Details</h5>
          <div class="form-group row">
            
            <label class="control-label col-md-4" >First Name : </label>
            <div class="col-md-4">
             <input type="text" name="first_name" id="first_name" class="form-control" />
            </div>
            <div class="col-md-4">
                    <input type="text" name="last_name" id="last_name" class="form-control" />
                </div>
           </div>
           <div class="form-group row">
                <label class="control-label col-md-4">Date of Birth </label>
                <div class="col-md-8">
                    <input type="date" name="dob" id="dob" class="form-control" />
                </div>
           </div>
           <div class="form-group row">
                <label class="control-label col-md-4">Gender </label>
                <div class="col-md-8">
                    <select name="gender" id="gender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
           </div>
           <div class="form-group row">
                <label class="control-label col-md-4">Father </label>
                <div class="col-md-4">
                    <input type="text" name="first_name_father" id="first_name_father" class="form-control" placeholder ="first name"/>
                </div>
                <div class="col-md-4">
                    <input type="text" name="last_name_father" id="last_name_father" class="form-control" />
                </div>
           </div>
           <div class="form-group row">
                <label class="control-label col-md-4">Mobile</label>
                <div class="col-md-8">
                    <input type="text" name="mobile_father" id="mobile_father" class="form-control" />
                </div>
           </div>
           <div class="form-group row">
                <label class="control-label col-md-4">Email </label>
                <div class="col-md-8">
                    <input type="email" name="email_father" id="email_father" class="form-control" />
                </div>
           </div>

           <div class="form-group row">
                <label class="control-label col-md-4">Mother Name </label>
                <div class="col-md-4">
                    <input type="text" name="first_name_mother" id="first_name_mother" class="form-control" placeholder ="first name"/>
                </div>
                <div class="col-md-4">
                    <input type="text" name="last_name_mother" id="last_name_mother" class="form-control" />
                </div>
           </div>
           <div class="form-group row">
                <label class="control-label col-md-4">Mobile</label>
                <div class="col-md-8">
                    <input type="text" name="mobile_mother" id="mobile_mother" class="form-control" />
                </div>
           </div>
           <div class="form-group row">
                <label class="control-label col-md-4">Email </label>
                <div class="col-md-8">
                    <input type="email" name="email_mother" id="email_mother" class="form-control" />
                </div>
           </div>


                <br />
                <div class="form-group" align="center">
                 <input type="hidden" name="action" id="action" value="Add" />
                 <input type="hidden" name="hidden_id" id="hidden_id" />
                 <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
                </div>
         </form>
        </div>
     </div>
    </div>
</div>

<div id="confirmModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Confirmation</h2>
            </div>
            <div class="modal-body">
                <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
            </div>
            <div class="modal-footer">
             <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>


@section('script-additional')
    <script>


function format ( d ) {
    return 'Full Name: '+d.first_name+' '+d.last_name+'<br>'+
        ' Mother Name: '+d.first_name_mother+' '+d.last_name_mother+'<br>'+
        'More details to come.....';
}
 
$(document).ready(function() {
    $(document).on('click', '.edit', function(){
  var id = $(this).attr('id');
  $('#form_result').html('');
  
  $.ajax({
   url :"/admin/student/"+id+"/edit",
   dataType:"json",
   success:function(data)
   {
    $('#first_name').val(data.result.first_name);
    $('#last_name').val(data.result.last_name);
    $('#dob').val(data.result.dob);
    $('#gender').val(data.result.gender);

    $('#first_name_father').val(data.result.first_name_father);
    $('#last_name_father').val(data.result.last_name_father);
    $('#email_father').val(data.result.email_father);
    $('#mobile_father').val(data.result.mobile_father);

    $('#first_name_mother').val(data.result.first_name_mother);
    $('#last_name_mother').val(data.result.last_name_mother);
    $('#email_mother').val(data.result.email_mother);
    $('#mobile_mother').val(data.result.mobile_mother);

    $('#hidden_id').val(id);
    $('.modal-title').text('Edit Record');
    $('#action_button').val('Edit');
    $('#action').val('Edit');
    $('#formModal').modal('show');
   }
  })
 });
    $('#sample_form').on('submit', function (event) {
        event.preventDefault();
        var action_url = '';

        if ($('#action').val() == 'Add') {
            action_url = "{{ route('admin.student.store') }}";
        }

        if ($('#action').val() == 'Edit') {
            action_url = "{{ route('admin.student.update') }}";
        }

        $.ajax({
            url: action_url,
            method: "POST",
            data: $(this).serialize(),
            dataType: "json",
            success: function (data) {
                var html = '';
                if (data.errors) {
                    html = '<div class="alert alert-danger">';
                    for (var count = 0; count < data.errors.length; count++) {
                        html += '<p>' + data.errors[count] + '</p>';
                    }
                    html += '</div>';
                }
                if (data.success) {
                    html = '<div class="alert alert-success">' + data.success + '</div>';
                    $('#sample_form')[0].reset();
                    $('#example').DataTable().ajax.reload();
                }
                $('#form_result').html(html);
            }
        });
    });


    $('#create_record').click(function(){
        $('.modal-title').text('Add New Record');
            $('#action_button').val('Add');
            $('#action').val('Add');
            $('#form_result').html('');

            $('#formModal').modal('show');
    });
var user_id;

$(document).on('click', '.delete', function () {
    user_id = $(this).attr('id');
    $('#confirmModal').modal('show');

});

$('#ok_button').click(function () {
    $.ajax({
        url: "/admin/student/destroy/" + user_id,
        beforeSend: function () {
            $('#ok_button').text('Deleting...');
        },
        success: function (data) {
            setTimeout(function () {
                $('#confirmModal').modal('hide');
                $('#example').DataTable().ajax.reload();
                // $('#user_table').DataTable().ajax.reload();
                // alert('Data Deleted');
            }, 500);
        }
    })
});
    var dt = $('#example').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "{{ route('admin.student.index') }}",
        "columns": [
            {
                "class":          "details-control",
                "orderable":      false,
                "data":           null,
                "defaultContent": ""
            },
            { "data": "first_name" },
            
            {"data": "myclass.name"},
            { "data": "first_name_father" },
            { "data": "mobile_father" },
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        "order": [[1, 'asc']]
    } );
 
    // Array to track the ids of the details displayed rows
    var detailRows = [];
 
    $('#example tbody').on( 'click', 'tr td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = dt.row( tr );
        var idx = $.inArray( tr.attr('id'), detailRows );
 
        if ( row.child.isShown() ) {
            tr.removeClass( 'details' );
            row.child.hide();
 
            // Remove from the 'open' array
            detailRows.splice( idx, 1 );
        }
        else {
            tr.addClass( 'details' );
            row.child( format( row.data() ) ).show();
 
            // Add to the 'open' array
            if ( idx === -1 ) {
                detailRows.push( tr.attr('id') );
            }
        }
    } );
 
    // On each draw, loop over the `detailRows` array and show any child rows
    dt.on( 'draw', function () {
        $.each( detailRows, function ( i, id ) {
            $('#'+id+' td.details-control').trigger( 'click' );
        } );
    });
} );
</script>

@endsection