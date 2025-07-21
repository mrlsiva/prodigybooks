@extends('layouts.app')

@section('content')

   <div class="container mt-5">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th clas="text-center">Quantity</th>
                        <th clas="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="col-sm-6 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="storage/app/public/uploads/img/KIDSCANRECYCLE/thumb/thumb_146.jpg" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body pl-2">
                                <h5 class="media-heading"><a href="#">It's Cool to Learn About Countries: Germany</a></h5>
                                <h6 class="media-heading"> Series <a href="#">KIDSCANRECYCLE</a></h6>
                                <!-- <span>Status: </span><span class="text-success"><strong>In Stock</strong></span> -->
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input type="email" class="form-control" id="exampleInputEmail1" value="3">
                        </td>
                        <td class="col-sm-2 col-md-2 text-center"><strong><span>&#8377;</span>150</strong></td>
                        <td class="col-sm-2 col-md-2 text-center"><strong><span>&#8377;</span>250</strong></td>
                        <td class="col-sm-1 col-md-1">
                        <button type="button" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span> X
                        </button></td>
                    </tr>
                    <tr>
                        <td class="col-sm-6 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="storage/app/public/uploads/img/KIDSCANRECYCLE/thumb/thumb_146.jpg" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body pl-2">
                                <h5 class="media-heading"><a href="#">It's Cool to Learn About Countries: Germany</a></h5>
                                <h6 class="media-heading"> Series <a href="#">KIDSCANRECYCLE</a></h6>
                                <!-- <span>Status: </span><span class="text-success"><strong>In Stock</strong></span> -->
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input type="email" class="form-control" id="exampleInputEmail1" value="3">
                        </td>
                        <td class="col-sm-2 col-md-2 text-center"><strong><span>&#8377;</span>150</strong></td>
                        <td class="col-sm-2 col-md-2 text-center"><strong><span>&#8377;</span>250</strong></td>
                        <td class="col-sm-1 col-md-1">
                        <button type="button" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span> X
                        </button></td>
                    </tr>

                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Subtotal</h5></td>
                        <td class="text-right"><h5><strong><span>&#8377;</span>250</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong><span>&#8377;</span>250</strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                        <button type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                        </button></td>
                        <td>
                        <button type="button" class="btn btn-success">
                            Checkout <span class="glyphicon glyphicon-play"></span>
                        </button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection