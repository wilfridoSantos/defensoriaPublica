$(document).ready(function () {
	var informeA=document.getElementById('informeAnual');
<<<<<<< HEAD
		informeA.addEventListener('click', informeAnual, false);
		function informeAnual() {
			$('#menuContainer').load("informeAnual.html");
		};
=======

		informeA.addEventListener('click',informeAnual,false);
	 	function informeAnual(){
			$('#menuContainer').load("../usuarios/informeAnual.html");

		   };  

		  
		      
	var registrar=document.getElementById('registrarDefensor');
			registrar.addEventListener('click',regDefensores,false);
			function regDefensores(){
				$('#menuContainers').load("../usuarios/registrar.php");
			};
			
>>>>>>> d55496c7b02273a1062ae91570565258b8fb4836

	var informeM=document.getElementById('informeMensual');
		informeM.addEventListener('click', informeMensual, false);
		function informeMensual() {
				$('#menuContainer').load("informeMensual.html");
		};

	var informeE=document.getElementById('informeEspecifico');
		informeE.addEventListener('click', informeEspecifico, false);
		function informeEspecifico() {
				$('#menuContainer').load("informeEspecifico.html");
		};

	var tarjetaI=document.getElementById('tarjetaInformativa');
		tarjetaI.addEventListener('click', tarjetaInformativa, false);
		function tarjetaInformativa() {
			$('#menuContainer').load("tarjetaInformativa.html");
		};
		
	var listarDef=document.getElementById('listarDefensores');
		listarDef.addEventListener('click', listaDefensores, false);
		function listaDefensores() {
			//console.log("ACCESO A FUNCION listaDefensor ahdka");
			$('#menuContainer').load("listarDefensores.php");
		//window.location="../../controlador/defensor/controladorListaDef.php"
	};

	var listarAudiencia=document.getElementById('listarAudiencias');
	listarAudiencia.addEventListener('click', listarAudiencias, false);
	function listarAudiencias() {
		$('#menuContainer').load("listarAudiencias.php");
		//window.location="../../controlador/defensor/controladorListaDef.php"
	};
	var listarVisitas=document.getElementById('listarVisitas');
	listarVisitas.addEventListener('click', listarVisitas, false);
	function listarVisitas() {
		$('#menuContainer').load("listarVisitas.php");
		//window.location="../../controlador/defensor/controladorListaDef.php"
	};
<<<<<<< HEAD
=======

	var registrar = document.getElementById('registrarDefensores');
	registrar.addEventListener('click', regDefensores, false);
	function regDefensores() {
		//alert('sfafa');
		$('#menuContainer').load("../usuarios/registrar.html");
	};
<<<<<<< HEAD
=======





	// Datepicker Popups calender to Choose date.
	/*$(function() {
		$("#datepicker").datepicker();
		// Pass the user selected date format.
		$("#format").change(function() {
			$("#datepicker").datepicker("option", "dateFormat", $(this).val());
		});
	});*/


>>>>>>> 1068426b574148a9d1fc3b3d5e675e20a5ac9ef2
	

	

			
	
			

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
>>>>>>> d55496c7b02273a1062ae91570565258b8fb4836
});

