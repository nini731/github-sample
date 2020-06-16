<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo List | @yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{asset('bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('fa/css/all.css')}}" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-10 offset-1">
                @include('Templates.navbar')
                @yield('content')
            </div>
        </div>
    </div>
</body>

<!-- Javascript -->
<script src="{{URL::to('bootstrap/jquery.js')}}"></script>
<script src="{{URL::to('bootstrap/js/bootstrap.bundle.js')}}"></script>
<script src="{{URL::to('bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{URL::to('fa/js/all.js')}}"></script>
<script>
    $(function () {
        $(".alert").fadeOut(3000,function () {
            <?php
                Session::forget("info")
            ?>
        });
    })
</script>
</html>
