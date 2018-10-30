<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="http://meyerweb.com/eric/tools/css/reset/reset.css">
        <link rel="stylesheet" href="{{ asset('/') }}css/admin.css">
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,300i,400,400i,700,700i,900" rel="stylesheet">
        <link rel="stylesheet" href="https://novativex.com/proyectos/smart/css/smart.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" /> 
        
        <title>{{ $title }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

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
