@extends('layouts.appAdmin')

@section('content')
<div class="container-fliud">
    <div class="row justify-content-center">
   
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Subscriber Details
                @if(Session::has('booksByCategory') && !empty($selectedCategory))    
                => {{$selectedCategory->series_name}}
                @endif
                </div>

                <div class="card-body">
                   
                    
                    @if(!empty($categories))
                        <table id="dtBasicExample" class="table" width="100%">
                        <thead>
    <tr>
      <th class="th-sm">No </th>
      <th class="th-sm">Name </th>
      <th class="th-sm">Plan </th>
      <th class="th-sm">Active Online </th>
      <th class="th-sm"> Expiry  </th>
      <th class="th-sm">Mode </th>

      <!-- <th class="th-sm">Paid/Unpaid </th> -->
      <th class="th-sm">Email </th>
      <th class="th-sm">Phone </th>
      <th class="th-sm">Action </th>
      <!-- <th class="th-sm">Age </th>
      <th class="th-sm">Country </th>
      <th class="th-sm">City </th> -->

    </tr>
  </thead>

  <tbody>
            <!-- {{$categories[0]}} -->
                        @foreach($categories[0] as $i => $value)
                        
                           <tr>
                               <td>{{$i+1}}</td>
                               <td>{{$value->name}}</td>
                               <td> @if ($value->plan_id == "1") Basic @else Advance @endif </td>
                               <td> @if ($value->session_id != NULL) Active @else Inactive @endif </td>
                               <td>{{$value->expiry}}</td>
                               <td>{{$value->registration_mode}}</td>

                               <!-- <td>{{$value->plan_id}}</td> -->
                               <td>{{$value->email}}</td>
                               <td>{{$value->phone}}</td>
                               <td><button type="button" data-toggle="modal" data-target="#modal-{{$value->id}}" type="button" id="deactivate-{{$value->id}}" class="btn btn-danger">Deactivate</button>
                               <div class="modal fade" id="modal-{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form  action="{{route('admin.deactivate.account')}}" method="POST" name="addbooks" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
        Please Confirm to Deactivate Account 
        <input type="hidden" name="user" value="{{$value->id}}" /> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit"  class="btn btn-primary">Confirm</button>
      </div>
      </form>
    </div>
  </div>
</div>
                               
                               
                               </td>


                               <!-- <td>Age</td>
                               <td>Country</td>
                               <td>City</td> -->

                            </tr>
                        @endforeach 
                        </table>
                    
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">

  <!-- <tfoot>
    <tr>
      <th>Name
      </th>
      <th>Position
      </th>
      <th>Office
      </th>
      <th>Age
      </th>
      <th>Start date
      </th>
      <th>Salary
      </th>
    </tr>
  </tfoot> -->
  
</table>
<!-- Button trigger modal -->

<!-- Modal -->


<!-- MDBootstrap Datatables  -->
<link href="{{url('resources/css/datatables.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- MDBootstrap Datatables  -->
<script type="text/javascript" src="{{url('resources/js/datatables.min.js')}}"></script>
<script>
    $(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
});
    </script>
</div>
@endsection
