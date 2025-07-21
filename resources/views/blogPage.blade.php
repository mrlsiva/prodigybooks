@extends('layouts.app')

@section('content')

<div class="container">
<div class="row">
  <div class="col-8">
@foreach($blogData as $value)
<div class="container mt-2 mb-5 post">
  <h3 class="blog_title mb-4 col-12 mt-3">{{ $value->title }}</h3>
    <div class="card p-2 blog col-12">
      <h6>
          <i class="fa fa-clock-o" aria-hidden="true"></i>{{ $value->created_on }}
          <i class="fa fa-user" aria-hidden="true"></i>{{ $value->created_by }}
          <i class="fa fa-tags" aria-hidden="true"></i>{{ $value->tags }} </h6>
      <div class="fakeimg"><img src="resources/img/blog.jpg" class="img-fluid" /></div>
      <div class="show_two_line">{!! $value->blog_content !!}</div>
      <a class="more" href="{{url('/')}}/posts/{{$value->slug}}">View More...</a>
    </div>
    </div>
    @endforeach
</div>
    

    <div class="col-4 blog_right">
    <div class="container">
    <h5 class="blog_title mb-2 m-auto">Product categories</h5>
    </div>
    <div class="container">
        @foreach ($categories as $category)
        <a href="{{url('/series/'.$category->series_table_name)}}">{{$category->series_name}} </a>
        @endforeach
        </div>
    </div>
    </div>
    </div>

</div>
@endsection
