@extends('layouts.appAdmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Trial Books</div>

                <div class="card-body">
                    @if(Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{!! Session::pull('message') !!} </p>
                    @endif
                    <form action="{{route('admin.insert.trial.book')}}" method="POST" name="addbooks" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="book_category">Choose category</label>
                            <select class="form-control" name="book_category">
                            @foreach($categories as $value)
                                <option value="{{$value->id}}">{{ ucwords($value->series_name) }}</option>
                            @endforeach    
                            </select>
                            <!-- <a href="#" data-toggle="modal" data-target="#exampleModal">+ Add new category</a> -->
                        </div>
                        
                        <!-- <div class="form-group">
                            <label for="dbname">Create DB Name</label>
                            <input type="text" name="dbname" />
                        </div> -->
                        <div class="form-group">
                            <label for="book_title">Book Title</label>
                            <input type="text" name="book_title" />
                        </div>
                        <div class="form-group">
                            <label for="prod_thumb">Product thumb image</label>
                            <!-- <input type="text" name="prod_thumb" /> -->
                            <input type="file" class="form-control-file" name="prod_thumb" accept=".jpg">
                        </div>
                        <div class="form-group">
                            <label for="book">Choose a book</label>
                            <input type="file" class="form-control-file" name="book[]" multiple="multiple" accept=".jpg">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
