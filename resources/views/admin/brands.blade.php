@extends('admin.layouts.master')

@section('content')
    <link href="{{asset('a-panel/dist/css/categories.css')}}" rel="stylesheet">
    <div class="container">
        <br><br>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @if(Illuminate\Support\Facades\Session::has('BrandAdded'))
                    <div class="form-control alert alert-success alert-dismissible alert-login" style="padding-bottom: 38px;"
                         role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Успешно! </strong>{{Illuminate\Support\Facades\Session::get("BrandAdded")}}
                    </div>
                @endif

                    @if(Illuminate\Support\Facades\Session::has('BrandEdited'))
                        <div class="form-control alert alert-success alert-dismissible alert-login" style="padding-bottom: 38px;"
                             role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Успешно! </strong>{{Illuminate\Support\Facades\Session::get("BrandEdited")}}
                        </div>
                    @endif

                    @if(Illuminate\Support\Facades\Session::has('BrandDeleted'))
                        <div class="form-control alert alert-success alert-dismissible alert-login" style="padding-bottom: 38px;"
                             role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Успешно! </strong>{{Illuminate\Support\Facades\Session::get("BrandDeleted")}}
                        </div>
                    @endif
                <div class="panel panel-default panel-table">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col col-xs-6">
                                <h3 class="panel-title">Бренды</h3>
                            </div>
                            <div class="col col-xs-6 text-right">
                                <button type="button" name="addBrandButton"
                                        class="btn btn-sm btn-primary btn-create"
                                        data-toggle="modal" data-target="#addNewBrand">Добавить</button>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-list">
                            <thead>
                            <tr>
                                <th><em class="fa fa-cog"></em></th>
                                <th class="hidden-xs text-center">Номер</th>
                                <th class="text-center">Название бренда</th>
                                <th class="text-center">С. Категория</th>
                                <th class="text-center">Категория</th>
                                <th class="text-center">Превью-IMG</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($allBrands as $brand)
                                <tr>
                                    <td align="center">
                                        <form method="POST" action="/admin/brands/delete">
                                        <a type="button" data-toggle="modal"
                                           data-target="#editBrand{{$brand->id}}" class="btn btn-default">
                                            <em class="fa fa-pencil"></em></a>
                                            {{csrf_field()}}
                                            <input type="hidden" id="brand_id" name="brand_id" value="{{$brand->id}}">
                                            <button type="submit" class="btn btn-danger">
                                                <em class="fa fa-trash"></em>
                                            </button>
                                        </form>
                                    </td>
                                    <td class="hidden-xs text-center">{{$brand['id']}}</td>
                                    <td class="text-center">{{$brand['brand_name']}}</td>
                                    <td class="text-center">{{\App\SubCategory::where('id', $brand['sub_category_id'])
                                    ->first()
                                    ->sub_name}}
                                    </td>
                                    <td class="text-center">{{\App\Category::where('id', $brand['category_id'])
                                    ->first()
                                    ->category_title}}
                                    </td>
                                    <td class="text-center"><a href="{{url("/") . "/" . $brand['brand_img']}}">
                                            {{$brand['brand_img']}}</a></td>
                                </tr>


                                <div class="modal fade" id="editBrand{{$brand->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Редактирование</h4>
                                            </div>
                                            <form method="POST" action="/admin/brands/edit">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        {{csrf_field()}}
                                                        <input type="hidden" name="brand_id" value="{{$brand->id}}">
                                                        <label for="category_name_field">Название бренда:</label>
                                                        <input type="text" class="form-control" id="brand_name_field" name="brand_name_field"
                                                               value="{{$brand->brand_name}}" required>

                                                        <label for="category_name_field">Категория:</label>
                                                        <select class="form-control" id="category_id_field" name="category_id_field">
                                                            <option  disabled="disabled">Выберите категорию</option>
                                                            @foreach(\App\Category::all() as $category)
                                                                <option  {{ ($category->id == $brand->category_id ? 'selected = "selected' : '') }}
                                                                         value="{{$category->id}}">{{$category->category_title}}</option>
                                                            @endforeach
                                                        </select>
                                                        <label for="category_name_field">Субкатегория:</label>
                                                        <select class="form-control" id="category_id_field" name="sub_id_field">
                                                            <option  disabled="disabled">Выберите субкатегорию</option>
                                                            @foreach(\App\SubCategory::all() as $subcategory)
                                                                <option
                                                                        {{ ($brand->sub_category_id == $subcategory->id ? 'selected = "selected' : '') }}
                                                                        value="{{$subcategory->id}}">{{$subcategory->sub_name}}</option>
                                                            @endforeach
                                                        </select>


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

                            @endforeach
                            </tbody>

                        </table>

                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col col-xs-4">
                            </div>
                            <div class="col col-xs-8 text-right">
                                {{ $allBrands->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--ADDING NEW Category MODAL --}}


    <div class="modal fade" id="addNewBrand" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Добавление нового бренда</h4>
                </div>
                <form enctype="multipart/form-data" method="POST" action="/admin/brands/add">
                    <div class="modal-body">
                        <div class="form-group">
                            {{csrf_field()}}

                            <label for="category_name_field">Название бренда:</label>
                            <input type="text" class="form-control" id="brand_name_field" name="brand_name_field" required>

                            <label for="category_name_field">Категория:</label>
                            <select class="form-control" id="category_id_field" name="category_id_field">
                                <option  disabled="disabled">Выберите категорию</option>
                                @foreach(\App\Category::all() as $category)
                                    <option value="{{$category->id}}">{{$category->category_title}}</option>
                                @endforeach
                            </select>
                            <label for="category_name_field">Субкатегория:</label>
                            <select class="form-control" id="category_id_field" name="sub_id_field">
                                <option  disabled="disabled">Выберите субкатегорию</option>
                                @foreach(\App\SubCategory::all() as $subcategory)
                                    <option value="{{$subcategory->id}}">{{$subcategory->sub_name}}</option>
                                @endforeach
                            </select>

                            <label for="category_name_field">Выберите изображение:</label>
                            <input type="file" accept='image/*' class="form-control" id="image_url_field" name="image_url_field">

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