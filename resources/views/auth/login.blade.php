@extends('layout.default')

<?php $title = 'TacticalSupply - Login'; ?>

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

    <section id="login">

      <section class="content">
        <section class="form">
            <img src="/img/logo.png" alt="" class="logo-header">
            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                 @csrf
                <div class="usuario">
                    <label>
                        <span>Email</span>
                        <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </label>
                </div>
                <div class="contraseña">
                    <label>
                        <span>Contraseña</span>
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </label>
                </div>
                <div class="recuerdame">
                    <label>
                        <input type="checkbox" name="remember" {{ old('Recordado') ? 'checked' : '' }}> <span>Mantenerme conectado</span>
                    </label>
                </div>

                <label>
                  <button type="submit" name="ingresar">Ingresar</button>
                </label>

                <section class="registrarme">
                    <a href="/register">Crear una cuenta</a> &nbsp - &nbsp
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                </section>
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
