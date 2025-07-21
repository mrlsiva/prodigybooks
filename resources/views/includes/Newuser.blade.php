<link rel="stylesheet" href="{{ url('/resources/css/admin.css') }}">
<div class="container">
<div class="row">
<div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 text-center">
<a class="navbar-brand" href="{{ url('/') }}"><img src="{{ url('/resources/img/logo.png') }}" /></a>
</div>
<div class="col-12 col-sm-6 col-md-8 col-lg-8 col-xl-8 text-right">
<!-- <a></a> -->


<button type="button"style="line-height: 79px; background: transparent; outline: none; border: 0; " class="" data-toggle="modal" data-target="#centralModalInfo"><i class="zmdi zmdi-help"></i>
</button>
</div>
</div>

</div>

<div class="header_admin_title">
<h4> Welcome to Little Prodigy Books</h4>
</div>


 <!-- Central Modal Medium Info -->
 <div class="modal fade" id="centralModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-notify modal-info" role="document">
     <!--Content-->
     <div class="modal-content">
       <!--Header-->
       <div class="modal-header">
         <p class="heading lead">THE LITTLE PRODIGY BOOKS - DEMO</p>

         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true" class="white-text">&times;</span>
         </button>
       </div>

       <!--Body-->
       <div class="modal-body">
         <div class="text-center">
         <div class="embed-responsive embed-responsive-16by9">
         <iframe width="100%" height="315" src="https://www.youtube.com/embed/5wZIUAdond4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
         </div>
       </div>

       <!--Footer-->
       <!-- <div class="modal-footer justify-content-center">
         <a type="button" class="btn btn-primary">Get it now <i class="far fa-gem ml-1 text-white"></i></a>
         <a type="button" class="btn btn-outline-primary waves-effect" data-dismiss="modal">Close</a>
       </div> -->
     </div>
     <!--/.Content-->
   </div>
 </div>
 <!-- Central Modal Medium Info-->
