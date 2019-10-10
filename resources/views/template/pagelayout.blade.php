<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('/libraries/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/template.css') }}">
    <link rel="stylesheet" href="{{ asset('/libraries/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('/libraries/sweetalert/dist/sweetalert.css') }}">
    <link rel="stylesheet" href="{{ asset('/libraries/fontawesome/css/all.css ') }}">
    <link rel="stylesheet" href="{{ asset('/libraries/fontawesome/css/fontawesome.css ') }}">
    <link rel="stylesheet" href="{{ asset('/libraries/aos/aos.css ') }}">

</head>
<body>
    <div class="header-area">
        <header class="uloh" style="color: black; text-decoration: none;">
            <a href="{{url('/')}}">
                <a class="navbar-brand" href="{{url('/')}}"> <img src="{{url('backgrounds/logo.jpeg')}}" style="width: 150px; height: 50px;" alt=""> </a>        
            </a>
        </header>
    </div>
    @yield('content')
    <script src="{{ url('/libraries/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ url('/libraries/sweetalert/sweetalert2.min.js') }}"></script>
    <script src="{{ url('/libraries/aos/aos.js') }}"></script>
    <script>
            AOS.init({
                duration: 1500,
                once: true
            });
          </script>
</body>
</html>