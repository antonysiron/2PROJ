<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html lang="en">
<head>
    <title>@yield('Big Brother')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon-->
    <link rel="icon" href="/images/favicon.ico">

    <!-- Fonts -->
    <!--<link rel="dns-prefetch" href="//fonts.gstatic.com">-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Google API -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>


    <div id="app">
        @include('shared/header')
        <main class="container">
            @if (Session::has('msg'))
                @if(stripos(Session::get('msg'), 'error'))
                    <div class="alert alert-danger">
                        {!! Session::get('msg') !!}
                    </div>
                @else
                    <div class="alert alert-success">
                        {!! Session::get('msg') !!}
                    </div>
                @endif
            @endif


        </main>
        <div style="position:absolute;">
            @yield('path')
        </div>
        @yield('content')
    </div>
    @include('shared/footer')
</body>
</html>
