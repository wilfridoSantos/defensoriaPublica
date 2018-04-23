$(document).ready(function () {
	var informeA=document.getElementById('informeAnual');
		informeA.addEventListener('click', informeAnual, false);
		function informeAnual() {
			$('#menuContainer').load("../../vistas/coordinador/informeAnual.html");
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
			console.log("ACCESO A FUNCION listaDefensor");
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

	var listar=document.getElementById('listarDefensores');
			listar.addEventListener('click',listDefensores,false);
			function listDefensores(){
			 $('#menuContainer').load("../../vistas/coordinador/listarDefensores.php");
			}; */
/* 	var infor=document.getElementById('informacionDefensor');
			infor.addEventListener('click',infoDefensores,false);
			function infoDefensores(){
			 $('#menuContainer').load("../../vistas/coordinador/verInfoDefensor.php");
			}; */

});

