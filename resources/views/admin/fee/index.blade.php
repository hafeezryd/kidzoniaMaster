@extends('layouts.header');
@section('content')
<h1>Fees Detail</h1>

<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th></th>
                <th>First name</th>
                
                <th>class</th>
                <th>father</th>
                <th>mobile</th>
                <th>Fees</th>
                <th>Paid</th>
                <th>Balance</th>
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
                <th>Fees</th>
                <th>Paid</th>
                <th>Balance</th>
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



@section('script-additional')
<script>
$(document).ready(function() {
      
    var dt = $('#example').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "{{ route('admin.fee.index') }}",
        "columns": [
            {"data" : "admission_no"},
            { "data": "first_name" },
            
            {"data": "myclass.name"},
            { "data": "first_name_father" },
            { "data": "mobile_father" },
            {"data": "student_dues.fee_value"},
            {"data": "student_dues.fee_paid"},
            {"data": "student_dues.fee_balance"},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        "order": [[1, 'asc']]
    } );

    $(document).on('click', '.edit', function(){
  var id = $(this).attr('id');
  $('#form_result').html('');
  
  $.ajax({
   url :"/admin/fee/"+id+"/edit",
   dataType:"json",
   success:function(data)
   {
    $('#first_name').val(data.result.first_name);
    $('#last_name').val(data.result.last_name);
    $('#dob').val(data.result.dob);
    $('#gender').val(data.result.gender);

    
    $('#hidden_id').val(id);
    $('.modal-title').text('Edit Record');
    $('#action_button').val('Edit');
    $('#action').val('Edit');
    $('#formModal').modal('show');
   }
  });
    });
 
});
    
</script>

@endsection