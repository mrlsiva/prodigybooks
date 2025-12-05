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
<link rel="stylesheet" type="text/css" href="{{ url('css/flipbook.style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('css/font-awesome.css') }}">
<script src="{{ url('js/flipbook.min.js?v3') }}"></script>
</head>
<body onselectstart="return false">
<div id="container">
<input type="hidden" id="book" value={{$book_path}} />
<input type="hidden" id="category" value={{$series_table_name}} />
    <img src= "{{ url('storage/uploads/img/'.$series_table_name.'/thumb/'.$thumb_img) }}" />
    <div id="pages">
      
    <?php

  $dirname = storage_path('app/public/uploads/book/'.$book_path);

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
        var base_url = "{{url('/')}}";
        
        var arr=[];
        $.each($('#pages span'), function(i){
            var getImg = $(this).text();
           
            var splitImg = getImg.split('.pdf/');

            arr.push({src:base_url + "/storage/uploads/book/" + $("#book").val()+"/"+splitImg[1], thumb:base_url + "/storage/uploads/book/" + $("#book").val()+"/"+splitImg[1], title:"Little Prodigy Books"})
        })
           
        $("#container").flipBook({
            pages:arr,
            autoplayOnStart:false,
            autoplayInterval:2000,
            loadAllPages: false,
            loadPagesF: 3,
            loadPagesB: 1,
            pageTextureSize: 1500,
            pageTextureSizeSmall: 1024,
            viewMode: "webgl",
            preloadPages: 4,
            sound: true,
            assets: {
                flipMp3: base_url + "/mp3/turnPage.mp3"
            }
        });
    })
</script>
</body>
</html>
