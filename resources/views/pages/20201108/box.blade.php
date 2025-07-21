@extends('layouts.app')

@section('content')
<style>

/* IMG displaying */
.person-card {
    margin-top: 5em;
    padding-top: 5em;
}
.person-card .card-title{
    text-align: center;
}
.person-card .person-img{
    width: 10em;
    position: absolute;
    top: -5em;
    left: 50%;
    margin-left: -5em;
    border-radius: 100%;
    overflow: hidden;
    background-color: white;
}
.form-group{
    float:left !important;
}
.badge {
    background: #fff;
    color: #000;
}
.added {
    opacity: 0.5;
}
.button {
    width:100%;
    padding: 7px 25px;
}


@media screen and (max-width: 540px) {
    .button {
    padding: 2px;
    font-size: 12px;
}

}
</style>
   <div class="row mt-4">

<div class="container" style="margin-top: 1em;">
    <!-- Sign up form -->
    <form>
        <!-- Sign up card -->
        <div class="card person-card">
            <div class="card-body">
                <!-- Sex image -->
                
                <img id="img_sex" class="person-img" src="{{ url('/resources/img/king.png') }}">
                
                <div class="container text-center mb-4">
                    <h2 id="who_message" class="card-title">The King’s Box</h2>
                    <p>You Can Chose Upto 10 Books</p>
                </div>
                <!-- First row (on medium screen) -->
                <div class="container">
                    <div class="form-group col-6 col-sm-6 col-md-6 col-lg-2 col-xl-2">
                        <select id="input_Box" class="form-control">
                            <option value="King_Box">King Box</option>
                            <option value="Queen_Box">Queen Box</option>
                        </select>
                    </div>
                    <div class="form-group col-6 col-sm-6 col-md-6 col-lg-5 col-xl-5">
                        <select id="" class="form-control">
                            <option value="Series">Kids Can Recycle</option>
                            <option value="Series">Picture Books</option>
                        </select>
                    </div>
                    <div class="form-group col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                    <button type="button" class="button">
  Book(s) Chosen  <span class="badge badge-light">4</span>
</button>

                    </div>

                    <div class="form-group col-6 col-sm-6 col-md-6 col-lg-2 col-xl-2">
            
<button class="button"><span>Add to Cart </span></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4 box">

<a class="col-4 col-sm-3 col-md-3 col-lg-2 col-xl-2 mt-2 pl-1 pr-1">
   <img src="{{ url('resources/img/thumb.jpeg') }}" class="img-responsive" />
   <p class="mb-2 mt-2 show_one_line text-center">  book_title</p>

</a>
<a class="col-4 col-sm-3 col-md-3 col-lg-2 col-xl-2 mt-2 pl-1 pr-1">
   <img src="{{ url('resources/img/thumb.jpeg') }}" class="img-responsive" />
   <p class="mb-2 mt-2 show_one_line text-center">  book_title</p>

</a>
<a class="col-4 col-sm-3 col-md-3 col-lg-2 col-xl-2 mt-2 pl-1 pr-1">
   <img src="{{ url('resources/img/thumb.jpeg') }}" class="img-responsive" />
   <p class="mb-2 mt-2 show_one_line text-center">  book_title</p>

</a>
<a class="col-4 col-sm-3 col-md-3 col-lg-2 col-xl-2 mt-2 pl-1 pr-1">
   <img src="{{ url('resources/img/thumb.jpeg') }}" class="img-responsive" />
   <p class="mb-2 mt-2 show_one_line text-center">  book_title</p>

</a>
<a class="col-4 col-sm-3 col-md-3 col-lg-2 col-xl-2 mt-2 pl-1 pr-1">
   <img src="{{ url('resources/img/thumb.jpeg') }}" class="img-responsive" />
   <p class="mb-2 mt-2 show_one_line text-center">  book_title</p>

</a>

