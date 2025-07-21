@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    @foreach ($categories as $category)
                        <div id="category-{{$category->id}}"> id: {{$category->id}}
                            <div class="slider-title" data-attr={{$category->series_table_name}}> Series Name: {{$category->series_table_name}}</div>
                        </div>
                        
                        
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<script>

$(document).ready(function(){
        var base_url = "{{url('/')}}";
        var headers = $('meta[name="csrf-token"]').attr('content');
        var getCategories = [];
        $('.slider-title').each(function( index ) {
            // console.log( index + ": " + $( this ).attr('data-attr') );
            getCategories.push($( this ).attr('data-attr'));
        });
        // console.log("getCategories: ", getCategories);
        var requestData = {
            // "displayCategories": ['careerseries', 'playgroup']
            "displayCategories": getCategories
        };
        console.log('headers: ', headers);
        $.ajax({
            type: "POST",
            headers: {'X-CSRF-TOKEN': headers},
            data: requestData,
            url: base_url+"/api/categories",
            success: function(msg){
                // console.log('msg: ', msg, requestData["displayCategories"].length, msg.length);
                for (let i=0; i< msg.length; i++) {
                    for (let j=0; j<msg[i].length; j++){
                        // console.log('msg[i][j]: ', msg[i][j].series_table_name, requestData["displayCategories"][i], i, j, counter, getHtml);
                        
                        $('#category-'+msg[i][j].categories_id).append("<div id=cat-"+j+">"+msg[i][j].series_table_name+"</div>");
                    }
                }

            }
        }); 
    })
</script>
@endsection
