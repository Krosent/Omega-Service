@extends('layouts.master')
@section('title')
    {{\App\Category::find($category_id)->category_title}}
@endsection

@section('content')
    <div class="col-sm-9 col-md-9">
    <div class="container-fluid ">
        <h3 class="text-center">{{\App\Category::find($category_id)->category_title}}</h3>
        <hr>
        @foreach($display_sub_cats as $sub_cat)
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail text-center">
                <a href="/category/{{$category_id}}/sub/{{$sub_cat['id']}}">
                <img src="{{url("/") . "/" . $sub_cat['sub_cat_img']}}" alt="...">
                </a>
                <div class="caption">
                    <h4>{{$sub_cat['sub_name']}}</h4>
                    <p> <a href="/category/{{$category_id}}/sub/{{$sub_cat['id']}}" class="btn btn-default btn-block" role="button">Перейти</a></p>
                </div>
            </div>
        </div>
            @endforeach
    </div>
    </div>
@endsection