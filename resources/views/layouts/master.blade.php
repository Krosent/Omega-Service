<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Omega-S - @yield('title')</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap-theme.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/ie10-viewport-bug-workaround.css')}}" rel="stylesheet">
    <link href="{{asset('css/theme.css')}}" rel="stylesheet">
    <link href="{{asset('fonts/fa-fonts/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:300&amp;subset=cyrillic" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow&amp;subset=cyrillic" rel="stylesheet">
</head>

<body>
    <div class="container" id="main">
        @include('layouts.header')
        @include('layouts.sidebar')
        @yield('content')
    </div>



    @include('layouts.footer')
</body>
</html>