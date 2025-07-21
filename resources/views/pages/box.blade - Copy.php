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
                            <!--<option value="Series">Kids Can Recycle</option>
                            <option value="Series">Picture Books</option>-->
                            <option value="">Select Series</option>
                            @foreach($categories as $cat)
                              <option value="{{ $cat->id }}">{{ $cat->series_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                    <button type="button" class="button">
  Book(s) Chosen  <span class="badge badge-light">4</span>
</button>

                    </div>

                    <div class="form-group col-6 col-sm-6 col-md-6 col-lg-2 col-xl-2">
            
                      <button type="button" class="button" id="addToBoxCart"><span>Add to Cart </span></button>
                    </div>
                </div>
            </div>
        </div>


<div class="row mt-4 box">
  @include('pages.book-data', compact('table', 'products'))

<!--<a class="col-4 col-sm-3 col-md-3 col-lg-2 col-xl-2 mt-2 pl-1 pr-1">
   <img src="{{ url('resources/img/thumb.jpeg') }}" class="img-responsive" />
   <p class="mb-2 mt-2 show_one_line text-center">  Book Title</p>
</a>
<a class="col-4 col-sm-3 col-md-3 col-lg-2 col-xl-2 mt-2 pl-1 pr-1">
   <img src="{{ url('resources/img/thumb.jpeg') }}" class="img-responsive" />
   <p class="mb-2 mt-2 show_one_line text-center">  Book Title</p>

</a>
<a class="col-4 col-sm-3 col-md-3 col-lg-2 col-xl-2 mt-2 pl-1 pr-1">
   <img src="{{ url('resources/img/thumb.jpeg') }}" class="img-responsive" />
   <p class="mb-2 mt-2 show_one_line text-center">  Book Title</p>

</a>
<a class="col-4 col-sm-3 col-md-3 col-lg-2 col-xl-2 mt-2 pl-1 pr-1">
   <img src="{{ url('resources/img/thumb.jpeg') }}" class="img-responsive" />
   <p class="mb-2 mt-2 show_one_line text-center">  Book Title</p>

</a>
<a class="col-4 col-sm-3 col-md-3 col-lg-2 col-xl-2 mt-2 pl-1 pr-1">
   <img src="{{ url('resources/img/thumb.jpeg') }}" class="img-responsive" />
   <p class="mb-2 mt-2 show_one_line text-center">  Book Title</p>

</a>

<a class="col-4 col-sm-3 col-md-3 col-lg-2 col-xl-2 mt-2 pl-1 pr-1">
   <img src="{{ url('resources/img/thumb.jpeg') }}" class="img-responsive" />
   <p class="mb-2 mt-2 show_one_line text-center">  Book Title</p>

</a>
<a class="col-4 col-sm-3 col-md-3 col-lg-2 col-xl-2 mt-2 pl-1 pr-1">
   <img src="{{ url('resources/img/thumb.jpeg') }}" class="img-responsive" />
   <p class="mb-2 mt-2 show_one_line text-center">  Book Title</p>

</a>
<a class="col-4 col-sm-3 col-md-3 col-lg-2 col-xl-2 mt-2 pl-1 pr-1">
   <img src="{{ url('resources/img/thumb.jpeg') }}" class="img-responsive" />
   <p class="mb-2 mt-2 show_one_line text-center">  Book Title</p>

</a>
<a class="col-4 col-sm-3 col-md-3 col-lg-2 col-xl-2 mt-2 pl-1 pr-1">
   <img src="{{ url('resources/img/thumb.jpeg') }}" class="img-responsive" />
   <p class="mb-2 mt-2 show_one_line text-center">  Book Title</p>

</a>
<a class="col-4 col-sm-3 col-md-3 col-lg-2 col-xl-2 mt-2 pl-1 pr-1">
   <img src="{{ url('resources/img/thumb.jpeg') }}" class="img-responsive" />
   <p class="mb-2 mt-2 show_one_line text-center">  Book Title</p>
</a>

<a class="col-4 col-sm-3 col-md-3 col-lg-2 col-xl-2 mt-2 pl-1 pr-1">
   <img src="{{ url('resources/img/thumb.jpeg') }}" class="img-responsive" />
   <p class="mb-2 mt-2 show_one_line text-center">  Book Title</p>
</a>

<a class="col-4 col-sm-3 col-md-3 col-lg-2 col-xl-2 mt-2 pl-1 pr-1">
   <img src="{{ url('resources/img/thumb.jpeg') }}" class="img-responsive" />
   <p class="mb-2 mt-2 show_one_line text-center">  Book Title</p>
</a>

<a class="col-4 col-sm-3 col-md-3 col-lg-2 col-xl-2 mt-2 pl-1 pr-1">
   <img src="{{ url('resources/img/thumb.jpeg') }}" class="img-responsive" />
   <p class="mb-2 mt-2 show_one_line text-center">  Book Title</p>
</a>

<a class="col-4 col-sm-3 col-md-3 col-lg-2 col-xl-2 mt-2 pl-1 pr-1">
   <img src="{{ url('resources/img/thumb.jpeg') }}" class="img-responsive" />
   <p class="mb-2 mt-2 show_one_line text-center">  Book Title</p>
</a>

<a class="col-4 col-sm-3 col-md-3 col-lg-2 col-xl-2 mt-2 pl-1 pr-1">
   <img src="{{ url('resources/img/thumb.jpeg') }}" class="img-responsive" />
   <p class="mb-2 mt-2 show_one_line text-center">  Book Title</p>
</a>-->

</div>
</form>
</div>
</div>
   <script>

$("body").delegate(".box a", "click", function(){
  $(this).toggleClass("added");
  $( "span.badge" ).text( "" + $("a.added").length + " " + "");
});

/*$(document).ready(function(){
  $(".box a").click(function(){
    $( "span.badge" ).text( "" + $("a.added").length + " " + "");
  });
});*/
  
// $('.box a').live('added', function(){
// alert($('.box a').length);
// });
/*$(".box a").click(function() {
  var n = $( "a.added" ).length;
  console.log(n);
  $( "span.badge" ).text( "" + n + " " + "");
}).trigger( "click" );*/

/*$('.box a').click(function() {
  $(this).toggleClass("added");
});*/
</script>
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

$("#series").change(function(event) {
  setBooksCount();
  var selected = $(this).val();
  if(selected != '') {
    console.log($(this).val());

    var base_url = "{{url('/')}}";
  var headers = $('meta[name="csrf-token"]').attr('content');
  //var getCategories = [];
  
  var requestData = {
      // "displayCategories": ['careerseries', 'playgroup']
      "cat": $(this).val()
  };
  console.log('headers: ', headers);
  $.ajax({
      type: "POST",
      headers: {
          'X-CSRF-TOKEN': headers
      },
      data: requestData,
      url: base_url + "/box-data",
      success: function(msg) {
          console.log(msg);
          if(msg.status) {
            $('.box').html(msg.data);
          }
          // debugger
          /*for (let i = 0; i < msg.length; i++) {
              for (let j = 0; j < msg[i].length; j++) {
                  $('#category-' + msg[i][j].categories_id + ' section').append("<div class='mr-2 ml-2 text-center'><a href='" + base_url + "/product/" + msg[i][j].categories_id + "/" + msg[i][j].sku + "'><img class='img-fluid' src='storage/app/public/uploads/img/" + msg[i][j].series_table_name + "/thumb/" + msg[i][j].thumb_img + "'><a/><h5 class='mt-1 mb-1 show_two_line'> " + msg[i][j].book_title + " </h5><a href='" + base_url + "/product/" + msg[i][j].categories_id + "/" + msg[i][j].sku + "'> <button  class='button e-series-book'><span>View Details</span></button></a></div>");
              }
          }*/
      }
  });
  }
});

$(document).ready(function() {
  $('#addToBoxCart').on('click',function(){

    //console.log($('#input_Box option:selected').attr('data-id'));

    var dataBooks = $('#input_Box option:selected').attr('data-books');
    //console.log(dataBooks);
    var selected = $( "span.badge" ).text();
    //console.log(selected);

    if(parseInt(dataBooks) > parseInt(selected)) {
      alert('You should select '+dataBooks+' books!');
    } else if(parseInt(dataBooks) < parseInt(selected)) {
      alert('You should select '+dataBooks+' books only!');
    } else {
      var series = $('#series').val();
      // var plan = $('#input_Box').val();
      var plan = $('#input_Box option:selected').attr('data-id');
      var products = [];
      var i = 0;
      $('a.added').each(function(i){
        products[i++] = $(this).attr('data-bookid');
        console.log("Book Id " + $(this).attr('data-bookid'));
      });

      //$( "span.badge" ).text( "" + $("a.added").length + " " + "");

      // alert("Ready")
      var base_url = "{{url('/')}}";
      var headers = $('meta[name="csrf-token"]').attr('content');
      var requestData = {
         'book_ids': products,
         'category_id': series,
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
              location.replace(base_url+"/cart/view");
            }
              //console.log('msg: ', msg);
              //$('#totalQty').text(msg.qty);
              //$("#totalAmount").text(parseFloat(msg.totalAmount).toFixed(2));
              //$('#viewCart').show();
          }
      });
    }
  })
});
</script>
@endsection