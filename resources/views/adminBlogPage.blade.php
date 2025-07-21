@extends('layouts.appAdmin')

@section('content')


<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
<div class="container">
<h4>Blog</h4>
    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{!! Session::pull('message') !!} </p>
    @endif
   
    <div class="row">
        <div class="col-12">
            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add New Post</button>
        </div>
    </div>
    <div class="row">
        <div class="col-12">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Categories</th>
                <th scope="col">Tags</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($blog as $value)
                <tr>
                <td>{{$value->id}}</td>
                <td><a href="/posts/{{$value->slug}}" target="_blank">{{ucwords($value->title)}}</a></td>
                <td>{{ucwords($value->created_by)}}</td>
                <td>{{ucwords($value->categories)}}</td>
                <td>{{ucwords($value->tags)}}</td>
                <td>{{ucwords($value->created_on)}}</td>
                <td>
                    <form action="{{route('admin.delete.blogPost')}}" method="POST" name="delete_post">
                        @csrf
                        <input type="hidden" value="{{$value->id}}" name="delete_post" />
                        <button type="submit" class="btn btn-danger btn-sm">Delete Post</button>
                    </form>
                </td>
                </tr>
            @endforeach 
                
            </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form action="{{route('admin.create.blogPost')}}" method="POST" name="create_post">
        @csrf
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create a blog post</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body"> 
            <div class="form-group">
                <label for="blog_title">Blog Title</label>
                <input type="text" class="form-control" id="blog_title" name="blog_title">
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" class="form-control" id="author" name="author">
            </div>
            <div class="form-group">
                <label for="summary-ckeditor">Create Blog Content</label>
                <textarea id="summary-ckeditor" name="summary-ckeditor"></textarea>
                <!-- <textarea name="editor1"></textarea> -->
            </div>
            <div class="form-group">
                <label for="add_categories">Add Categories</label>
                <input type="text" class="form-control" id="add_categories" name="add_categories" placeholder="">
            </div>
            <div class="form-group">
                <label for="add_tags">Add Tags</label>
                <input type="text" class="form-control" id="add_tags" name="add_tags" placeholder="">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>      
      </form>
    </div>
  </div>
</div>

  
<!-- <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script> -->
<script type="text/javascript">
// setTimeout(function(){ 

    CKEDITOR.replace( 'summary-ckeditor', {
        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
    

// },0); 
</script>

@endsection

