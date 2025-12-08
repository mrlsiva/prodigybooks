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
<script src="{{ url('resources/js/flipbook.min.js?v3') }}"></script>
</head>
<body onselectstart="return false">
<div id="container">
<input type="hidden" id="book" value={{$book_path}} />
<input type="hidden" id="category" value={{$series_table_name}} />
    <img src= "{{ url('storage/uploads/img/'.$series_table_name.'/thumb/'.$thumb_img) }}" />
    <div id="pages">
      
    <?php
    // Remove .pdf extension if present to get the directory name
    $book_dir = str_replace('.pdf', '', $book_path);
    $dirname = storage_path('app/public/uploads/book/'.$book_dir);
    
    // Try multiple image formats
    $images = array_merge(
        glob($dirname."/*.jpg"),
        glob($dirname."/*.jpeg"),
        glob($dirname."/*.JPG"),
        glob($dirname."/*.JPEG")
    );
    
    // Sort images naturally (1, 2, 3... instead of 1, 10, 11, 2...)
    natsort($images);
    
    // Debug: Check if directory and images exist
    if (!is_dir($dirname)) {
        echo '<!-- Directory not found: ' . $dirname . ' -->';
    } else {
        echo '<!-- Directory found: ' . $dirname . ' -->';
        echo '<!-- Images found: ' . count($images) . ' -->';
    }
    
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
        
        // Remove .pdf extension from book path to get directory name
        var bookDir = $("#book").val().replace('.pdf', '');
        
        // Debug: Check what's in the pages div
        console.log("Pages div HTML:", $('#pages').html());
        console.log("Span count:", $('#pages span').length);
        
        var arr=[];
        $.each($('#pages span'), function(i){
            var getImg = $(this).text();
            
            console.log("Image path from span:", getImg);
            
            // Extract just the filename from the full path
            var filename = getImg.substring(getImg.lastIndexOf('/') + 1);
            
            console.log("Extracted filename:", filename);

            arr.push({src:base_url + "/storage/uploads/book/" + bookDir + "/" + filename, thumb:base_url + "/storage/uploads/book/" + bookDir + "/" + filename, title:"Little Prodigy Books"})
        })
        
        console.log("Flipbook pages array:", arr);
        console.log("Total pages:", arr.length);
        
        if(arr.length === 0) {
            console.error("No pages found! Check if images exist in the #pages div");
            console.error("Book path:", $("#book").val());
            console.error("Book directory:", bookDir);
            console.error("Category:", $("#category").val());
        }
           
        $("#container").flipBook({
            pages:arr,
            autoplayOnStart:false,
            autoplayInterval:2000
        });
    })
</script>
</body>
</html>