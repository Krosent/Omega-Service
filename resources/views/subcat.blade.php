@extends('layouts.master')
@section('title')
    {{\App\SubCategory::find($subcat_id)->sub_name}}
@endsection

@section('content')
    <div class="col-sm-9 col-md-9">
        <div class="container-fluid ">
            {{--@if(\App\SubCategory::find($subcat_id)->relations)--}}
            <h3 class="text-center">{{\App\SubCategory::find($subcat_id)->sub_name}}</h3>
            <hr>
            @foreach($display_brands as $brand)
                <div class="col-sm-6 col-md-4">

                    <div class="thumbnail text-center">
                        <a href="/category/{{$category_id}}/sub/{{$subcat_id}}/brand/{{$brand['id']}}">
                            <img src="{{url("/") . "/" . $brand['brand_img']}}" alt="...">
                        </a>

                        <div class="caption">
                            <h4>{{$brand['brand_name']}}</h4>
                            <p><a href="/category/{{$category_id}}/sub/{{$subcat_id}}/brand/{{$brand['id']}}"
                                  class="btn btn-default btn-block" role="button">Перейти</a></p>
                        </div>

                    </div>
                </div>
            @endforeach
                {{--@endif--}}
        </div>
    </div>




@endsection

