@foreach($products as $pro)
	<a class="col-4 col-sm-3 col-md-3 col-lg-2 col-xl-2 mt-2 pl-1 pr-1" data-bookid="{{ $pro->id }}">
	   <img src="{{ 'https://littleprodigybooks.in/storage/app/public/uploads/img/'.$table.'/thumb/'.$pro->thumb_img }}" class="img-responsive" />
	   <p class="mb-2 mt-2 show_one_line text-center">  {{ $pro->book_title }}</p>
	</a>
@endforeach