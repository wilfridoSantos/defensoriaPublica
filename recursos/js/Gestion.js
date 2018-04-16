 $(document).ready(function () {
	var informeA=document.getElementById('informeAnual');
		informeA.addEventListener('click',informeAnual,false);
	 	function informeAnual(){
			$('#menuContainer').load("../usuarios/informeAnual.html");
		   };
//========================================================================		   
	var registrar=document.getElementById('registrarDefensor');
			registrar.addEventListener('click',regDefensores,false);
			function regDefensores(){
				$('#menuContainer').load("../usuarios/registrar.html");
			};

	var listar=document.getElementById('listarDefensores');
			listar.addEventListener('click',listDefensores,false);
			function listDefensores(){
			  $('#menuContainer').load("../../vistas/coordinador/listarDefensores.php");
				//window.location="../../controlador/defensor/controladorListaDef.php"

				// $.ajax({
				// 	url: "../../controlador/defensor/controladorlistaDef.php?",
				// 	type: "post",
				// 	data: "usuario_txt=" + usuario.value + "&password_txt=" + password.value,
				// 	beforeSend: function() {
				// 		$('body').addClass('loading');
				// 	},
				// 	success: function(data) {
		
				// 		$('#mensaje_index').html(data);
				// 		$('body').removeClass('loading');
				// 	}
				// });
			};
	
			// Datepicker Popups calender to Choose date.
			/*$(function() {
				$("#datepicker").datepicker();
				// Pass the user selected date format.
				$("#format").change(function() {
					$("#datepicker").datepicker("option", "dateFormat", $(this).val());
				});
			});*/

			var asignar=document.getElementById('asignarDefensor');
			asignar.addEventListener('click',asinar,false);
		function asinar(){
				$('#menuContainer').load("/asignardefensor");
			}
			 
		var registrar=document.getElementById('registrar');
			 registrar.addEventListener('click',registrarUsuario,false);
		function registrarUsuario(){
					$('#menuContainer').load("usuarios/registrar.html");
				}
		var buscar=document.getElementById('buscar');
			   buscar.addEventListener('click',buscarUsuario,false);
		function buscarUsuario(){
				$('#menuContainer').load("usuarios/buscar.html");
				}
});

