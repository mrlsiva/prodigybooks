@extends('layouts.appAdmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit book - {{$category->series_name}}</div>
                <div class="card-body">
                    @if(Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{!! Session::pull('message') !!} </p>
                    @endif
                    <form action="{{route('admin.update.book')}}" method="POST" name="addbooks" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="book_id" value="{{$getBook->id}}" />
                        <input type="hidden" name="book_category" value="{{$category->series_table_name}}" />
                        <div class="form-group">
                            <label for="book_title">Book Title</label>
                            <input type="text" name="book_title" value="{{$getBook->book_title}}" />
                        </div>
                        <div class="form-group">
                            <label for="prod_details">Product Details</label>
                            <input type="text" name="prod_details" value="{{$getBook->product_details}}" />
                        </div>
                        <div class="form-group">
                            <label for="actual_price">Actual Price</label>
                            <input type="text" name="actual_price" value="{{$getBook->actual_price}}" />
                        </div>
                        <div class="form-group">
                            <label for="offer_price">Offer Price</label>
                            <input type="text" name="offer_price" value="{{$getBook->offer_price}}" />
                        </div>
                        <div class="form-group">
                            <label for="sale">Available for Sale</label>
                            <select name="sale">
                                <option selected value="No">No</optio>
                                <option value="Yes">Yes</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="in_stock">In stock</label>
                            <input type="text" name="in_stock" value="{{$getBook->in_stock}}" />
                        </div>
                        <div class="form-group">
                            <label for="sku">SKU</label>
                            <input type="text" name="sku" value="{{$getBook->sku}}" />
                        </div>
                        <div class="form-group">
                            <label for="tags">Tags</label>
                            <input type="text" name="tags" value="{{$getBook->tags}}" />
                        </div>
                        <div class="form-group">
                            <label for="categories">Categories Belongs to:</label>
                            <input type="text" name="categories" value="{{$getBook->categories}}" />
                        </div>
                        <div class="form-group">
                            <label for="desc">Description</label>
                            <input type="text" name="desc" value="{{$getBook->description}}" />
                        </div>
                        <div class="form-group">
                            <label for="add_info">Additional Info</label>
                            <input type="text" name="add_info" value="{{$getBook->additional_info}}" />
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
