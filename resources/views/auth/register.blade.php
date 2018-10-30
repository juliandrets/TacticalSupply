@extends('layout.default')

<?php $title = 'Tactical Supply - Register'; ?>

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
   
    
    <section id="login" class="register">

        <section class="content">
            <section class="form">
                <img src="/img/logo.png" alt="" class="logo-header">          
                <form id="formulario" method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                 @csrf
                    <label>
                        <span>Nombre</span>
                        <span class="error" id="error_name"></span>
                        <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </label>
                    <label>
                        <span>Contraseña</span>
                        <span class="error" id="error_password"></span>
                        <input  id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    </label>
                    <label>
                        <span>Confirme su contraseña</span>
                        <span class="error" id="error_password_confirm"></span>
                        <input id="passwordconfirm" type="password" class="form-control" name="password_confirmation" required>
                        <input type="hidden" name="phone" value="">
                    </label>
                    <label>
                        <span>E-mail</span>
                        <span class="error" id="error_email"></span>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </label>

                    <div class="recuerdame"></div>
                    
                    <label>
                        <button type="submit" name="continuar">Crear cuenta</button>
                    </label>

                    <section class="registrarme">
                    <a href="/login">Ya tengo cuenta</a>
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


    <script>
        var form = document.getElementById("formulario");

        // spans de errores
        var error_name = document.getElementById('error_name');
        var error_password = document.getElementById('error_password');
        var error_password_confirm = document.getElementById('error_password_confirm');
        var error_email = document.getElementById('error_email');

        // steps
        var step1 = false;
        var step2 = false;
        var step3 = false;
        var step4 = false;

        // ON KEY UP
        form.elements.name.onkeyup = function(event) {
            // nombre
            if(form.elements.name.value.length < "3") {
                error_name.innerHTML = 'El nombre debe tener al menos 3 carácteres.';
            } else {
                error_name.innerHTML = '';
            }
        }
        form.elements.password.onkeyup = function(event) {
            // password
            if(form.elements.password.value.length < "6") {
                error_password.innerHTML = 'El password debe tener al menos 6 carácteres.';
            } else {
                 error_password.innerHTML = '';
            }
        }
        form.elements.passwordconfirm.onkeyup = function(event) {
            // password confirm
            if(form.elements.passwordconfirm.value != form.elements.password.value) {
                error_password_confirm.innerHTML = 'Las password deben coincidir';
            } else {
                 error_password_confirm.innerHTML = '';
            }
        }
        form.elements.email.onkeyup = function(event) {
            if(!validateEmail(form.elements.email.value)) {
                error_email.innerHTML = 'El email ingresado no es valido';
            } else {
                 error_email.innerHTML = '';
            }
        }

        // SUBMIT DEL FORMULARIO
        form.onsubmit = function(event) {
            event.preventDefault();

            // nombre
            if(form.elements.name.value.length < "3") {
                error_name.innerHTML = 'El nombre debe tener al menos 3 carácteres.';
            } else {
                 error_name.innerHTML = '';
                 step1 = true;
            }
            // password
            if(form.elements.password.value.length < "6") {
                error_password.innerHTML = 'El password debe tener al menos 6 carácteres.';
            } else {
                 error_password.innerHTML = '';
                 step2 = true;
            }
            // password confirm
            if(form.elements.passwordconfirm.value != form.elements.password.value) {
                error_password_confirm.innerHTML = 'Las password deben coincidir';
            } else {
                 error_password_confirm.innerHTML = '';
                 step3 = true;
            }

            if(!validateEmail(form.elements.email.value)) {
                error_email.innerHTML = 'El email ingresado no es valido';
            } else {
                 error_email.innerHTML = '';

                // ajax se fija si el mail esta en la bd
                 validarEmailBD(form.elements.email.value, function(hasError){             
                    if(hasError) {
                        step4 = false;
                        error_email.innerHTML = 'El email ya esta registrado';
                    }
                    else {
                        step4 = true;
                    }
                 })
            }
            if(step1 && step2 && step3 && step4)
                formulario.submit()
        }

        function validateEmail(email) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }

        function validarEmailBD(email, callback) {
            var xhr = new XMLHttpRequest();

            xhr.open("GET","/user/validate/validateemail",true);
            xhr.send();
            var boolean = false;

            xhr.onreadystatechange = () => {
                if(xhr.readyState == 4 && xhr.status == 200) {
                    var array = JSON.parse(xhr.responseText);

                    array.forEach((element) => {
                        if(element === email) {
                            console.log('email encontrado');
                            boolean = true;
                        }
                    });
                }
                callback(boolean)
            }
        }
    </script>
@endsection