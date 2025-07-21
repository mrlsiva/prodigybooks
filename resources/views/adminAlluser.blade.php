@extends('layouts.appAdmin')

@section('content')
<div class="container-fliud">
    <div class="row justify-content-center">
   
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">View All User
               
                </div>

                <div class="card-body">
                   
                    
                    @if(!empty($tables))
                        <table id="dtBasicExample" class="table" width="100%">
                        <thead>
    <tr>
      <th class="th-sm">Name </th>
      <th class="th-sm">Email </th>
      <th class="th-sm">Registration Mode  </th>
      <th class="th-sm">Zero Means Password Not updated </th>
      <th class="th-sm">Created at </th>

      
      <!-- registration_mode   user_updated_password   updated_at  created_at  email  name -->
      <!-- <th class="th-sm">Paid/Unpaid </th> -->

      <!-- <th class="th-sm">Age </th>
      <th class="th-sm">Country </th>
      <th class="th-sm">City </th> -->

    </tr>
  </thead>

  <tbody>
          
                        @foreach($tables[0] as $i => $value)
                        
                           <tr>
                             
                               <td>{{$value->name}}</td>
                               <td>{{$value->email}}</td>
                               <td> {{$value->registration_mode}} </td>
                               <td> {{$value->user_updated_password}}</td>
                               <td>{{$value->created_at}}</td>
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


  
</table>

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
