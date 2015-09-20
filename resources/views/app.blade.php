<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">


        <link rel="stylesheet" href="{{ asset('style/style.css') }}">

    </head>
    <body class=@yield('class')>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        @include('layout.nav')

        @yield('content')

        <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>
        @yield('js')
    </body>
</html>
