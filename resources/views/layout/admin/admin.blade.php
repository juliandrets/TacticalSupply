<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>TacticalSupply Admin Panel</title>
        <meta name="description" content="Sufee Admin - HTML5 Admin Template">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-icon.png">
        <link rel="shortcut icon" href="favicon.ico">

        <link rel="stylesheet" href="{{ asset('admin/css/normalize.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/css/flag-icon.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/css/cs-skin-elastic.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/scss/style.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/css/lib/vector-map/jqvmap.min.css') }}">

        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <!-- Contenido de la pagina -->
        @yield('content')

        <script src="https://code.jquery.com/jquery-3.3.1.min.js"
          integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
          crossorigin="anonymous"></script>
          
          <!-- Loading -->
        <script type='text/javascript'>
          window.onload = detectarCarga;
          function detectarCarga(){
          $(document).ready(function(){
           $(document).ready(function () {
           $('#loading').fadeOut(800);
           });
          });
          }
        </script>
    </body>
</html>
