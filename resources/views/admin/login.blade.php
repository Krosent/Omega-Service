<html>
<head>
    <title>Omega-S - Админ авторизация</title>
    <link href="{{asset('css/admin.css')}}" rel="stylesheet">
    <link href="{{asset('fonts/fa-fonts/css/font-awesome.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>


<div class="login">
    <div class="login-triangle"></div>
    <h2 class="login-header"><span style="font-size: 26px;" class="fa fa-sign-in"></span>  Админ Панель</h2>

    <form class="login-container" method="POST" action="/admin/login">
        {{csrf_field()}}

        @if(count($errors))
            <div class="form-control alert alert-danger alert-dismissible alert-login" style="padding-bottom: 38px;"
                 role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Внимание! </strong>{{$errors->first()}}
            </div>
        @endif

        <p><input name="name" type="name" placeholder='Имя пользователя' required
                  oninvalid="this.setCustomValidity('Введите имя пользователя')"
                  onchange="this.setCustomValidity('')"></p>
        <p><input name="password" type="password" placeholder="Пароль" required
                  oninvalid="this.setCustomValidity('Введите пароль')"
                  onchange="this.setCustomValidity('')"></p>
        <p><button class="btn btn-primary btn-block submitBlock" name="submit" style="font-size: 20px;">
                <i class="fa fa-user-circle-o" aria-hidden="true">
                </i>  Перейти</button></p>
    </form>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
    window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')
</script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/theme.js')}}"></script>
</body>
</html>