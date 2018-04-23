$(document).ready(function () {
	var informeA=document.getElementById('informeAnual');

		informeA.addEventListener('click',informeAnual,false);
	 	function informeAnual(){
			$('#menuContainer').load("../usuarios/informeAnual.html");

		   };  

		  
		      
	var registrar=document.getElementById('registrarDefensor');
			registrar.addEventListener('click',regDefensores,false);
			function regDefensores(){
				$('#menuContainer').load("../usuarios/registrar.html");
			};
			

	var informeM=document.getElementById('informeMensual');
		informeM.addEventListener('click', informeMensual, false);
		function informeMensual() {
				$('#menuContainer').load("../../vistas/coordinador/informeMensual.html");
		};

	var informeE=document.getElementById('informeEspecifico');
		informeE.addEventListener('click', informeEspecifico, false);
		function informeEspecifico() {
				$('#menuContainer').load("../../vistas/coordinador/informeEspecifico.html");
		};

	var tarjetaI=document.getElementById('tarjetaInformativa');
		tarjetaI.addEventListener('click', tarjetaInformativa, false);
		function tarjetaInformativa() {
			$('#menuContainer').load("../../vistas/coordinador/tarjetaInformativa.html");
		};
		
	var listarDef=document.getElementById('listarDefensores');
		listarDef.addEventListener('click', listaDefensores, false);
		function listaDefensores() {
			$('#menuContainer').load("../../vistas/coordinador/listarDefensores.php");
		//window.location="../../controlador/defensor/controladorListaDef.php"
	};

	var listarAudiencia=document.getElementById('listarAudiencias');
	listarAudiencia.addEventListener('click', listarAudiencias, false);
	function listarAudiencias() {
		$('#menuContainer').load("../../vistas/coordinador/listarAudiencias.php");
		//window.location="../../controlador/defensor/controladorListaDef.php"
	};

	var listarVisitas=document.getElementById('listarVisitas');
	listarVisitas.addEventListener('click', listarVisitas, false);
	function listarVisitas() {
		$('#menuContainer').load("../../vistas/coordinador/listarAudiencias.php");
		//window.location="../../controlador/defensor/controladorListaDef.php"
	};

	var registrar = document.getElementById('registrarDefensores');
	registrar.addEventListener('click', regDefensores, false);
	function regDefensores() {
		//alert('sfafa');
		$('#menuContainer').load("../../vistas/usuarios/registrar.html");
	};





	// Datepicker Popups calender to Choose date.
	/*$(function() {
		$("#datepicker").datepicker();
		// Pass the user selected date format.
		$("#format").change(function() {
			$("#datepicker").datepicker("option", "dateFormat", $(this).val());
		});
	});*/


	
/* 

				//window.location="../../controlador/defensor/controladorListaDef.php"

	console.log("fsdfsd");
			/*	$.ajax({
				//	 include '../../controlador/defensor/controladorListaDef.php';
					url: "../../controlador/defensor/controladorListaDef.php",
					type: "GET",
					data: "",
					
					success: function(data) {
						console.log("FDF",data);
		//				$('#mensaje_index').html(data);
		//				$('body').removeClass('loading');
					},
 
  
    error : function(xhr, status) {
		console.log("FDssF",xhr);
		console.log("FDsF",status);
        alert('Disculpe, existió un problema');
    },
 
				});*/

			
	
			// Datepicker Popups calender to Choose date.
			/*$(function() {
				$("#datepicker").datepicker();
				// Pass the user selected date format.
				$("#format").change(function() {
					$("#datepicker").datepicker("option", "dateFormat", $(this).val());
				});
			});*/

		/*	var asignar=document.getElementById('asignarDefensor');
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
				}*/

	
/* 	var infor=document.getElementById('informacionDefensor');
			infor.addEventListener('click',infoDefensores,false);
			function infoDefensores(){
			 $('#menuContainer').load("../../vistas/coordinador/verInfoDefensor.php");
			}; */
});

