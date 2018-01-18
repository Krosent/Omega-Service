@extends('layouts.master')
@section('title')
    Главная
@endsection

@section('content')
    <br><br>
    <div class="col-sm-9 col-md-9">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active"><img src="{{asset('img/carousel/se.jpg')}}">
                    <div class="carousel-caption">
                        <p> Компания "Omega Service" предоставляет широкий спектр профессионального звукового
                            оборудования для самых различных
                            целей. </p>
                    </div>
                </div>
                <!-- End Item -->
                <div class="item"><img src="{{asset('img/carousel/le.jpg')}}">
                    <div class="carousel-caption">
                        <p> Компания Omega Service предлагает полный спектр услуг по оснащению объектов и помещений
                            любой сложности звуковым оборудованием
                            для систем звуковой трансляции, речевого оповещения, оборудования для воспроизведения
                            «живого» звука, вокала и музыки
                            при зрелищных и развлекательных мероприятиях. </p>
                    </div>
                </div>
                <!-- End Item -->
                <div class="item"><img src="{{asset('img/carousel/ca.jpg')}}">
                    <div class="carousel-caption">
                        <p> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                            invidunt ut labore et dolore
                            magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing
                            elitr. </p>
                    </div>
                </div>
                <!-- End Item -->
            </div>
            <!-- End Carousel Inner -->
            <ul class="nav nav-pills nav-justified">
                <li data-target="#myCarousel" data-slide-to="0" class="active"><a href="#">Звуковое
                        <small>оборудование</small>
                    </a></li>
                <li data-target="#myCarousel" data-slide-to="1"><a href="#">Световое
                        <small>оборудование</small>
                    </a></li>
                <li data-target="#myCarousel" data-slide-to="2"><a href="#">IP
                        <small>камеры</small>
                    </a></li>
            </ul>
        </div>
        <div class="desc">
            <p> Компания "Omega Service" представляет широкий спектр профессионального звукового и светового
                оборудования. Компания производит
                монтаж и оснащение клубов, дискотек, концертных залов, музыкальных студий профессиональным звуком и
                светом. Поставляет
                звуковое и световое оборудование на заказ.
            <p>
                <div class="container-fluid">
                    <h1 class="text-center">Преимущества сотрудничества с Omega Service:</h1>

                    <hr>
                    <div class="row text-center">
                        <div class="col-lg-4"><img src="{{asset('img/rel.png')}}">
                            <h3>Надежность</h3>
            <p>Подтверждением этому является более чем 150 летний опыт работы в области светового и звукового
                оборудования.</p>
        </div>
        <div class="col-lg-4"><img src="{{asset('img/eff.png')}}">
            <h3>Оперативность</h3>
            <p> Благодаря большому опыту и использованию новых технологий компания работает как слаженный часовой
                механизм.</p>
        </div>
        <div class="col-lg-4"><img src="{{asset('img/pig.png')}}">
            <h3>Экономия</h3>
            <p>Наши цены существенно ниже, чем у многих других компаний при высоком уровене обслуживания.</p>
        </div>
    </div>

    {{--Google Maps geolocation of the office--}}
    <h1 class="text-center">Месторасположение офиса:</h1>
    <hr>
    <div id="map"></div>
    <script>
        function initMap() {
            var uluru = {lat: 40.427047, lng: 49.956070};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 4,
                center: uluru
            });
            var marker = new google.maps.Marker({
                position: uluru,
                map: map
            });
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCijqEFptfHOAaXK50vNJJ4h6_m8Y4y2ho&callback=initMap">
    </script>
    {{--// Maps--}}


    </div>

@endsection