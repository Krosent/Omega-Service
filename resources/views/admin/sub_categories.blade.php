@extends('admin.layouts.master')

@section('content')
    <link href="{{asset('a-panel/dist/css/categories.css')}}" rel="stylesheet">
    <div class="container">
        <br><br>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                @if(Illuminate\Support\Facades\Session::has('SubCategoryAdded'))
                    <div class="form-control alert alert-success alert-dismissible alert-login" style="padding-bottom: 38px;"
                         role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Успешно! </strong>{{Illuminate\Support\Facades\Session::get("SubCategoryAdded")}}
                    </div>
                @endif

                    @if(Illuminate\Support\Facades\Session::has('SubCategoryEdited'))
                        <div class="form-control alert alert-success alert-dismissible alert-login" style="padding-bottom: 38px;"
                             role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Успешно! </strong>{{Illuminate\Support\Facades\Session::get("SubCategoryEdited")}}
                        </div>
                    @endif

                    @if(Illuminate\Support\Facades\Session::has('SubCategoryDeleted'))
                        <div class="form-control alert alert-success alert-dismissible alert-login" style="padding-bottom: 38px;"
                             role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Успешно! </strong>{{Illuminate\Support\Facades\Session::get("SubCategoryDeleted")}}
                        </div>
                    @endif

                <div class="panel panel-default panel-table">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col col-xs-6">
                                <h3 class="panel-title">Под-категории</h3>
                            </div>
                            <div class="col col-xs-6 text-right">
                                <button type="button" class="btn btn-sm btn-primary btn-create"
                                        data-toggle="modal" data-target="#addNewSubCategory">Добавить</button>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-list">
                            <thead>
                            <tr>
                                <th><em class="fa fa-cog"></em></th>
                                <th class="hidden-xs text-center">Номер</th>
                                <th class="text-center">Название С. Категории</th>
                                <th class="text-center">Категория</th>
                                <th class="text-center">Превью-IMG</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($allSubCats as $subCategory)
                                <tr>
                                    <td align="center">
                                        <form method="POST" action="/admin/sub_categories/delete">
                                        <a type="button" data-toggle="modal" data-target="#editSubCategory{{$subCategory->id}}" class="btn btn-default">
                                            <em class="fa fa-pencil"></em></a>
                                            {{csrf_field()}}
                                            <input type="hidden" id="sub_id" name="sub_id" value="{{$subCategory->id}}">
                                            <button type="submit" class="btn btn-danger">
                                                <em class="fa fa-trash"></em>
                                            </button>
                                        </form>
                                    </td>
                                    <td class="hidden-xs text-center">{{$subCategory['id']}}</td>
                                    <td class="text-center">{{$subCategory['sub_name']}}</td>
                                    <td class="text-center">{{\App\Category::where('id', $subCategory['category_id'])
                                    ->first()
                                    ->category_title}}
                                    </td>
                                    <td class="text-center"><a href="{{url("/") . "/" . $subCategory['sub_cat_img']}}">
                                            {{$subCategory['sub_cat_img']}}</a></td>
                                </tr>

                                {{--EDITING CATEGORY MODAL --}}


                                <div class="modal fade" id="editSubCategory{{$subCategory->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Редактирование</h4>
                                            </div>
                                            <form method="POST" action="/admin/sub_categories/edit">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        {{csrf_field()}}
                                                        <input type="hidden" name="sub_id" value="{{$subCategory->id}}">
                                                        <label for="subcategory_name_field">Название саб-категории:</label>
                                                        <input type="text" class="form-control" id="" name="subcategory_name_field"
                                                        value="{{$subCategory->sub_name}}"
                                                        >
                                                        <label for="category_name_field">Категория:</label>
                                                        <select class="form-control" id="category_id_field" name="category_id_field">
                                                            @foreach(\App\Category::all() as $category)
                                                                <option value="{{$category->id}}"
                                                                    {{ ($category->id == $subCategory->category_id ? 'selected = "selected' : '') }}>
                                                                    {{$category->category_title}}
                                                                </option>
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
                                {{ $allSubCats->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--ADDING NEW Category MODAL --}}


    <div class="modal fade" id="addNewSubCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Добавление новой подкатегории</h4>
                </div>
                <form enctype="multipart/form-data" method="POST" action="/admin/sub_categories/add">
                    <div class="modal-body">
                        <div class="form-group">
                            {{csrf_field()}}
                            <label for="subcategory_name_field">Название саб-категории:</label>
                            <input type="text" class="form-control" id="" name="subcategory_name_field">
                            <label for="category_name_field">Категория:</label>
                            <select class="form-control" id="category_id_field" name="category_id_field">
                                @foreach(\App\Category::all() as $category)
                                <option value="{{$category->id}}">{{$category->category_title}}</option>
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