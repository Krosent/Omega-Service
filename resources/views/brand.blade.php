@extends('layouts.master')
@section('title')
    {{\App\Brand::find($brand_id)->brand_name}}
@endsection

@section('content')
    <div class="col-sm-9 col-md-9">
        <h3 class="text-center">{{\App\Brand::find($brand_id)->brand_name}}</h3>
        <hr>
        <div class="row">

            @foreach($display_items as $item)

                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <a href="/category/{{$category_id}}/sub/{{$subcat_id}}/brand/{{$brand_id}}/item/{{$item['id']}}">
                            <img src="{{(\App\Image::where('item_id', $item['id'])->first() !=null) ? \App\Image::where('item_id', $item['id'])->first()->image_url : 'default_mg'}}" alt="...">
                        </a>
                        <div class="caption">
                            <h3>{{$item['item_name']}}</h3>
                            <span class="price-tag">{{$item['price_display']}} AZN</span>
                            <p>{{mb_strimwidth($item['item_desc'], 0, 250, '....')}}</p>
                            <p><a href="/category/{{$category_id}}/sub/{{$subcat_id}}/brand/{{$brand_id}}/item/{{$item['id']}}" class="btn btn-info btn-block" role="button">Описание</a></p>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
        <div class="text-center">
            {{--PAGINATION RENDERING--}}
            {{ $display_items->links() }}
        </div>
    </div>
@endsection