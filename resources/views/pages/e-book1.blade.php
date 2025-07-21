<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="{{ url('resources/css/flipbook.style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('resources/css/font-awesome.css') }}">
<script src="{{ url('resources/js/flipbook.min.js?v1') }}"></script>

</head>
<body>
<div id="container">
<input type="hidden" id="book" value={{$book_path}} />
<input type="hidden" id="category" value={{$series_table_name}} />
    <img src= "{{ url('storage/app/public/uploads/img/'.$series_table_name.'/thumb/'.$thumb_img) }}" />
    <!-- <img src= "https://littleprodigybooks.s3.ap-south-1.amazonaws.com/img/{{$series_table_name}}/thumb/{{$thumb_img}}" /> -->
</div>

<script type="text/javascript">

    $(document).ready(function () {
        var base_url = "{{url('https://littleprodigybooks.s3.ap-south-1.amazonaws.com')}}";
        $("#container").flipBook({
            pdfUrl: base_url + "/img/" + $("#category").val() + "/books/" + $("#book").val(),
        });
    })
</script>
</body>
</html>