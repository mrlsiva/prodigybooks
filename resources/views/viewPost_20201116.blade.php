@extends('layouts.app')

@section('content')

<style> 
.border-bottom {
    border-bottom: 1px solid #ccc;
}
</style>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-8">   
            <!-- {{ $blogData }} -->
            <h3 class="blog_title">{{ $blogData->title }}</h3>
            <div class="fakeimg"><img src="{{url('/')}}/resources/img/blog.jpg" class="img-fluid" /></div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                {!! $blogData->blog_content !!}
            </div>

            <div class="card my-4" style="display: none;">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form>
              <div class="form-group">
                <textarea class="form-control" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 63px;"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
        
            
        </div>
        <div class="col-4 blog_right"> 
            <div class="row">
    <h3 class="blog_title mb-2">Product categories</h3>
    </div>
    <div class="row text-center">
    @foreach ($categories as $category)
        <a href="{{url('/series/'.$category->series_table_name)}}">{{$category->series_name}} </a>
        @endforeach
    </div>
    <!-- @if($blogData->id-1 > 0)
    <a href="{{ $blogData->id-1 }}">Previous Post</a>
    @endif
     -->
    <!-- <a href="{{ $blogData->id+1 }}">Next Post</a> -->
    <!-- <div class="hide comment-success alert alert-success" style="display: none;"></div> -->
  
    </div>
    @if (session('commentMessage'))
        <div class="row alert alert-success" role="alert">
            {{ session('commentMessage') }}
        </div>
    @endif
<div class="col-12 comments-section">
@foreach($blogComments as $c=>$a)   
        <?php $bandera = 0 ?>
        <div class="row">
        
            <h5 class="col-8 mt-2 p-3" style="background: #ccc;"><strong>{{$a->name}}</strong> says:</h5> 
            <div class="col-6 border-bottom p-3" style="background: #ddd;">
                {{ $a->comments }}
               
                
            </div>
            <div class="col-2 p-3" style="background: #ddd;">
             
                <a href="javascript:void(0)" id='reply_{{$c}}' onclick="replyForm({{$c}},{{$a->id}})"><img style="width: 20px;" src="{{url('/resources/img/reload.png')}}"></a>
                
            </div>
            <div class="col-8 reply-comment-{{$c}}" style="display: none;">
                <textarea style="width: 100%;" name="reply" id="comment_reply_{{$c}}"></textarea>
                <a style="width: 200px; background:#48a4dc; color:#fff; padding:10px 20px; " class="text-right mt-2 mb-2" href="javascript:void(0)" id='post_reply_{{$c}}' onclick="reply({{$c}},{{$a->id}})">Post Reply</a>
            </div>
            <div  id="reply-comment-{{$c}}" class="col-7  mt-2 ml-5" >
        @foreach($a->blogcommentreplies as $activ)
            @if($a->id == $activ->id) 
                <?php $bandera++ ?>
            @endif
            <div class="row border-bottom p-1 mt-1" style="background: #ccc;">
            {{$activ->description}}
            </div>
        @endforeach
</div>
        @if($bandera == 0)
            <div class="marco-fondo-blanco">
            {{ $a->actividad }}
            </div>
        @else 
            <div class="marco-fondo-gris">
            {{ $a->actividad }}
            </div>
        @endif
        </div>

@endforeach

</div>
    <div class="col-12 media mb-4">
        <div class="col-8">
            <form action="{{route('post.comment')}}" method="POST" name="comment_post">
                @csrf
                
                <div class="form-group">
                    <label for="comment">Comment</label>
                    <textarea class="form-control" id="comment" name="comment"></textarea>
                </div>
                <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" class="form-control" @if(!empty(Auth::id())) value="{{Auth::user()->name}}" readonly="readonly" @endif id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" class="form-control" id="email" value="" name="email" required>
                </div>
                <div class="form-group">
                    <label for="website">Website</label>
                    <input type="text" class="form-control" id="website" name="website" placeholder="">
                </div>
                <!-- <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label for="remember" class="form-check-label">Save my name, email, and website in this browser for the next time I comment.</label>
                </div> -->
                <div class="form-group">
                    <input type="hidden" value="{{ $blogData->id }}" name="post_id" />
                    <button type="submit" id="post_comment" data-attr="{{ $blogData->id }}" class="btn btn-primary">Post Comment</button>
                </div>
            </form>
        </div>
    </div>
<script type="text/javascript">   
    function replyForm(index, cid){
        $('.reply-comment-'+index).show();
        $('#comment_reply_'+index).val('');
        $('#reply_'+index).hide();
    }
    
    function reply(index, cid){
        console.log('id: ', index, cid);
        
        var base_url = "{{url('/')}}";
        var headers = $('meta[name="csrf-token"]').attr('content');
        var requestData = {
            "reply": $('#comment_reply_'+index).val(),
            "comment_id": cid
        }
        $.ajax({
            type: "POST",
            headers: {'X-CSRF-TOKEN': headers},
            data: requestData,
            url: base_url+"/postReply",
            success: function(msg){
                // console.log('msg: ', msg);
                $('#reply-comment-'+index).append("<div class='row'>"+msg+"</div>");
                $('.reply-comment-'+index).hide();
                $('#reply_'+index).show();
            }
        });
    }
</script>
@endsection