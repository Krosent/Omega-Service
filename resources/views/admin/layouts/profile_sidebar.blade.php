<!---------------
-----NAV BAR-----
---------------->

<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index.html">Omega Service</a>
</div>
<!-- /.navbar-header -->

<ul class="nav navbar-top-links navbar-right">

    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-user">
            <li class="text-center"><a>
                    <i class="fa fa-user fa-fw" style="color: rgb(66,122,178)"></i> {{Auth::user()->name}}</a>
            </li>
            <li class="divider"></li>
            <li class="text-center"><a href="../admin/logout">
                    <i style="color:rgb(168, 11, 11);" class="fa fa-sign-out fa-fw"></i> Выйти</a>
            </li>
        </ul>
        <!-- /.dropdown-user -->
    </li>
    <!-- /.dropdown -->
</ul>
<!-- /.navbar-top-links -->