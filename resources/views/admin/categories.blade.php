@extends('admin.layouts.master')

@section('content')
    <link href="{{asset('a-panel/dist/css/categories.css')}}" rel="stylesheet">
    <div class="container">
        <br><br>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                {{--IF SUCCESS - SHOW MESSAGE--}}
                @if(Illuminate\Support\Facades\Session::has('CategoryAdded'))
                    <div class="form-control alert alert-success alert-dismissible alert-login" style="padding-bottom: 38px;"
                         role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Успешно! </strong>{{Illuminate\Support\Facades\Session::get("CategoryAdded")}}
                    </div>
                @endif

                @if(Illuminate\Support\Facades\Session::has('CategoryEdited'))
                    <div class="form-control alert alert-success alert-dismissible alert-login" style="padding-bottom: 38px;"
                         role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Успешно! </strong>{{Illuminate\Support\Facades\Session::get("CategoryEdited")}}
                    </div>
                @endif

                @if(Illuminate\Support\Facades\Session::has('CategoryDeleted'))
                    <div class="form-control alert alert-success alert-dismissible alert-login" style="padding-bottom: 38px;"
                         role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Успешно! </strong>{{Illuminate\Support\Facades\Session::get("CategoryDeleted")}}
                    </div>
                @endif

                {{--IF ERROR OCCURED - SHOW MESSAGE--}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="panel panel-default panel-table">

                    <div class="panel-heading">
                        <div class="row">
                            <div class="col col-xs-6">
                                <h3 class="panel-title">Категории</h3>
                            </div>
                            <div class="col col-xs-6 text-right">

                                <button type="button" name="addProductButton"
                                        class="btn btn-sm btn-primary btn-create"
                                        data-toggle="modal" data-target="#addNewCategory">Добавить</button>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-list">
                            <thead>
                            <tr>
                                <th><em class="fa fa-cog"></em></th>
                                <th class="hidden-xs text-center">Номер</th>
                                <th class="text-center">Заголовок</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($allCategories as $category)
                            <tr>
                                <td align="center">
                                    <form method="POST" action="/admin/categories/delete">
                                    <a type="button" data-toggle="modal" data-target="#editCategory{{$category->id}}" class="btn btn-default">
                                        <em class="fa fa-pencil"></em></a>
                                    {{--<a class="btn btn-danger">--}}
                                        {{--<em class="fa fa-trash"></em> </a>--}}

                                        {{csrf_field()}}
                                        <input type="hidden" id="cat_id" name="cat_id" value="{{$category->id}}">
                                        <button type="submit" class="btn btn-danger">
                                            <em class="fa fa-trash"></em>
                                        </button>
                                    </form>
                                </td>
                                <td class="hidden-xs text-center">{{$category['id']}}</td>
                                <td class="text-center">{{$category['category_title']}}</td>
                            </tr>

                            {{--DELETE Category --}}



                            {{--ENDING OF CAT DELETION --}}


                            {{--EDITING CATEGORY MODAL --}}


                            <div class="modal fade" id="editCategory{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Редактирование</h4>
                                        </div>
                                        <form method="POST" action="/admin/categories/edit">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    {{csrf_field()}}
                                                    <label for="category_name_field">Название категории:</label>
                                                    <input type="hidden" id="cat_id" name="cat_id" value="{{$category->id}}">
                                                    <input type="text" class="form-control" id="category_name_field" name="category_name_field"
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
                                {{ $allCategories->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{--ADDING NEW Category MODAL --}}


    <div class="modal fade" id="addNewCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Добавление новой категории</h4>
                </div>
                <form method="POST" action="/admin/categories/add">
                <div class="modal-body">
                    <div class="form-group">
                            {{csrf_field()}}
                        <label for="category_name_field">Название категории:</label>
                        <input type="text" class="form-control" id="category_name_field" name="category_name_field">

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