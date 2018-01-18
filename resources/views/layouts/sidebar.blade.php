<!--закрывает col-sm-12 из blocks/head.html -->
<div class="menu">
    <div class="col-sm-3 sidebar" id="sidebar" role="menu">
        <div class="menu-h">Категории</div>
        <ul class="nav nav-pills nav-stacked">
    @foreach($categories = \App\Category::all() as $category)
            <li role="presentation"><a href="/category/{{$category['id']}}">{{$category['category_title']}}</a></li>
    @endforeach
        </ul>
    </div>
</div>