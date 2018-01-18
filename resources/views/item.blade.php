@extends('layouts.master')
@section('title')
    {{\App\Item::find($item_id)->item_name}}
@endsection

@section('content')
    <div class="col-sm-9 col-md-9">
        <div class="row">
            <div class="col-sm-9">
                <h1> {{$item->item_name}} <br/>
                    <small>Номер товара: {{$item->id}}</small>
                    <br>
                    <span style="font-size: 19px;"><span style="color: #6b8cff;">Стоимость:</span> <b>{{$item->price_display}}</b> AZN</span>
                </h1>
            </div>
        </div>
        <hr>
        <div class="row">

            {{--Слайдер фотографий--}}
            <div class="col-sm-5 description-images">
                <div id="product-page-carousel-img" class="carousel slide product-page-img" data-interval="false">
                    <div class="carousel-inner" role="listbox">
                        @if(count($images) != 0)
                            <div class="item active">
                                <div class="item_zoom-wrap"><img class="img-responsive item_image"
                                                                 src="{{$images[0]['image_url']}}"
                                                                 data-holder-rendered="true" itemprop="image"></div>
                            </div>
                            @foreach($images as $image)
                                <div class="item">
                                    <div class="item_zoom-wrap"><img class="img-responsive item_image"
                                                                     src="{{$image['image_url']}}"
                                                                     data-holder-rendered="true" itemprop="image"></div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    {{--  Слайдер превьюшек для фотографий--}}
                    <div class="images-slider">
                        <ol class="carousel-indicators">
                            @foreach($images as $image)
                                <li data-target="#product-page-carousel-img" data-slide-to="{{$image['id']}}"><img
                                            src="{{$image['image_url']}}" width="50px"
                                            height="50px" class="img-responsive"></li>
                            @endforeach
                        </ol>
                    </div>
                   {{--  //  Слайдер превьюшек для фотографий--}}
                </div>
            </div>
            {{-- / Слайдер фотографий--}}

            {{--Лист с характеристиками--}}
            <div class="col-sm-7">
                <h3>Характеристики</h3>
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <table class="table">
                            <tbody>
                            @foreach($chars as $char)
                                <tr>
                                    <th>{{\App\SingleChar::find($char->id)->char_title}}</th>
                                    <td>{{$char['chars_param']}}</td>
                                </tr>

                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                {{--  / Лист с характеристиками--}}

                {{--Модальный блок, popup, для покупки товара--}}
                <p>
                    <div style="text-align:justify"><strong> {{$item->item_desc}}</strong>
                        <br/><br/>
                        {{$item->item_add_desc}}
                        <br/><br/>
                        <button type="button"
                                class="btn btn-primary" data-toggle="modal" data-target="#myModal">Купить
                        </button>
                        <!-- Modal -->
                        <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Приобрести {{$item->item_name}}</h4>
                                    </div>
                                    <div class="modal-body">
                <p>Для покупки свяжитесь с нами по телефону +993 575 334 29 39. <br/>Будьте готовы назвать номер товара
                    -
                    {{$item->id}}</p>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>

            {{--  // Модальный блок, popup, для покупки товара--}}
        </div>
    </div>
    </div> <br/><br/> <br/> <br/><br/> </div>
    </div>
    </div>
    </div>
@endsection