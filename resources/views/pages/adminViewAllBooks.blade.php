@extends('layouts.appAdmin')

@section('content')
<style>
</style>
<div class="container">
    <div class="row justify-content-center">
    @if(Session::has('updateBook'))
    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{!! Session::pull('updateBook') !!} </p>
    @endif
    @if(Session::has('itemDeleted'))
    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{!! Session::pull('itemDeleted') !!} </p>
    @endif
        <div class="col-md-12">
            <div class="card">
               

                <div class="card-body">
                   
                    <form action="{{route('admin.show.books')}}" method="POST" name="addbooks" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                        <div class="col-12 col-sm-12 col-md-4 col-lg-2 col-xl-2 float-left">

                            <label class="" 
                            for="book_category">Choose category1</label>
                            </div>
                            <div class="col-12 col-sm-12 col-md-4 col-lg-5 col-xl-5 float-left">
                            <select class="form-control " name="book_category">
                            @foreach($categories as $value)
                                <option value="{{$value->id}}">{{ ucwords($value->series_name) }}</option>
                            @endforeach    
                            </select>
                            </div>
                            <div class="col-12 col-sm-12 col-md-4 col-lg-5 col-xl-5 float-left">
                            <button type="submit" class="btn button e-series-book">Submit</button>
                            </div>
                        </div>
                        
                    </form>
                    <div class="card-header">View Books By Category 
                @if(Session::has('booksByCategory') && !empty($selectedCategory))    
                => {{$selectedCategory->series_name}}
                @endif
                </div>
                    @if(Session::has('booksByCategory') && !empty($selectedCategory))
                        <input type="hidden" id="category-id" value="{{$selectedCategory->id}}" />
                        <table>
                        @foreach($getBooksByCategory as $value)
                            <tr>
                                <td>{{ ucwords($value->book_title) }}</td>
                                <td><a class="button e-series-book mb-2" href="{{url('/admin/edit-book/'.$value->id.'/'.$selectedCategory->series_table_name)}}" id="edit-{{$value->id}}">Edit</a>  <a class="button e-series-book mb-2" href="{{url('/admin/delete-book/'.$value->id.'/'.$selectedCategory->series_table_name)}}" id="delete-{{$value->id}}">Delete</a></td>
                            </tr>
                        @endforeach 
                        </table>
                    
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
