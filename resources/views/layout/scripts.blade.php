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
	
	<!-- Efecto blur -->
	<script>

		$("#buscar-input").focus(function() {
			$('.blur').fadeIn('slow')
			$('.blur').show()
		})
		$("#buscar-input").focusout(function() {
			$('.blur').fadeOut(function() {
				$('.blur').css('display', 'none')
			})
		})
	</script>

	<!-- Btn filtros -->
	<script>
		$(".b-filtros").click(function() {
			if($("aside").css('display') == "block") {
				$(".b-filtros").css('color', 'black')
				$('aside').fadeOut(function() {
					$('aside').css('display', 'none')
				})	
			} else {
				$("aside").fadeIn("fast")
				$("aside").show()
				$(".b-filtros").css('color', '#0080c8')
			}
			
		})
	</script>

	<!-- Menu responsive -->
	<script>
		$(".boton-categorias-responsive").click(function() {
			if($(".categorias-ul-responsive").css('display') == 'block') {
				$(".categorias-ul-responsive").hide();	
			} else {
				$(".categorias-ul-responsive").show();
			}
		});
	</script>
	
	<!-- AJAX Notificaciones -->
	@if(Auth::check())
     <script>
     	window.addEventListener('load', notificaciones);
 
		function notificaciones(){
			reloj = setInterval(procesar, 5000);

			function procesar() {
			    var xhr = new XMLHttpRequest();
			 
			    xhr.open("GET","/notifications/get",true);
			    xhr.send();
			 	//xhr.responseText
			    xhr.onreadystatechange = function(){
			        if(xhr.readyState == 4 && xhr.status == 200) {
			            document.getElementById("numeroNotificaciones").innerHTML = xhr.responseText;
			        }
			    }
		    }
		}

     </script>
     @endif

    <!-- Actualizar usuarios footer -->
    <script>
		window.addEventListener('load', cantidadUsuarios);

		function cantidadUsuarios() {

			// lo ejecutamos por primera vez asi se actualiza apenas carga la web
			var xhr = new XMLHttpRequest();
			 
		    xhr.open("GET","/countusers",true);
		    xhr.send();
		 	//xhr.responseText
		    xhr.onreadystatechange = function(){
		        if(xhr.readyState == 4 && xhr.status == 200) {
		            
		            document.getElementById("usercount").innerHTML = xhr.responseText;
		            
		        }
		    }

			reloj = setInterval(procesar, 30000);

			function procesar() {
				var xhr = new XMLHttpRequest();
			 
			    xhr.open("GET","/countusers",true);
			    xhr.send();
			 	//xhr.responseText
			    xhr.onreadystatechange = function(){
			        if(xhr.readyState == 4 && xhr.status == 200) {
			            
			            document.getElementById("usercount").innerHTML = xhr.responseText;
			            
			        }
			    }
			}
		}
	</script>