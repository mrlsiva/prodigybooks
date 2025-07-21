@extends('layouts.app')

@section('content')
<div class="row mt-4">
   <div class="container" style="margin-top: 1em;">
      <!-- Sign up form -->
      <!--<form>-->
      <!-- Sign up card -->
      <div class="card person-card">
         <div class="card-body">
            <!-- Sex image -->
            <img id="img_sex" class="person-img" src="{{ url('/resources/img/king.png') }}">
            <div class="container text-center mb-4">
               <h2 id="who_message" class="card-title">The <span id="box-title">King</span>’s Box</h2>
               <p>You Can Chose Upto <span id="box-books">10</span> Books</p>
            </div>
            <!-- First row (on medium screen) -->
            <div class="container">
               <div class="form-group col-6 col-sm-6 col-md-6 col-lg-2 col-xl-2">
                  <select id="input_Box" class="form-control">
                     @foreach($boxes as $box)
                     <option value="{{ $box->plan_name }}" data-books="{{ $box->plan_count }}" data-id="{{ $box->id }}">{{ $box->plan }}</option>
                     @endforeach
                     <!--<option value="queen" data-books="20">Queen Box</option>
                        <option value="knight" data-books="30">Knight Box</option>
                        <option value="warden" data-books="40">Warden Box</option>-->
                  </select>
               </div>
               <div class="form-group col-6 col-sm-6 col-md-6 col-lg-5 col-xl-5">
                  <select id="series" class="form-control">
                   <!--  <option value="kidscanrecycle">Kids Can Recycle</option>
                    <option value="picturebooks">Picture Books</option>
                    <option value="planetsseries">Select Series</option> -->
                     @foreach($categories as $cat)
                     <option value="{{ $cat->series_table_name }}" data-id="{{ $cat->id }}">{{ $cat->series_name }}</option>
                     @endforeach
                  </select>
               </div>
               <div class="form-group col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                  <button type="button" class="button">
                  Book(s) Chosen  <span class="badge badge-light">0</span>
                  </button>
               </div>
               <div class="form-group col-6 col-sm-6 col-md-6 col-lg-2 col-xl-2">
                   @auth
                      <button type="button" class="button" id="addToBoxCart"><span>Add to Cart </span></button>
                    @else
                      <a href="{{url('/login')}}"><button class="button"><span>Login & Add to Cart </span></button></a>
                    @endauth
               </div>
            </div>
         </div>
      </div>
      <div class="row mt-4 box">
        @foreach($data as $dat)
          @php $table = $dat['table']; @endphp
          @foreach($dat['products'] as $pro)
          <a class="col-4 col-sm-3 col-md-3 col-lg-2 col-xl-2 mt-2 pl-1 pr-1 box_select {{ $table }}" data-bookid="{{ $pro->id }}" data-catid="{{ $dat['cat_id'] }}">
            <img src="{{ 'https://littleprodigybooks.in/storage/app/public/uploads/img/'.$table.'/thumb/'.$pro->thumb_img }}" class="img-responsive"/>
            <p class="mb-2 mt-2 show_one_line text-center">{{ $pro->book_title }}</p>
          </a>
          @endforeach
        @endforeach
      </div>
      </form>
   </div>
</div>

<script>
   // URLs images
   var king = "{{ url('/resources/img/king.png') }}";
   var queen = "{{ url('/resources/img/queen.png') }}";
   var knight = "{{ url('/resources/img/knight.png') }}";
   var warden = "{{ url('/resources/img/warden.png') }}";
   
   // On page loaded
   $( document ).ready(function() {  
       // Set the sex image
       set_sex_img();
       
       // Set the "who" message
       // set_who_message();
   
       // On change sex input
       $("#input_Box").change(function() {
           // Set the sex image
           set_sex_img();
           // set_who_message();
       });
   
       // On change fist name input
       $("#first_name").keyup(function() {
           // Set the "who" message
           // set_who_message();
           
           // if(validation_name($("#first_name").val()).code == 0) {
           //     $("#first_name").attr("class", "form-control is-invalid");
           //     $("#first_name_feedback").html(validation_name($("#first_name").val()).message);
           // } else {
           //     $("#first_name").attr("class", "form-control");
           // }
       });
   
       // On change last name input
       $("#last_name").keyup(function() {
           // Set the "who" message
           // set_who_message();
           
           // if(validation_name($("#last_name").val()).code == 0) {
           //     $("#last_name").attr("class", "form-control is-invalid");
           //     $("#last_name_feedback").html(validation_name($("#last_name").val()).message);
           // } else {
           //     $("#last_name").attr("class", "form-control");
           // }
       });
   });
   
   function setBooksCount() {
     $('span.badge').text(0);
   }
   
   /**
   *   Set image path (King_Box or Queen_Box)
   */
   function set_sex_img() {
     var sex = $("#input_Box").val();
     var dataBooks = $('#input_Box option:selected').attr('data-books');
     if (sex == "king") {
         $("#img_sex").attr("src", king);
     } else if (sex == "queen") {
         $("#img_sex").attr("src", queen);
     } else if (sex == "knight") {
         $("#img_sex").attr("src", knight);
     } else {
         $("#img_sex").attr("src", warden);
     }
     $("#box-books").text(dataBooks);     
     sex = sex.toLowerCase().replace(/\b[a-z]/g, function(letter) {
       return letter.toUpperCase();
     });
     $("#box-title").text(sex);
     setBooksCount();
   }

   $(document).ready(function(){
    $("select").change(function(){
        // debugger
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
                $(".box_select").not("." + optionValue).hide();
                $("." + optionValue).show();
            } else{
                $(".box_select").hide();
            }
        });
    }).change();
     $("body").delegate(".box a", "click", function(){
     $(this).toggleClass("added");
    // debugger
     $( "span.badge" ).text( "" + $("a.added").length + " " + "");
   });
});

$(document).ready(function() {
  $('#addToBoxCart').on('click',function(){    
    var dataBooks = $('#input_Box option:selected').attr('data-books');
    console.log(dataBooks);
    var selected = $( "span.badge" ).text();
    console.log(selected);

    if(parseInt(dataBooks) > parseInt(selected)) {
      alert('You should select '+dataBooks+' books!');
    } else if(parseInt(dataBooks) < parseInt(selected)) {
      alert('You should select '+dataBooks+' books only!');
    } else {
      var series = $('#series').val();
      // var plan = $('#input_Box').val();
      var plan = $('#input_Box option:selected').attr('data-id');
      var i = 1; 
      var products = [];
      var categories = [];
      $('a.added').each(function(i){
        products[i] = $(this).attr('data-bookid');
        categories[i] = $(this).attr('data-catid');
        i++;
      });

      var base_url = "{{url('/')}}";
      var headers = $('meta[name="csrf-token"]').attr('content');
      var requestData = {
         'book_ids': products,
         'category_ids': categories,
         'plan':plan
      }
      $.ajax({
          type: "POST",
          headers: {'X-CSRF-TOKEN': headers},
          data: requestData,
          url: base_url+"/add-to-box",
          success: function(data){
            if(data.status) {
              alert(data.msg);
              //window.location('cart/view');
              location.replace(base_url+"/cart/view-products");
            }
          }
      });
    }
  })
});
</script>
<style>
  .box_select{
      display: none;
  }
</style>
@endsection