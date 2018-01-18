@extends('layouts.master')
@section('title')
    Главная
@endsection

@section('content')
    <div class="container col-sm-9 col-md-9"> {{--Главный контейнер данной страницы --}}
        {{--Верхняя часть--}}
        <h3 class="text-center"><span class="fa fa-search"></span> Поиск:</h3>
        <hr>
        <h4><span class="fa fa-dot-circle-o"></span> Запрос для поиска: <span id="search_string">{{$search}}</span></h4>
        <h4><span class="fa fa-dot-circle-o"></span> Найдено схожих продуктов: <b id="found_count">{{count($items)}}</b></h4>
        <br>
        {{--///////--}}

        {{--Таблица с найденными продуктами--}}
        <div class="" id="products">
        <table class="table table-bordered text-center">
            <h4>Найденные продукты</h4>
            <tr>
                <th class="text-center"><span class="fa fa-hashtag"></span></th>
                <th class="text-center"><span class="fa fa-product-hunt"></span> Наименование</th>
                <th class="text-center"><span class="fa fa-book"></span> В наличии(склад)</th>
                <th class="text-center"><span class="fa fa-money"></span> Цена</th>
            </tr>
        @foreach($items as $item)

                <tr>
                    <td>{{++$loop->index}}</td>
                    <td><a href="/category/{{$item->category_id}}/sub/{{$item->sub_category_id}}/brand/{{$item->brand_id}}/item/{{$item->id}}">{{$item->item_name}}</a></td>
                    <td>{{$item->item_on_warehouse}}</td>
                    <td>{{$item->price_display}}</td>
                </tr>
        @endforeach
        </table>
            {{$items->links()}}
        </div>
        {{--///////--}}

        {{--Таблица с найденными брендами--}}
        {{--<div class="" id="brands">--}}
            {{--<table class="table table-bordered text-center">--}}
                {{--<h4>Найденные бренды</h4>--}}
                {{--<tr>--}}
                    {{--<td>#</td>--}}
                    {{--<td>Бренд</td>--}}
                {{--</tr>--}}
                {{--@foreach($brands as $brand)--}}

                    {{--<tr>--}}
                        {{--<td>{{++$loop->index}}</td>--}}
                        {{--<td><a href="/category/{{$brand->category_id}}/sub/{{$brand->sub_category_id}}/brand/{{$brand->id}}">{{$brand->brand_name}}</a></td>--}}
                    {{--</tr>--}}
                {{--@endforeach--}}
            {{--</table>--}}
        {{--</div>--}}
        {{--/////////--}}

        {{--Таблица с найденными подкатегориями--}}
        {{--<div class="" id="subcats">--}}
            {{--<table class="table table-bordered text-center">--}}
                {{--<h4>Найденные подкатегории</h4>--}}
                {{--<tr>--}}
                    {{--<td>#</td>--}}
                    {{--<td>Подкатегория</td>--}}
                {{--</tr>--}}
                {{--@foreach($subcategories as $subcategory)--}}

                    {{--<tr>--}}
                        {{--<td>{{++$loop->index}}</td>--}}
                        {{--<td><a href="/category/{{$subcategory->category_id}}/sub/{{$subcategory->id}}">{{$subcategory->sub_name}}</a></td>--}}
                    {{--</tr>--}}
                {{--@endforeach--}}
            {{--</table>--}}
        {{--</div>--}}
        {{--/////////--}}

        {{--Таблица с найденными категориями--}}
        {{--<div class="" id="subcats">--}}
            {{--<table class="table table-bordered text-center">--}}
                {{--<h4>Найденные подкатегории</h4>--}}
                {{--<tr>--}}
                    {{--<td>#</td>--}}
                    {{--<td>Подкатегория</td>--}}
                {{--</tr>--}}
                {{--@foreach($categories as $category)--}}

                    {{--<tr>--}}
                        {{--<td>{{++$loop->index}}</td>--}}
                        {{--<td><a href="/category/{{$category->id}}">{{$category->category_title}}</a></td>--}}
                    {{--</tr>--}}
                {{--@endforeach--}}
            {{--</table>--}}
        {{--</div>--}}
        {{--/////////--}}



    </div>

@endsection