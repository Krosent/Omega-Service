<div class="menu_header">
    <ul id="w1" class="nav navbar-nav">
        <li class="dropdown"><a class="dropdown-toggle" href="#">Розничным покупателям <b class="caret"></b></a>
            <ul id="w3" class="dropdown-menu">
                <li><a href="#" tabindex="-1">Горячая линия</a></li>
                <li><a href="#" tabindex="-1">Как сделать заказ</a></li>
                <li><a href="#" tabindex="-1">Доставка и оплата</a></li>
                <li><a href="#" tabindex="-1">Покупка в кредит</a></li>
                <li><a href="#" tabindex="-1">Гарантия</a></li>
                <li><a href="#" tabindex="-1">Правила обмена и возврата</a></li>
                <li><a href="#" tabindex="-1">Сервис-центры</a></li>
                <li><a href="#" tabindex="-1">Для юридических лиц</a></li>
                <li><a href="#" tabindex="-1">Пользовательское соглашение</a></li>
            </ul>
        </li>
        <li class="dropdown"><a class="dropdown-toggle" href="#">Оптовым покупателям<b class="caret"></b></a>
            <ul id="w4" class="dropdown-menu">
                <li><a href="#" tabindex="-1">Акции и скидки</a></li>
                <li><a href="#" tabindex="-1">Распродажа</a></li>
                <li><a href="#" tabindex="-1">Дисконтная программа</a></li>
                <li><a href="#" tabindex="-1">Подарочные карты</a></li>
            </ul>
        </li>
        <li class="dropdown"><a class="dropdown-toggle" href="#">Сотрудничество <b class="caret"></b></a>
            <ul id="w5" class="dropdown-menu">
                <li><a href="#" tabindex="-1">Дилерам</a></li>
                <li><a href="#" tabindex="-1">Арендодателям</a></li>
            </ul>
        </li>
        <li><a href="#">Новости</a></li>
        <li class="navbar-fa-map-marker"><a href="#">Портфолио</a></li>
        <li class="navbar-fa-discount"><a href="#">О нас</a></li>
        <li class="navbar-fa-discount"><a href="#">Контакты</a></li>
    </ul>
</div>


<div class="col-sm-12">
        <div class="col-sm-8 vcenter">
            <h2><img src="{{asset('img/slogan.png')}}"> Omega Service</h2>
        </div><!--	Vertical Alignment; don't add any spaces or lines
--><div class="col-sm-4 vcenter">
        <form method="GET" action="/search">
            {{csrf_field()}}
            <div class="search-group input-group">
                <input type="text" name="search_field" class="form-control" placeholder="Поиск..." required
                       oninvalid="this.setCustomValidity('Поле поиска не заполнено')"
                       onchange="this.setCustomValidity('')">
                <span class="input-group-btn">
				        <button class="form-control btn btn-default" name="search_btn" type="submit"><span
                                    id="searchButton" class="glyphicon glyphicon-search"></span></button>
			        </span>

            </div>
        </form>
    </div>


    {{---------------------Breadcrumb block starts here--}}

    {!! Breadcrumbs::render() !!}

    {{--Ends Here--}}


    <hr>
</div>