<a class="col-4 col-sm-3 col-md-3 col-lg-2 col-xl-2 mt-2 pl-1 pr-1">
   <img src="{{ url('resources/img/thumb.jpeg') }}" class="img-responsive" />
   <p class="mb-2 mt-2 show_one_line text-center">  book_title</p>

</a>
<a class="col-4 col-sm-3 col-md-3 col-lg-2 col-xl-2 mt-2 pl-1 pr-1">
   <img src="{{ url('resources/img/thumb.jpeg') }}" class="img-responsive" />
   <p class="mb-2 mt-2 show_one_line text-center">  book_title</p>

</a>
<a class="col-4 col-sm-3 col-md-3 col-lg-2 col-xl-2 mt-2 pl-1 pr-1">
   <img src="{{ url('resources/img/thumb.jpeg') }}" class="img-responsive" />
   <p class="mb-2 mt-2 show_one_line text-center">  book_title</p>

</a>
<a class="col-4 col-sm-3 col-md-3 col-lg-2 col-xl-2 mt-2 pl-1 pr-1">
   <img src="{{ url('resources/img/thumb.jpeg') }}" class="img-responsive" />
   <p class="mb-2 mt-2 show_one_line text-center">  book_title</p>

</a>
<a class="col-4 col-sm-3 col-md-3 col-lg-2 col-xl-2 mt-2 pl-1 pr-1">
   <img src="{{ url('resources/img/thumb.jpeg') }}" class="img-responsive" />
   <p class="mb-2 mt-2 show_one_line text-center">  book_title</p>

</a>
<a class="col-4 col-sm-3 col-md-3 col-lg-2 col-xl-2 mt-2 pl-1 pr-1">
   <img src="{{ url('resources/img/thumb.jpeg') }}" class="img-responsive" />
   <p class="mb-2 mt-2 show_one_line text-center">  book_title</p>

</a>
<a class="col-4 col-sm-3 col-md-3 col-lg-2 col-xl-2 mt-2 pl-1 pr-1">
   <img src="{{ url('resources/img/thumb.jpeg') }}" class="img-responsive" />
   <p class="mb-2 mt-2 show_one_line text-center">  book_title</p>

</a>
<a class="col-4 col-sm-3 col-md-3 col-lg-2 col-xl-2 mt-2 pl-1 pr-1">
   <img src="{{ url('resources/img/thumb.jpeg') }}" class="img-responsive" />
   <p class="mb-2 mt-2 show_one_line text-center">  book_title</p>

</a>
<a class="col-4 col-sm-3 col-md-3 col-lg-2 col-xl-2 mt-2 pl-1 pr-1">
   <img src="{{ url('resources/img/thumb.jpeg') }}" class="img-responsive" />
   <p class="mb-2 mt-2 show_one_line text-center">  book_title</p>

</a>
<a class="col-4 col-sm-3 col-md-3 col-lg-2 col-xl-2 mt-2 pl-1 pr-1">
   <img src="{{ url('resources/img/thumb.jpeg') }}" class="img-responsive" />
   <p class="mb-2 mt-2 show_one_line text-center">  book_title</p>

</a>
</div> 

        </form>
</div>
   </div>
   <script>
  
// $('.box a').live('added', function(){
// alert($('.box a').length);
// });
$(".box a").click(function() {
    var n = $( "a.added" ).length;
    $( "span.badge" ).text( "" + n + " " + "");
  })  .trigger( "click" );

  $('.box a').click(function() {
    $(this).toggleClass("added");
});
</script>
   <script>
// URLs images
var king_img = "{{ url('/resources/img/king.png') }}";
var male_img = "{{ url('/resources/img/queen.png') }}";

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

/**
*   Set image path (King_Box or Queen_Box)
*/
function set_sex_img() {
    var sex = $("#input_Box").val();
    if (sex == "King_Box") {
        // male
        $("#img_sex").attr("src", male_img);
    } else {
        // female
        $("#img_sex").attr("src", king_img);
    }
}


/**
*   Validation function for last name and first name
*/

   </script>
   @endsection