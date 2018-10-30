<!-- Planilla default header y css -->
@extends('layout.default')

<!-- Nombre del titulo de la pagina -->
<?php $title = 'Smart - FAQs'; ?>

@section('content')

    <!-- Header -->
    @include('layout.header-default')
    
    <section id="contenedor_index">
        <div class="titulo_general">
            <h1>PREGUNTAS FRECUENTES</h1>
        </div>
        <div class="preguntas_general">
            <div class="fila">
                <div class="tema">
                    <h2>MI CUENTA</h2>
                </div>
                <div class="lista_preguntas">
                    <ul class="preguntas">
                        <li class = "pregunta">
                            <i class="fa fa-angle-right" aria-hidden="true"></i> <strong>¿Cómo me registro en SMART?</strong>
                            <p class = "respuesta">Podés hacerlo en unos pocos y simples pasos. Solamente tenés que hacer click en Registrarme. Allí deberás completar los campos con tu nombre, apellido, mail y una contraseña. Luego hacés click en Continuar y recibirás  un correo de verificación. Hacé click en el link que está en el cuerpo del correo y ¡listo!. Ya podés comprar lo que quieras en SMART.</p>
                        </li>
                        <li class = "pregunta">
                            <i class="fa fa-angle-right" aria-hidden="true"></i> <strong>¿Qué pasa si olvido mi contraseña?</strong>
                            <p class = "respuesta">No te preocupes, podés recuperarla fácilmente. entrá a www.smart.com y hacé click en Olvidé mi contraseña. Aparecerá un campo para que escribas el mail con el que te registraste a SMART. Escribilo, hacé click en Enviar e inmediatamente recibirás un correo en tu mail para recuperar tu contraseña. Hacé click en el link del cuerpo del correo, y vas a poder generar una nueva contraseña.</p>
                        </li>
                        <li class = "pregunta">
                            <i class="fa fa-angle-right" aria-hidden="true"></i> <strong>¿Cómo cancelo mi cuenta?</strong>
                            <p class = "respuesta">Vamos a tratar de convencerte con todo lo que podamos para que no nos abandones. Pero, si realmente querés cerrar tu cuenta, podés hacerlo rápidamente ingresando a tu perfil. Hacé click en Configuración y luego en Cancelar Cuenta. Te solicitaremos algunos datos de seguridad para asegurarnos que realmente seas vos quien está operando con la cuenta. Luego das click en Cancelar Definitivamente, y listo.</p>
                        </li>
                    </ul>
            </div>
        </div>
        <div class="fila">
            <div class="tema">
                <h2>COMPRAS</h2>
            </div>
            <div class="lista_preguntas">
                <ul class="preguntas">
                    <li class = "pregunta">
                        <i class="fa fa-angle-right" aria-hidden="true"></i> <strong>¿Cómo configuro mi tarjeta de crédito?</strong>
                        <p class = "respuesta">Ingresá a tu perfil. Hacé click en Configuración y luego en Métodos de Pago. Se abrirá una nueva página, donde podés ingresar los datos de tu tarjeta de crédito. Una vez rellenados los campos, hacé click en Confirmar. ¡Listo! ya podés comprar en SMART.</p>
                    </li>
                    <li class = "pregunta">
                        <i class="fa fa-angle-right" aria-hidden="true"></i> <strong>¿Los productos tienen garantía?</strong>
                        <p class = "respuesta">Por supuesto. Solamente trabajamos con marcas líderes. Cualquier producto que compres en SMART tiene una garantía de 12 meses, con posibilidad de extenderla hasta 24.</p>
                    </li>
                    <li class = "pregunta">
                        <i class="fa fa-angle-right" aria-hidden="true"></i> <strong>¿Puedo pedir un reembolso?</strong>
                        <p class = "respuesta">Sí, podés pedir un reembolso de tu producto dentro de los primeros 15 días, si no es lo que esperabas. Una vez solicitado y chequeado el estado del producto, te acreditaremos tu dinero en 72hs hábiles.</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="fila">
            <div class="tema">
                <h2>ENVÍOS</h2>
            </div>
            <div class="lista_preguntas">
                <ul class="preguntas">
                    <li class = "pregunta">
                        <i class="fa fa-angle-right" aria-hidden="true"></i> <strong>¿Puedo recibir mi compra en mi domicilio?</strong>
                        <p class = "respuesta">Sí, en SMART trabajamos con un sistema de envíos propio. Una vez confirmada la compra, recibís el producto en un máximo de 24 horas en tu casa. Para más comodidad, podés especificar el rango horario en el que te gustaría recibirlo. Los precios del envío varían según la distancia.</p>
                    </li>
                    <li class = "pregunta">
                        <i class="fa fa-angle-right" aria-hidden="true"></i> <strong>¿Puedo retirar mi compra en algún local?</strong>
                        <p class = "respuesta">Sí, en el caso de que quieras retirar tu compra personalmente, podés acercarte a Monroe 860, Ciudad Autónoma de Buenos Aires, en nuestro horario de atención, de 9.00 a 18.00hs.</p>
                    </li>
                </ul>
            </div>
        </div>
        </div>
        <div class="consultas_general">
            <div class="otras_consultas">
                <div class="texto_consulta">
                    ¿NO ENCONTRÁS LO QUE ESTÁS BUSCANDO?
                </div>
                <div class="boton-redondeado r2">
                    <p>ENVIÁ TU CONSULTA ACÁ</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Incluyo el footer y los script -->
    @include('layout.footer')
    @include('layout.scripts')

@endsection