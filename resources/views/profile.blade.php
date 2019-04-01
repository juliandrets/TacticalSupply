<!-- Planilla default header y css -->
@extends('layout.default')

<!-- Nombre del titulo de la pagina -->
<?php $title = 'Perfil - Tactical Supply'; ?>

@section('content')

    <!-- Header -->
    @include('layout.header-default')


    <section id="profile">
        <aside>
            <ul class="options">
                <h2>Opciones</h2>
                <div>
                    <li><a href="">Mis datos</a></li>
                    <li><a href="/cart">Mi carrito</a></li>
                    <li><a href="/wishes">Lista de deseos</a></li>
                    <li><a href="/notifications">Notificaciones</a></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i> Desconectarme</a></li>
                </div>
            </ul>
        </aside>
        <section class="container">

            <section id="publicity">
                <article>
                    <h2>Generamos confianza</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur at quidem voluptas amet. Ea quis magni distinctio dignissimos nostrum amet illum necessitatibus nemo libero sapiente quo, eveniet! Ab, libero aperiam. <br><br> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio sunt ullam fuga vitae laudantium quia voluptate consectetur illum eos facere voluptatibus a, ad, enim mollitia dolores, fugit accusamus! Totam, distinctio.</p>
                    <div class="boton-redondeado r1">Leer más <i class="fa fa-angle-right" aria-hidden="true"></i></div>
                </article>
            </section>

            <h3 class="title-profile">Perfil</h3>
            
            <section id="profile-data">
                <figure>
                    <img src="/uploads/avatars/{{Auth::user()->avatar}}" alt="">

                </figure>

                
                <section>
                    <h2>Mis datos</h2>
                    <ul>
                        @if($editMode)
                            <form action="/profile/update" method="POST" class="edit" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <li><span>Avatar: </span> <input type="file" name="picture"></li>
                                <li><span>Nombre: </span> <input type="text" name="name" value="{{Auth::user()->name}}" required=""></li>
                                <li><span>Email: </span> {{Auth::user()->email}}</li>
                                <li><span>Teléfono: </span> <input type="phone" name="phone" value="{{Auth::user()->phone}}"></li>
                                <li><span>Contraseña: </span> </li>
                                <li><span>Confirmar Contraseña: </span> </li>
                                <input type="hidden" id="{{Auth::user()->id}}">
                                <button class="boton-redondeado r1">Confirmar Datos</button>
                            </form>
                        @else
                            <li><span>Nombre: </span> {{Auth::user()->name}}</li>
                            <li><span>Email: </span> {{Auth::user()->email}}</li>
                            <li><span>Teléfono: </span> {{Auth::user()->phone}}</li>
                            <li><span>Contraseña: </span> *********</li>

                            <form action="/profile/edit" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" id="{{Auth::user()->id}}">
                                <button class="boton-redondeado r1">Modificar Mis datos</button>
                            </form>
                        @endif
                    </ul>
                </section>

               
            </section>
            
        </section>
    </section>

    <!-- Incluyo el footer y los script -->
    @include('layout.footer')
    @include('layout.scripts')

@endsection