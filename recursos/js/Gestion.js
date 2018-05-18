$(document).ready(function () {
	$("input[name=radioInforme]").click(function () {
		console.log('hola');
		$("#infoPersonal").empty();
		
	});
	$("input[name=radioPersonal]").click(function () {
		console.log('adios');
		$("#infoPersonal").empty();
		$("#infoPersonal").append(
			'<div class="form-group ">'+
			'<label class="control-label col-md-3 col-sm-3 col-xs-4">Puesto<span class="required">*</span></label>' +
			'<div class="col-md-6 col-sm-6 col-xs-4 form-group has-feedback">' +
			'<select name="puesto" id="puesto"  required class="select2_group form-control">'+
				 '<option value="">- Seleccione -</option> '+
				 '<option value="4">defensor</option> '+
				 '<option value="2">coordinador</option> '+  
			  '</select>'+
			'</div>'+
		 ' </div>'
		);
		$("#infoPersonal").append(
			'<div class="form-group ">'+
			'<label class="control-label col-md-3 col-sm-3 col-xs-4">Nue<span class="required">*</span></label>' +
			'<div class="col-md-6 col-sm-6 col-xs-4 form-group has-feedback">' +
		   '<input type="text" title"solo se acepta cinco digitos" required pattern="[1-9]+([0-9]{4})" maxlength="5" class="form-control" id="nue" placeholder="Nue" name="nue">' +

			'</div>'+
		 ' </div>'
		);
	});
	var informeA=document.getElementById('informeAnual');
		informeA.addEventListener('click', informeAnual, false);
		function informeAnual() {
			$('#menuContainer').load("informeAnual.html");
		};		  
		      
	var registrar=document.getElementById('registrarDefensor');
			registrar.addEventListener('click',regDefensores,false);
			function regDefensores(){
				$('#menuContainer').load("../usuarios/registrar.php");
			};
			

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

	var informeAct=document.getElementById('informeActividades');
		informeAct.addEventListener('click', informeActividades, false);
		function informeActividades() {
				$('#menuContainer').load("informeActividades.php");
		};
	var tarjetaI=document.getElementById('tarjetaInformativa');
		tarjetaI.addEventListener('click', tarjetaInformativa, false);
		function tarjetaInformativa() {
			$('#menuContainer').load("tarjetaInformativa.html");
		};
		
		var listarDef = document.getElementById('listarDefensores');
		listarDef.addEventListener('click', listaDefensores, false);
		function listaDefensores() {
			$('#menuContainer').load("listarDefensores.php");
		};
	
		var listarExp = document.getElementById('listarExpedientes');
		listarExp.addEventListener('click', listarExpedientes, false);
		function listarExpedientes() {
			$('#menuContainer').load("listarExpedientes.php");
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



	var asignar=document.getElementById('cambiarAdscripcion');
	asignar.addEventListener('click',asinar,false);
	 function asinar(){
		$('#menuContainer').load("../administrador/cambiarAdscripcion.php");
	}
// 
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

