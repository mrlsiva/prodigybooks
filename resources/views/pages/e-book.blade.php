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
    // Keep the full book_path as is (including .pdf if present)
    $book_dir = $book_path;
    $category = $series_table_name;
    
    // Temporary debug - will remove after finding issue
    echo "<!-- DEBUG: book_path = " . $book_path . " -->";
    echo "<!-- DEBUG: category = " . $category . " -->";
    echo "<!-- DEBUG: book_dir = " . $book_dir . " -->";
    
    // Try multiple possible directory locations with category folder
    $possible_dirs = [
        storage_path('app/public/uploads/book/'.$category.'/'.$book_dir),
        storage_path('app/public/uploads/book/'.$category.'/'.str_replace('.pdf', '', $book_dir)),
        storage_path('app/public/uploads/book/'.$book_dir), // Fallback: old structure without category
        storage_path('app/public/uploads/book/'.str_replace('.pdf', '', $book_dir)),
        public_path('storage/uploads/book/'.$category.'/'.$book_dir),
        public_path('storage/uploads/book/'.$category.'/'.str_replace('.pdf', '', $book_dir)),
    ];
    
    $dirname = null;
    $images = [];
    $found_category_path = null;
    
    // Find the first directory that exists
    foreach($possible_dirs as $dir) {
        if(is_dir($dir)) {
            $dirname = $dir;
            
            // Check if this path includes the category folder
            if(strpos($dir, $category.'/') !== false) {
                $found_category_path = $category;
            }
            
            // Try multiple image formats
            $images = array_merge(
                glob($dirname."/*.jpg"),
                glob($dirname."/*.jpeg"),
                glob($dirname."/*.JPG"),
                glob($dirname."/*.JPEG"),
                glob($dirname."/*.png"),
                glob($dirname."/*.PNG")
            );
            
            if(count($images) > 0) {
                break; // Found images, stop searching
            }
        }
    }
    
    // Sort images naturally (1, 2, 3... instead of 1, 10, 11, 2...)
    if(count($images) > 0) {
        natsort($images);
    }
    
    // Temporary debug
    echo "<!-- DEBUG: Tried directories: -->";
    foreach($possible_dirs as $dir) {
        echo "<!-- " . $dir . " - " . (is_dir($dir) ? "EXISTS" : "NOT FOUND") . " -->";
    }
    echo "<!-- DEBUG: Selected directory: " . ($dirname ?? "NONE") . " -->";
    echo "<!-- DEBUG: Images found: " . count($images) . " -->";
    echo "<!-- DEBUG: found_category_path: " . ($found_category_path ?? "NULL") . " -->";
    
    // Determine which directory name to use in URLs (without .pdf for web access)
    $url_book_dir = str_replace('.pdf', '', $book_dir);
    
    foreach($images as $image) {
        // Output path with category if found, otherwise old structure
        $filename = basename($image);
        if($found_category_path) {
            echo '<span>storage/app/public/uploads/book/'.$found_category_path.'/'.$url_book_dir.'/'.$filename.'</span>';
        } else {
            echo '<span>storage/app/public/uploads/book/'.$url_book_dir.'/'.$filename.'</span>';
        }
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
            var imagePath = $(this).text();
            arr.push({src:base_url + "/" + imagePath, thumb:base_url + "/" + imagePath, title:"Little Prodigy Books"})
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