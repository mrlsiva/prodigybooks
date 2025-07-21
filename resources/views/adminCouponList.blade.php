@extends('layouts.appAdmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-12">
            @if(Session::has('success'))
                <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{!! Session::pull('success') !!} </p>
            @endif
            <div class="card">
                <div class="card-header">Coupons List <a href="{{ url('admin/coupon-create') }}" class="pull-right btn btn-md btn-primary">Add Coupon</a></div>
                <div class="card-body">
                    <table>
                        @php $i = 0; @endphp
                        @foreach($coupons as $cou)
                            <tr> 
                                <td>{{ ++$i }}</td> 
                                <td>{{ $cou->coupon }}</td>
                                <td>{{ formatOrderDate($cou->created_at) }}</td>
                                <td><a href="{{url('/admin/coupon-delete/'.$cou->id)}}" id="delete-{{$cou->id}}">Delete</a></td>
                            </tr>
                        @endforeach 
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection