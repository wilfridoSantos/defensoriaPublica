$(document).ready(function () {
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

	var tarjetaI=document.getElementById('tarjetaInformativa');
		tarjetaI.addEventListener('click', tarjetaInformativa, false);
		function tarjetaInformativa() {
			$('#menuContainer').load("tarjetaInformativa.html");
		};
		
	var listarDef=document.getElementById('listarDefensores');
		listarDef.addEventListener('click', listaDefensores, false);
		function listaDefensores() {
		       $.ajax({
			type:'GET',
			//url:'listarDefensores.php',
			url: '../../controlador/defensor/controladorListaDef.php',
			data:"mensaje=holaMundo",
			beforeSend: function() {
				
				$('#menuContainer').load('listarDefensores.php');
			
			//	$('#datatable tbody').remove();
			 
            },
		success:function(data){
			console.log($('#tebody ').empty());
			var jsonDefensores = jQuery.parseJSON(data);
			//console.log(jsonDefensores,"hola pepito");
			
			$.each(jsonDefensores, function (KEY, VALOR){
				//console.log(VALOR.id_estudios , "BKAJBKjakd");
			
				$('#tebody').append('<tr> <td>'+VALOR.nombre+'</td><td>'+VALOR.ap_paterno+
				 '</td><td>'+VALOR.ap_materno+'</td><td>'+VALOR.juzgado+
				 '</td><td id="dataCedula">'+VALOR.cedula_profesional+
				 '</td><td><button type="button" class=" boton" id="boton" name="info"><span class="glyphicon glyphicon-user" aria-hidden="true"> </span></button>'+
				 '<button type="button" class="btn btn-primary" ><span class="glyphicon glyphicon-transfer" aria-hidden="true"></span></button>'+
				 '<button type="button" class="btn btn-warning" onclick="actualizarDefensor()"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>'+
				 '<button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>'+
 				'</td>  '); 

			});
			


			
			
			//$('#tebody').append(data);
		  //console.log('successful to ./../controlador/defensor/controladorListaDef.php');
		}
	  });
	};

	function cargarDatos(){
		$.ajax({
			type:'GET',
			//url:'listarDefensores.php',
			url: '../../controlador/defensor/controladorListaDef.php',
			data:"mensaje=holaMundo",
			beforeSend: function() {
                $('#menuContainer').load('listarDefensores.php');
            },
		success:function(data){
			console.log(data);
			$('#tebody').append(data);
		  //console.log('successful to ./../controlador/defensor/controladorListaDef.php');
		}
	  });

	}
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

