@extends('admin.layouts.master')

@section('content')
    <link href="{{asset('a-panel/dist/css/categories.css')}}" rel="stylesheet">
    <div class="container">
        <br><br>
        <div class="row">
            <div class="col-md-11">
                {{--IF SUCCESS - SHOW MESSAGE--}}
                @if(Illuminate\Support\Facades\Session::has('ItemAdded'))
                    <div class="form-control alert alert-success alert-dismissible alert-login" style="padding-bottom: 38px;"
                         role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Успешно! </strong>{{Illuminate\Support\Facades\Session::get("ItemAdded")}}
                    </div>
                @endif

                @if(Illuminate\Support\Facades\Session::has('ItemEdited'))
                    <div class="form-control alert alert-success alert-dismissible alert-login" style="padding-bottom: 38px;"
                         role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Успешно! </strong>{{Illuminate\Support\Facades\Session::get("ItemEdited")}}
                    </div>
                @endif

                @if(Illuminate\Support\Facades\Session::has('ItemDeleted'))
                    <div class="form-control alert alert-success alert-dismissible alert-login" style="padding-bottom: 38px;"
                         role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Успешно! </strong>{{Illuminate\Support\Facades\Session::get("ItemDeleted")}}
                    </div>
                @endif



                <div class="panel panel-default panel-table">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col col-xs-6">
                                <h3 class="panel-title">Продукты</h3>
                            </div>
                            <div class="col col-xs-6 text-right">
                                <button type="button" data-toggle="modal" data-target="#addNewChars" class="btn btn-sm btn-default btn-create">Добавить хар-ки</button>
                                <button type="button" data-toggle="modal" data-target="#addNewProduct" class="btn btn-sm btn-primary btn-create">Добавить</button>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-list">
                            <thead>
                            <tr>
                                <th><em class="fa fa-cog"></em></th>
                                <th class="hidden-xs text-center">ID</th>
                                <th class="text-center">Наименование</th>
                                <th class="text-center">Категория</th>
                                <th class="text-center">С-Категория</th>
                                <th class="text-center">Бренд</th>
                                <th class="text-center">Прзв. цена</th>
                                <th class="text-center">Пт. цена</th>
                                <th class="text-center">Склад</th>
                                <th></th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($allItems as $item)
                                <tr>
                                    <td align="center">
                                        <form method="POST" action="/admin/products/delete">
                                        <a type="button" data-toggle="modal" data-target="#editProduct{{$item->id}}" class="btn btn-default">
                                            <em class="fa fa-pencil"></em></a>
                                            {{csrf_field()}}
                                            <input type="hidden" id="item_id" name="item_id" value="{{$item->id}}">
                                            <button type="submit" class="btn btn-danger">
                                                <em class="fa fa-trash"></em>
                                            </button>
                                        </form>
                                    </td>
                                    <td class="hidden-xs text-center">{{$item['id']}}</td>
                                    <td class="text-center">{{$item['item_name']}}</td>

                                    <td class="text-center">{{\App\Category::where('id', $item['category_id'])
                                    ->first()
                                    ->category_title}}
                                    </td>
                                    <td class="text-center">{{\App\SubCategory::where('id', $item['sub_category_id'])
                                    ->first()
                                    ->sub_name}}
                                    </td>
                                    <td class="text-center">{{\App\Brand::where('id', $item['brand_id'])
                                    ->first()
                                    ->brand_name}}
                                    </td>
                                    <td class="text-center">{{$item['price_manufac']}}</td>
                                    <td class="text-center">{{$item['price_display']}}</td>
                                    <td class="text-center">{{$item['item_on_warehouse']}}</td>
                                    <td align="center">
                                        <a type="button" data-toggle="modal" data-target="#addChars{{$item->id}}"  class="btn btn-warning">
                                            <em class="fa fa-certificate"></em></a>
                                        <a type="button" data-toggle="modal" data-target="#addChars{{$item->id}}"  class="btn btn-info">
                                            <em class="fa fa-image"></em></a>

                                    </td>
                                </tr>




                                <div class="modal fade" id="editProduct{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Редактирование</h4>
                                            </div>
                                            <form method="POST" action="/admin/products/edit">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        {{csrf_field()}}
                                                        <input type="hidden" name="item_id" value="{{$item->id}}">
                                                        <label for="subcategory_name_field">Название продукта:</label>
                                                        <input type="text" class="form-control" value="{{$item->item_name}}" name="prod_name_field">
                                                        <label for="category_name_field">Категория:</label>
                                                        <select class="form-control" id="category_id_field" name="category_id_field">
                                                            <option  disabled="disabled">Выберите категорию</option>
                                                            @foreach(\App\Category::all() as $category)
                                                                <option  {{ ($category->id == $item->category_id ? 'selected = "selected' : '') }}
                                                                         value="{{$category->id}}">{{$category->category_title}}</option>
                                                            @endforeach
                                                        </select>

                                                        <label for="category_name_field">Cуб-категория:</label>
                                                        <select class="form-control" id="category_id_field" name="sub_id_field">
                                                            <option  disabled="disabled">Выберите суб-категорию</option>
                                                            @foreach(\App\SubCategory::all() as $subcategory)
                                                                <option
                                                                        {{ ($item->sub_category_id == $subcategory->id ? 'selected = "selected' : '') }}
                                                                        value="{{$subcategory->id}}">{{$subcategory->sub_name}}</option>
                                                            @endforeach
                                                        </select>

                                                        <label for="category_name_field">Бренд:</label>
                                                        <select class="form-control" id="category_id_field" name="brand_id_field">
                                                            <option  disabled="disabled">Выберите суб-категорию</option>
                                                            @foreach(\App\Brand::all() as $brand)
                                                                <option
                                                                        {{ ($item->brand_id == $brand->id ? 'selected = "selected' : '') }}
                                                                        value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                                            @endforeach
                                                        </select>

                                                        <label for="warhouse_name_field">Количество на складе:</label>
                                                        <input type="number" class="form-control" id="" name="warhouse_name_field"
                                                        value="{{$item->item_on_warehouse}}">

                                                        <label for="warhouse_name_field">Производственная цена:</label>
                                                        <input type="number" class="form-control" id="" name="manufacpr_name_field"
                                                        value="{{$item->price_manufac}}">

                                                        <label for="warhouse_name_field">Продажная цена:</label>
                                                        <input type="number" class="form-control" id="" name="sellpr_name_field"
                                                        value="{{$item->price_display}}">

                                                        <label for="item_desc">Краткое описание товара(введение):</label>
                                                        <textarea class="form-control" rows="3" id="item_desc"
                                                                  name="item_desc">{{$item->item_desc}}</textarea>
                                                        <label for="item_desc">Описание товара(продолжение):</label>
                                                        <textarea class="form-control" rows="5" id="item_add_desc"
                                                                  name="item_add_desc">{{$item->item_add_desc}}</textarea>




                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                                                    <button type="submit" class="btn btn-primary">Подтвердить</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                {{--EDITING CATEGORY MODAL --}}


                                <div class="modal fade" id="addChars{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Добавление характеристик к продукту</h4>
                                            </div>
                                            <form method="POST" action="/admin/chars/addtoprod">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        {{csrf_field()}}
                                                        <label for="category_name_field">Название категории:</label>
                                                        <input type="hidden" id="cat_id" name="cat_id" value="{{$category->id}}">

                                                            <input type="text" class="form-control"  id="category_name_field" name="category_name_field"
                                                                   value="{{$category->category_title}}">
                                                    </div>

                                                    




                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                                                    <button type="submit" class="btn btn-primary">Подтвердить</button>
                                                </div>
                                            </form>


                                        </div>
                                    </div>
                                </div>


                                {{--END OF EDITING CATEGORY MODAL CODE--}}

                            @endforeach
                            </tbody>

                        </table>

                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col col-xs-4">
                            </div>
                            <div class="col col-xs-8 text-right">
                                {{ $allItems->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{--ADDING NEW PRODUCT MODAL --}}


    <div class="modal fade" id="addNewProduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Добавление нового продукта</h4>
                </div>
                <form enctype="multipart/form-data" method="POST" action="/admin/products/add">
                    <div class="modal-body">
                        <div class="form-group">
                            {{csrf_field()}}
                            <label for="subcategory_name_field">Название продукта:</label>
                            <input type="text" class="form-control" id="" name="prod_name_field">
                            <label for="category_name_field">Категория:</label>
                            <select class="form-control" id="category_id_field" name="category_id_field">
                                @foreach(\App\Category::all() as $category)
                                    <option value="{{$category->id}}">{{$category->category_title}}</option>
                                @endforeach
                            </select>

                            <label for="category_name_field">Cуб-категория:</label>
                            <select class="form-control" id="category_id_field" name="sub_id_field">
                                @foreach(\App\SubCategory::all() as $subcat)
                                    <option value="{{$subcat->id}}">{{$subcat->sub_name}}</option>
                                @endforeach
                            </select>

                            <label for="category_name_field">Бренд:</label>
                            <select class="form-control" id="category_id_field" name="brand_id_field">
                                @foreach(\App\Brand::all() as $brand)
                                    <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                @endforeach
                            </select>

                            <label for="warhouse_name_field">Количество на складе:</label>
                            <input type="number" class="form-control" id="" name="warhouse_name_field">

                            <label for="warhouse_name_field">Производственная цена:</label>
                            <input type="number" class="form-control" id="" name="manufacpr_name_field">

                            <label for="warhouse_name_field">Продажная цена:</label>
                            <input type="number" class="form-control" id="" name="sellpr_name_field">

                            <label for="item_desc">Краткое описание товара(введение):</label>
                            <textarea class="form-control" rows="3" id="item_desc"
                            name="item_desc"></textarea>
                            <label for="item_desc">Описание товара(продолжение):</label>
                            <textarea class="form-control" rows="5" id="item_add_desc"
                                      name="item_add_desc"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{--END OF ADDING NEW CONTENT MODAL CODE--}}


    {{--ADDING NEW Chars --}}


    <div class="modal fade" id="addNewChars" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Добавление новой характеристики</h4>
                </div>
                <form enctype="multipart/form-data" method="POST" action="/admin/chars/add">
                    <div class="modal-body">
                        <div class="form-group">
                            {{csrf_field()}}
                            <label for="char_name_field">Название характеристики:</label>
                            <input type="text" class="form-control" id="char_name_field" name="char_name_field">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{--END OF ADDING NEW CONTENT MODAL CODE--}}


@endsection