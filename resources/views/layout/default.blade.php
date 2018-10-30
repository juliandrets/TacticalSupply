<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="favicon.ico" />

        <link rel="stylesheet" href="http://meyerweb.com/eric/tools/css/reset/reset.css">
        <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
        <link rel="stylesheet" href="https://novativex.com/proyectos/smart/css/smart.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('plugins/slick/slick.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('plugins/slick/slick-theme.css') }}"/>
        
        <title>{{ $title }}</title>

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    </head>
    <body>
        @yield('content')
    </body>
</html>
