<!DOCTYPE html>
<html>
<head>
<style>
div#pages {
    display: none;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ url('resources/css/flipbook.style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('resources/css/font-awesome.css') }}">
<script src="{{ url('resources/js/flipbook.min.js?v1') }}"></script>
</head>
<body onselectstart="return false">
<div id="container">	
	<input type="hidden" id="base_url" value="{{ url('storage/app/public/uploads/img/trialbooks/books/'.$book_path) }}"/>	
	<input type="hidden" id="book" value="{{$book_path}}"/>	
    <img src= "{{ url('storage/app/public/uploads/img/trialbooks/thumb/'.$thumb_img) }}"/>
    <div id="pages">      
	    <?php
			$dirname = storage_path('app/public/uploads/img/trialbooks/books/'.$book_path);
			//echo $dirname;
			//print_r($dirname);
			$images = glob($dirname."/*.jpg");	     
			foreach($images as $image) {
				echo '<span>'.$image.'</span>';
			}
	    ?>
	</div>
</div>
<script type="text/javascript">
document.oncontextmenu =new Function("return false;")
    $(document).ready(function () {
        //var base_url = "{{url('http://dq4hy0kq5iyaw.cloudfront.net')}}";
        var base_url = $('#base_url').val();
        var book_split = $('#book').val();
        var arr=[];
        $.each($('#pages span'), function(i){
            var getImg = $(this).text();
            var splitImg = getImg.split(book_split);
            //arr.push({src:base_url + "/book/" + $("#book").val()+"/"+splitImg[1], thumb:base_url + "/book/" + $("#book").val()+"/"+splitImg[1], title:"Little Prodigy Books"})
            arr.push({src:base_url + "/"+splitImg[1], thumb:base_url +"/"+splitImg[1], title:"Little Prodigy Books"})
        })
           
        $("#container").flipBook({
            pages:arr,
            autoplayOnStart:false,
            autoplayInterval:2000
        });
    })
</script>
</body>
</html>