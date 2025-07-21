@extends('layouts.appAdmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Books</div>

                <div class="card-body">
                    @if(Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{!! Session::pull('message') !!} </p>
                    @endif
                    <form action="{{route('admin.insert.book')}}" method="POST" name="addbooks" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="book_category">Choose category</label>
                            <select class="form-control" name="book_category">
                            @foreach($categories as $value)
                                <option value="{{$value->id}}">{{ ucwords($value->series_name) }}</option>
                            @endforeach    
                            </select>
                            <a href="#" data-toggle="modal" data-target="#exampleModal">+ Add new category</a>
                        </div>
                        <div class="form-group">
                            <label for="book">Choose a book</label>
                            <input type="file" class="form-control-file" name="book">
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
                            <input type="file" class="form-control-file" name="prod_thumb">
                        </div>
                        <!-- <div class="form-group">
                            <label for="prod_img">Product image</label>
                            <input type="file" class="form-control-file" name="prod_img">
                        </div> -->
                        <div class="form-group">
                            <label for="prod_details">Product Details</label>
                            <input type="text" name="prod_details" />
                        </div>
                        <div class="form-group">
                            <label for="actual_price">Actual Price</label>
                            <input type="text" name="actual_price" />
                        </div>
                        <!-- <div class="form-group">
                            <label for="offer_price">Offer Price</label>
                            <input type="text" name="offer_price" />
                        </div> -->
                        <div class="form-group">
                            <label for="sale">Available for Sale</label>
                            <select name="sale">
                                <option selected value="Yes">Yes</option>
                                <option  value="No">No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="in_stock">In stock</label>
                            <input type="text" name="in_stock" />
                        </div>
                        <div class="form-group">
                            <label for="sku">SKU</label>
                            <input type="text" name="sku" />
                        </div>
                        <div class="form-group">
                            <label for="isbn">ISBN</label>
                            <input type="text" name="isbn" />
                        </div>
                        <!-- <div class="form-group">
                            <label for="tags">Tags</label>
                            <input type="text" name="tags" />
                        </div>
                        <div class="form-group">
                            <label for="categories">Categories Belongs to:</label>
                            <input type="text" name="categories" />
                        </div> -->
                        <div class="form-group">
                            <label for="desc">Description</label>
                            <input type="text" name="desc" />
                        </div>
                        <div class="form-group">
                            <label for="add_info">Additional Info</label>
                            <input type="text" name="add_info" />
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <form action="{{route('admin.create.table')}}" method="POST" name="addcategory" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="cat_name">Category Name</label>
                                    <input type="text" name="cat_name" />
                                </div>
                                <div class="form-group">
                                    <label for="db_category">Create db category</label>
                                    <input type="text" name="db_category" />
                                </div>
                                <div class="form-group">
                                    <label for="age_group">Category age geoup</label>
                                    <input type="text" name="age_group" />
                                </div><div class="form-group">
                                    <label for="description">Category Description</label>
                                    <textarea name="description"> </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="cat_banner">Categoy Banner</label>
                                    <input type="file" name="cat_banner" />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add new category</button>
                            </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
