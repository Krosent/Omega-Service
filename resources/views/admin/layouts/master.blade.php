<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="windows-1251">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Omega Service | Admin Panel</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('a-panel/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="{{asset('a-panel/vendor/metisMenu/metisMenu.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('a-panel/dist/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="{{asset('a-panel/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        @include('admin.layouts.navbar')
        @include('admin.layouts.profile_sidebar')
        </nav>
    <!-- / Navigation -->

    <div id="page-wrapper">
       @yield('content')
    </div>
    <!-- /.col-lg-4 -->
</div>
<!-- /.row -->
</div>
<!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<!-- jQuery -->
<script src="{{asset('a-panel/vendor/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{asset('a-panel/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- Custom Theme JavaScript -->
<script src="{{asset('a-panel/dist/js/sb-admin-2.js')}}"></script>
<script src="{{asset('a-panel/dist/js/admin-custom.js')}}"></script>
</body>

</html>