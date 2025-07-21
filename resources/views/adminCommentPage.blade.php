@extends('layouts.appAdmin')
     <link rel="stylesheet" type="text/css" href="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
@section('content')


<div class="container">
<h4>Comments</h4>
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
                <th scope="col">Title</th>
                <th scope="col">Commented By</th>
                <th scope="col">Comment</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($comment as $value)
                <tr>
                <td>{{ucwords($value->title)}}</td>
                <td>{{ucwords($value->name)}}</td>
                <td>{{ucwords($value->comments)}}</td>
                <td>{{ucwords($value->created_at)}}</td>
                <td>
                    <button type="submit" class="btn btn-primary btn-sm commentstatus" attr1="{{$value->id}}">Confirm Status</button>
                </td>
                </tr>
            @endforeach 
                
            </tbody>
            </table>
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

});
$(function(){
    $("#comment_table").dataTable();
  })
</script>

@endsection

