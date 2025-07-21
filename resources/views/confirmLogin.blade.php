@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (session('currentSession'))
            <div class="alert alert-success" role="alert">
                {{ session('warning') }}
                <input type="hidden" id="current-session" name="current-session" value="{{session('currentSession')}}" />
                <input type="hidden" id="current-user" name="current-user" value="{{session('currentUser')}}" />
                <div>
                    <button id="continue-login" class="btn btn-primary">Continue Login</button>
                    <button id="cancel-login" class="btn btn-secondary">Logout</button>
                </div>
            </div>
        @endif
        
    </div>
</div>
<script type="text/javascript">
    $("#continue-login").on('click', function(){
        //console.log('Session id: ', $("#current-session").val());
        var base_url = "{{url('/')}}";
        var headers = $('meta[name="csrf-token"]').attr('content');
        var requestData = {
            "currentSession": $("#current-session").val()
            // "comment_id": cid
        }
        $.ajax({
            type: "POST",
            headers: {'X-CSRF-TOKEN': headers},
            data: requestData,
            url: base_url+"/active-session",
            success: function(data){
                //console.log(data);
                if(data.msg === 'Success'){
                    location.replace(base_url+'/'+data.return_url);
                }
                //console.log('msg: ', data.msg);
                // $('#reply-comment-'+index).append("<span>"+msg+"</span>");
                // $('.reply-comment-'+index).hide();
                // $('#reply_'+index).show();
            }
        });
    })

    $("#cancel-login").on('click', function(){
        var base_url = "{{url('/')}}";
        var headers = $('meta[name="csrf-token"]').attr('content');
        var requestData = {
            "logoutSession": $("#current-session").val()
            // "comment_id": cid
        }
        $.ajax({
            type: "POST",
            headers: {'X-CSRF-TOKEN': headers},
            data: requestData,
            url: base_url+"/logout-session",
            success: function(msg){
                console.log('msg: ', msg);
                if(msg === 'Success'){
                    location.replace(base_url + '/home')
                }
            }
        });
    })
</script>
@endsection
