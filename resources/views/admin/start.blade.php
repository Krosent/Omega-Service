@extends('admin.layouts.master')


@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Добро пожаловать, {{Auth::user()->name}}!
                <small>
                    Информация на
                    <?php
                    date_default_timezone_set('Europe/Moscow');
                    echo date('d.m.Y H:i', time());
                    ?>
                </small>
            </h1>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3"> <i class="fa fa-tasks fa-5x"></i> </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$categories_count}}</div>
                            <div>Количество категорий</div>
                        </div>
                    </div>
                </div>
                <a href="../admin/categories">
                    <div class="panel-footer"> <span class="pull-left">Подробнее</span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3"> <i class="fa fa-industry fa-5x"></i> </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$sub_categories_count}}</div>
                            <div>Количество под-категорий</div>
                        </div>
                    </div>
                </div>
                <a href="../admin/products">
                    <div class="panel-footer"> <span class="pull-left">Подробнее</span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>


        <div class="col-lg-4 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3"> <i class="fa fa-gg-circle fa-5x"></i> </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$brands_count}}</div>
                            <div>Количество брендов</div>
                        </div>
                    </div>
                </div>
                <a href="../admin/brands">
                    <div class="panel-footer"> <span class="pull-left">Подробнее</span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>


        <div class="col-lg-4 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3"> <i class="fa fa-shopping-cart fa-5x"></i> </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$items_count}}</div>
                            <div>Количество товаров</div>
                        </div>
                    </div>
                </div>
                <a href="../admin/products">
                    <div class="panel-footer"> <span class="pull-left">Подробнее</span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>


    </div>
    @endsection