<!-- Planilla default header y css -->
@extends('layout.default')

<!-- Nombre del titulo de la pagina -->
<?php $title = 'Smart - Recuperar Password'; ?>

@section('content')

    <section id="loading">
        <div class="sk-circle">
          <div class="sk-circle1 sk-child"></div>
          <div class="sk-circle2 sk-child"></div>
          <div class="sk-circle3 sk-child"></div>
          <div class="sk-circle4 sk-child"></div>
          <div class="sk-circle5 sk-child"></div>
          <div class="sk-circle6 sk-child"></div>
          <div class="sk-circle7 sk-child"></div>
          <div class="sk-circle8 sk-child"></div>
          <div class="sk-circle9 sk-child"></div>
          <div class="sk-circle10 sk-child"></div>
          <div class="sk-circle11 sk-child"></div>
          <div class="sk-circle12 sk-child"></div>
        </div>
    </section>


    <section id="login" class="recuperar">
      <section class="top">
        <section>
          <p><i class="fa fa-globe" aria-hidden="true"></i> Argentina</p>
          <p><i class="fa fa-phone" aria-hidden="true"></i> 15 6883-0242</p>
        </section>
      </section>
      <section class="content">

        <section class="form">
            <img src="/img/logo.png" alt="" class="logo-header">
                <form id="formulario" method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}" >
                    @csrf
                    <label>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Tu Email">

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </label>

                    <div class="recuerdame">
                    </div>
                
                    <label>
                        <button type="submit" class="boton-redondeado-cf f2 fullwidth">
                            {{ __('Enviar password a mi email') }}
                        </button>
                    </label>
                </form>
        </section>  
      </section>        
    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
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

@endsection