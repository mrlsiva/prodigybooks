@extends('layouts.appAdmin')
     <link rel="stylesheet" type="text/css" href="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
@section('content')


<div class="container">
<h4>Book List</h4>
    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{!! Session::pull('message') !!} </p>
    @endif

    <div class="row">
        <div class="col-12">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered" id="comment_table">
            <thead>
                <tr>
                <th scope="col">Name</th>
				<th scope="col">Address</th>
				<th scope="col">Phone Number</th>
				<th scope="col">Book Name</th>
				<th scope="col">Transaction Id</th>
				<th scope="col">Amount</th>
                <th scope="col">Order Placed</th>
                <th scope="col">Order Via</th>
				<th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
            @foreach($books2 as $books2)
			<?php 
			$amount = json_decode($books2->txn_details);	
			?>
                <tr>
                <td>{{ucwords($books2->username)}}</td>
				<td>{{ucwords($books2->address)}}</td>
                <td>{{ucwords($books2->phone)}}</td>
				<td>{{ucwords($books2->bookname)}}</td>
				<td>{{ucwords($books2->txn_id)}}</td>
				<td>{{ucwords($amount->amount)}}</td>
				<td>{{ucwords($books2->create_at)}}</td>
                <td>{{ ($books2->is_app?'App':'Web') }}</td>
                <td>{!! ($books2->is_delivered?'Delivered':'<button type="submit" class="btn btn-primary" data-type="1" data-id="'.$books2->id.'" data-toggle="modal" data-target="#deliverModal">Mark As Delivered</button>') !!}</td>
                </tr>
            @endforeach 

            @if(count($box_books) > 0)
                @foreach($box_books as $box)
                    <tr>
                        <td>{{ucwords($box->name)}}</td>
                        <td>{{ucwords($box->address)}}</td>
                        <td>{{ucwords($box->phone)}}</td>
                        <td>{{ucwords($box->books)}}</td>
                        <td>{{ucwords($box->txn_id)}}</td>
                        <td>{{ucwords($box->amount)}}</td>
                        <td>{{ucwords($box->created_at)}}</td>
                        <td>{{ ($box->is_app?'App':'Web') }}</td>
                        <td>{!! ($box->is_delivered?'Delivered':'<button type="submit" class="btn btn-primary" data-type="2" data-id="'.$box->id.'" data-toggle="modal" data-target="#deliverModal">Mark As Delivered</button>') !!}</td>
                    </tr>
                @endforeach
            @endif
                
            </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="deliverModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form  method="POST" name="markAsDelivered" id="markAsDelivered">
        @csrf
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel" style="color:green;">Are you sure to mark as delivered?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <input type="hidden" name="type" id="user_type" value=""/>
        <input type="hidden" name="user_book" id="user_book" value=""/>
  
        <div class="col-md-12">
            <center>  
                <button type="button" class="btn btn-success delSubmit" name="button_status" id="delSubmit" style="color:#FFF;">Change</button>
          
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </center>
        </div> 
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="commentmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form  method="POST" name="create_comment_status" id="create_comment_status">
        @csrf
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel" style="color:green;">Please Click Button To Change Comment Status</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <input type="hidden" name="commentid" id="commentid" value=""/>
  
        <div class="col-md-12">
          <center>  <button type="button" class="btn btn-secondary mybutton" name="button_status" id="button_status" value="1" style="color:green;">Active</button>
            <button type="button" class="btn btn-secondary mybutton" name="button_status" id="button_status" value="2" style="color:red;">InActive</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button></center>
        </div>   
   
      </form>
    </div>
  </div>
</div>

  
<!-- <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script> -->
{{-- <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script> --}}

<script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){
    $('.commentstatus').on('click', function() {
    /* $.post('/admin/apartments/' + $(this).data('id') + '/active', { active: ($(this).is(':checked')) ? 1 : 0, _token : '{{ csrf_token() }}' }, function(data){
        toastr.success("Updated success: The apartment is " + (data == 1 ? 'enabled' : 'disabled'));
    }); */
    //alert($(this).data('id'));
    var commentid = $(this).attr('attr1');
    //alert(commentid);
    $("#commentid").val(commentid);
    $('#commentmodal').modal('show');
    //var cnf = confirm("Shall I Delete This Comment");
/*     var dialog = $('<p>Are you sure?</p>').dialog({
                    buttons: {
                        "Yes": function() {alert('you chose yes');},
                        "No":  function() {alert('you chose no');},
                        "Cancel":  function() {
                            alert('you chose cancel');
                            dialog.dialog('close');
                        }
                    }
                });
    if(dialog == true)
    {
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
    $.ajax({
        url: "{{url('admin/commentconfirmation')}}",
        type:"POST",
        data: {
        "commentid": commentid
        },
        dataType:'json',

        success:function(data)
        {
            alert("Deleted Successfully");
        }
    })
    } */
});

$(".mybutton").on('click', function() {
    var mystatus = $(this).val();
    var commentid = $("#commentid").val();
    //alert(commentid);
    //alert(mystatus);
    $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
    $.ajax({
        url:"{{url('admin/commentconfirmation')}}",
        type:"POST",
        data:{"commentid": commentid,"mystatus":mystatus},
        dataType:'json',
        success:function(data)
        {
            if(mystatus == 1)
            {
            alert("Comment Activated");
            }
            if(mystatus == 2)
            {
            alert("Comment Deactivated");
            }
            $('#commentid').val('');
            $("#commentmodal").modal('hide');
            location.reload();
        }
    })
})

    $('#deliverModal').on('show.bs.modal', function(delBtn) {
        var button = $(delBtn.relatedTarget)
        var id = button.data('id') 
        var type = button.data('type') 
        //var modal = $(this)
        //modal.find('form').attr("action", recipient)
        // do something when the modal is shown
        $('#user_book').val(id);
        $('#user_type').val(type);
    })

    $(".delSubmit").on('click', function() {
        var book_id = $('#user_book').val();
        var book_type = $('#user_type').val();
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
            url:"{{url('admin/book-deliver')}}",
            type:"POST",
            data:{"book_id": book_id,"book_type":book_type},
            dataType:'json',
            success:function(data)
            {
                console.log(data);
                /*if(mystatus == 1)
                {
                    alert("Comment Activated");
                }
                if(mystatus == 2)
                {
                    alert("Comment Deactivated");
                }*/
                //$('#deliverModal').val('');
                $("#deliverModal").modal('hide');
                location.reload();
            }
        })
    })
});
$(function(){
    $("#comment_table").dataTable();
  })
</script>

@endsection

