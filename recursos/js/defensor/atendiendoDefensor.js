$(document).ready(function () {

	var registroEstudio=document.getElementById('configuracionDefensor');/// mostrar vista para registrar estudio
	registroEstudio.addEventListener('click', funcionRegistroEstudio, false);
	function funcionRegistroEstudio() {
	  	// $('#menuContainer').load("registrarActividadDefensor.php");
		 //$('#menuContainer').append(" ");
		 $('#xContent').empty();
		 $('#xContent').append("<object id='myFrame class='mi-iframe' type='text/html' data='registrarEstudio.php' width='1000 px' height='860 px'></object>");
		//<object data="registrarEstudio.php" type="text/html"><p>This is the fallback code!</p></object>
                   
		// document.getElementById("myFrame").src = "registrarActividadDefensor.php";

	};
	var actividad=document.getElementById('registrarActividad');
	actividad.addEventListener('click', registrarActividad, false);
	function registrarActividad() {
	   
		 $('#menuContainer').load("registrarActividadDefensor.php");
		// $('#menuContainer').append(" <iframe  src='registrarActividadDefensor.php'></iframe>");
	//	$('#menuContainer').append(" <object type='text/html' data='registrarActividadDefensor.php' width='330 px' height='860 px'></object>");
		
		// document.getElementById("myFrame").src = "registrarActividadDefensor.php";

	};
	var RegistrarUsuario=document.getElementById('registrarUsuarioServicio');
	RegistrarUsuario.addEventListener('click', registrarUsuarioServicio, false);
	function registrarUsuarioServicio() {
	   
		 $('#menuContainer').load("registrarUsuarioServicio.php");
	};
	var listarAct=document.getElementById('listarActividades');
//	console.log(listarUser);
	listarAct.addEventListener('click', listarActividades, false);
	function listarActividades() {
		//console.log('entro en la fun listaUser');
		$('#menuContainer').load("listarActividades.php");
		//window.location="../../controlador/defensor/controladorListaDef.php"
	};
	


	var verMisExpediente=document.getElementById('verMisExpediente');
//	console.log(listarUser);
	   verMisExpediente.addEventListener('click', misExpedientes, false);
	function misExpedientes() {
		//console.log('entro en la fun listaUser');
		$('#menuContainer').load("misExpedientes.php");
		//window.location="../../controlador/defensor/controladorListaDef.php"
	};




	$('#tebody').on('click', '.botonAsignarCaso', function (evst) {
		//		  var target= $(event.target);
		  var target= $(this);
		var curpUser = $(this).closest('tr').find('#curp').text();
		//console.log(idDef);
		//crarExpediente(curpUser);
	});

// ELIMINAR UN USUARIO EN LA LISTA DE ASIGANACION PARA CREARCION DE EXPEDIENT
$('#tablaAsinacionExpedienteusuario').on('click', '.eliminar', function (evst) {
//		  var target= $(event.target);
  var target= $(this);
  console.log(target);
  var eliminar = $(this).closest('tr');
  var id_usuarioEliminar = $(this).closest('tr')[0].children[0].getAttribute("id_usuario_eliminar");;
   console.log("id",id_usuarioEliminar);
   
  var usuarios=$("#usuarios").val().split(",");
  console.log(usuarios);
  usuarios.splice(usuarios.indexOf(id_usuarioEliminar),1);
  $("#usuarios").val(usuarios.toString());
  $(eliminar).remove();
	  

});
 // tablaAsinacionExpedienteusuario
	var creaExpediente=document.getElementById("crearExpediente");
	   creaExpediente.addEventListener('click',function (curpUser) {
		
		$('#menuContainer').load("crearExpediente.php");
	  
	},false);

  



	  //MUESTRA LA INFORMACION DE UN USUARIO DEL SERVICIO DE DICHO EXPEDIENTE
	
$('#tebody').on('click', '.botonDetalleUsuario', function (evst) {
	  var target= $(this);
	   var id_expediente = $(this).closest('tr').find('#id_expediente').text();

	   $.ajax({
		url: "../../controlador/usuario_servicio/listaUsuario.php",
		type: "GET",
		data: "id_expediente="+id_expediente,
		beforeSend:function(){
			
			
		},	
		success: function (data) {
			console.log(data);
			
				var json=jQuery.parseJSON(data)
				$("#datosUsuarioServicio").children().remove();
				
				$.each(json,function(key, valor) {
					  $('#datosUsuarioServicio').append(
						'<tr><td>'+valor.nombre+'</td>'+
						'<td>'+valor.ap_paterno+'</td>'+
						'<td>'+valor.ap_materno+'</td>'+                                                  
						'<td>'+valor.telefono+'</td>'+
						'<td><button type="button" class="btn btn-primary" onclick="editarUsuarioServicio(this)"'+
						' id_usuario_servicio="'+valor.id_usuario_servicio+'" id="id_usuario_servicio" title="infomación detallada" name="idContraparte">'+
						'<span title="infomación detallada" class="glyphicon glyphicon-user" aria-hidden="true"></span></button></td>'+
           				'</tr>'                                                   
						
					);
				 }); 
				
		   },complete:function(){
			$('#mostrarusuarioServicio').modal('show');
		   
		
		}
		   
		});
		/* $("#miUsuarioServicio").dialog({
			resizable: true,
			height: "auto",
			width: "auto",
			modal: true
			
			
		}); */
	});

	///ABRE LA VISTA PARA DAR DE ALTA A UN USARIO DE SERVICIO




	$('#tebody').on('click', '.botonBaja', function (evst) {// SE DARA BAJA AL EXPEDIENTE
		
		var id_expediente = $(this).closest('tr').find('#id_expediente').text();
		$("#modalBajaExpediente").modal('show');
		console.log("que pasando por esta cosa");
		
		document.formBajaExpediente.elements.id_expedienteBaja.value=id_expediente;
	});//final del metodo de baja expediente

	//// EVENTO PARA DAR ACTIVAR A UN EXPEDIENTE EXISTENTE EN ESTADO DE BAJA
	$('#tebody').on('click', '.botonActivar', function (evst) {// SE DARA BAJA AL EXPEDIENTE
		
		var id_expediente = $(this).closest('tr').find('#id_expediente').text();
		sendInfo="id_expediente="+id_expediente;
		$.ajax({
			type: "GET",
			url: "../../controlador/expediente/activarExpediente.php",
			dataType: "html",
			success: function (data) {
				var json=jQuery.parseJSON(data)
				console.log(data);
					var alert="";
		
					  if(json['tipo']==="exito")
						 alert="alert alert-success";
		
					  //$alert='alert alert-danger';
					   if(json['tipo']==="error")
						 alert="alert alert-danger";
		
						if(json['tipo']==="juzgado")
						  alert="alert alert-danger";
						  
						 $("#contenedorMensaje").attr("class",""+alert);
				
		
						$("#contenedorMensaje").append('<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">'+
						'<div class="modal-dialog modal-dialog-centered" role="document">'+
							'<div class="modal-content">'+
							'<strong align="center" id="id_Mensaje" class="alert-dismissible fade in '+alert+'"></strong>'+
							
							'<div class="modal-footer">'+
							' <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>'+
							'</div></div> </div></div>');
							$("#id_Mensaje").text(json['mensaje']);
							console.log(json['mensaje']," fue esto");
						
							$('#exampleModalLong').modal('show');
							console.log("ffef en always ",json['tipo']);
				
						if(json['tipo']==="exito")
						 $(this).closest('tr').find('#botonBajaActiva').removeClass('botonActivar btn btn-success').addClass('botonBaja btn btn-danger'); 
			  
			},
		
			data:"id_expediente="+id_expediente
		}); 
	
	});//final del metodo de baja expediente


	


});///fin de document.ready

function enviarBajaExpediente(){
	var sendInfo = {
		
	id_expediente    : document.formBajaExpediente.elements.id_expedienteBaja.value,
	fecha_baja       :document.formBajaExpediente.elements.fecha_baja.value,
	motivoBaja       :document.formBajaExpediente.elements.motivoBaja.value,
	observacion      :document.formBajaExpediente.elements.observacion.value
	//telefono         : document.formBajaExpediente.elements.fecha_baja,
	//email            : document.formBajaExpediente.elements.fecha_baja

}; 
var correcto=true;

console.log("datos a enviar ",sendInfo);


 	Object.entries(sendInfo).forEach(([key, value]) => {//recorro el arreglo y verifico si hay alguno que este vacio
	console.log("FFEE",  ((`${value}`)==="")); // "a 5", "b 7", "c 9"
	if((`${value}`)===""){
		correcto=false;
		console.log("dentro",  ((`${value}`)==="")); // "a 5", "b 7", "c 9"
		$("#enviarBaja").attr("type","submit");
		return false
	}else
	$("#enviarBaja").attr("type","button");
	   
	return true;
 }) ;
 console.log("correcto ",correcto);
 

 if(correcto===true)
 $.ajax({
	type: "POST",
	url: "../../controlador/expediente/bajaExpediente.php",
	dataType: "html",
	success: function (data) {
		var json=jQuery.parseJSON(data)
		console.log(data);
			var alert="";

			  if(json['tipo']==="exito")
				 alert="alert alert-success";

			  //$alert='alert alert-danger';
			   if(json['tipo']==="error")
				 alert="alert alert-danger";

				if(json['tipo']==="juzgado")
				  alert="alert alert-danger";
				  
				 $("#contenedorMensaje").attr("class",""+alert);
		

				$("#contenedorMensaje").append('<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">'+
				'<div class="modal-dialog modal-dialog-centered" role="document">'+
					'<div class="modal-content">'+
					'<strong align="center" id="id_Mensaje" class="alert-dismissible fade in '+alert+'"></strong>'+
					
					'<div class="modal-footer">'+
					' <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>'+
					'</div></div> </div></div>');
					$("#id_Mensaje").text(json['mensaje']);
					console.log(json['mensaje']," fue esto");
				
					$('#enviarBaja').modal('hide');
					$('#exampleModalLong').modal('show');
					console.log("ffef en always ",json['tipo']);
			  $("#modalBajaExpediente").modal('hide');
				if(json['tipo']==="exito")
				  $("#formBajaExpediente").children().remove();  
	  
	},

	data: sendInfo
}); 
}//final de baja expediente


function cargaDefensorPorMateria(e, elemento) {

$.ajax({
		url: "../../controlador/defensor/controlDefensor.php",
		type: "GET",
		data: "materia="+elemento.options[elemento.selectedIndex].value,
		beforeSend: function () {

	//	$('#menuContainer').load('listarDefensores.php');
		},
		success: function (data) {
			//console.log('Success!! Eliminado defensor id = '+idDef);
  //  console.log(data);
  var json=jQuery.parseJSON(data)
  $("#asignarDefensor").children().remove();
	$.each(json,function(key, valor) {
	  $("#asignarDefensor").append("<option value="+valor.id_personal+">"+valor.nombre+" "+valor.ap_paterno+" "+valor.ap_materno+" </option>");
	  //console.log(valor);
		});
	
		}
	});

//asignarDefensor
}

function verificarDelito(event,elemento){
		  console.log(elemento.value);
		  console.log(isNaN(Number(elemento.value)));
		  
if( !isNaN(Number(elemento.value)) )  {//verifico si lo que esta entrando como delito no sea numero
  $("#gradoDelito").hide();
  $("#id_gradodelito").removeAttr('required')
  console.log("esto es ", $( "id_gradodelito" ));
  document.getElementById("id_gradodelito").setAttribute("novalidate","novalidate")


}
else
if(elemento.value.length>0) 
	 {$("#gradoDelito").show();
	 document.getElementById("id_gradodelito").setAttribute("required","required")
		 }
	
if(elemento.id==="asignarAdscripcion") {//checo si esta entrando con el boton

if($("#delito").val().length==0) {
  $("#gradoDelito").hide();
  $("#id_gradodelito").removeAttr('required')
 $( "asignarAdscripcion" ).attr( 'enable', "enable" );
  
  document.getElementById("id_gradodelito").setAttribute("novalidate","novalidate")
}
}

if($("#usuarioSeleccionados").children().length>0){//verifico si se a seleccionado mas de uno usuario
  $("#project").removeAttr('required')
  document.getElementById("project").setAttribute("novalidate","novalidate")
}	
console.log($("#usuarioSeleccionados").children())		  

}	




$(document).ready(function () {
	
function muestraSeguimiento(evst) {
   var target= $(this);
	var id_usuario_servicio = $(this).closest('tr').find('#idPersonal').text();
	$.ajax({
	 url: "../../controlador/usuario_servicio/listaUsuario.php",
	 type: "GET",
	 //data: "id_usuario_servicio="+id_usuario_servicio,
	 success: function (data) {
		 alert("hola ");
			 /* var json=jQuery.parseJSON(data)
			 $("#datosUsuarioServicio").children().remove();
			 $.each(json,function(key, valor) {
				   $('#datosUsuarioServicio').append(
					 '<tr><td> Nombre   </td><td>'+valor.nombre+'</td></tr>'+
					 '<tr><td> Apellido paterno   </td><td>'+valor.ap_paterno+'</td></tr>'+
					 '<tr><td> Apellido Materno   </td><td>'+valor.ap_materno+'</td></tr>'+
					 '<tr><td> Correo   </td><td>'+valor.correo_electronico+'</td></tr>'+                                                    
					 '<tr><td> Teléfono   </td><td>'+valor.telefono+'</td></tr>'                                                    
					 
				 );
			  }); 
  */
		}
	 });
	 $("#miUsuarioServicio").dialog({
		 resizable: true,
		 height: "auto",
		 width: "auto",
		 modal: true,
		 
	 });
 }
});

var num_expedienteGlobal=90;


function cargarMisExpedientes(idpersonal) {
// alert("atendiendoDef");
//  $('#tebody').children().remove();

$.get("../../controlador/defensor/controladorListarExp.php?id_defensor="+idpersonal+"&xpregunta="+true,function(data){
	var jsonMisExp = jQuery.parseJSON(data);
	$('#tebody').children().remove();
	var materia;
	var sistema;
	  $.each(jsonMisExp, function (KEY, VALOR) {
				var nomBoton;
					console.log("lista de exp ",VALOR);
				 //nomBoton = $('<button>Seguimiento<button/>');
				 
				var nuevoBoton = document.createElement('button');
				 materia=VALOR.materia;
				 sistema=VALOR.sistema;
				 console.log("observacion ",VALOR.estado);
				 
		      if (VALOR.num_expediente!=""&VALOR.estado!="finalizado") {
				var vistaEstado="glyphicon glyphicon-save";
				var vistaTipoDanger="botonBaja btn btn-danger";
				var titulo="Baja al expediente";
				
				if(VALOR.estado==="BAJA"){
				  vistaEstado="glyphicon glyphicon-open";
				  vistaTipoDanger="botonActivar btn btn-success";
				  titulo="Activar al expediente";
				}
				var observacion=((VALOR.observaciones!=null)?VALOR.observaciones:" ");
					//console.log("observacion ",observacion);
					
				 $('#tebody').append(
					'<tr role="row" class="odd gradeA" > '+
					'<td id="idPersonal" style="display:none;">'+VALOR.id_personal+'</td>'+
					'<td id="id_expediente" style="display:none;">'+VALOR.id_expediente+'</td>'+
					'<td > <textarea id="num_expediente"   rows="1%"  disabled cols="10" minlength="10" maxlength="250"   style="background-color:transparent;overflow: auto; color:#000000; border:none; resize: none;" readonly class="form-control col-md-3 col-xs-12"> '+VALOR.num_expediente+'</textarea></td>'+
					'<td > <textarea    rows="1%"  disabled cols="30" minlength="10" maxlength="250"   style="background-color:transparent;overflow: auto; color:#000000; border:none; resize: none;" readonly class="form-control col-md-3 col-xs-12"> '+VALOR.nombre_delito+'</textarea></td>'+
					'<td> <textarea 	rows="1%"  disabled cols="35" minlength="10" maxlength="250" style="background-color:transparent; border:none; auto; color:#000000;resize: none;" readonly class="form-control col-md-5 col-xs-12" >'+VALOR.tipo_delito+'</textarea></td>'+
					'<td> <textarea 	rows="1%"  disabled cols="45" minlength="10" maxlength="250"style="background-color:transparent; border:none;color:#000000; " readonly class="form-control col-md-5 col-xs-12">'+observacion+'</textarea></td>'+                                                     
					' <td><button type="button" class="btn btn-primary botonDetalleUsuario" id="detalleUsuario" name="botonDetalleUsuario">Detalle Usuario</button>'+
					' <button type="button" class="btn btn-primary botonSeguimiento" name="botonSeguimiento" id="idSeguimiento" name="botonSeguimiento">Seguimiento</button>'+
					'<button type="button" title="'+titulo+'" class="  '+vistaTipoDanger+'" btn btn-danger" id="botonBajaActiva" name="botonActivar"><span title="Activar expediente" class="'+vistaEstado+'" aria-hidden="true"></span></button></td></tr>'
				 
					/* ' <button type="button" class="btn btn-primary botonSeguimiento" id="idSeguimiento" onready='+muestraSeguimiento()+'name="botonSeguimiento">Seguimiento</button></td></tr>' */
				 
				);   
						 
					}//FIN DEL IF 	

			});		
								
			
			var array=document.getElementsByName("botonSeguimiento");
					 for( i=0;i<array.length;i=i+1){
					//	array[i].addEventListener("click",funcionExpediente,false)
						   array[i].addEventListener("click",function(){
							//console.log("varlor en funcion  ",this);
							//funcionExpediente
							
				 			 var id_usuario_expedienteGlobal = $(this).closest('tr').find('#id_expediente').text();
				 			 var num_expediente = $(this).closest('tr').find('#num_expediente').text();
				            num_expedienteGlobal=id_usuario_expedienteGlobal;			
							if(materia==="EJECUCION"){
								console.log("holaEjecucion");
								 $.ajax({
									url: "materia/ejecucionSanciones.php",
									type: "GET",
																			
									success: function (data) {
										$( "#menuContainer" ).html(data);	
										$("#numExpedienteGlobal").text(id_usuario_expedienteGlobal);
										$("#expediente").text(num_expediente);
										$("#numExpedienteGlobal").val(id_usuario_expedienteGlobal);
										
									   }
									   
									}); 

									
								} else
								if((materia==="PENAL"||materia=="ADOLESCENTE")&&sistema==="ORAL"){
									console.log("holaPenal o adolecnetes");
									 $.ajax({
										url: "materia/penalOral.php",
										type: "GET",
																				
										success: function (data) {
											$( "#menuContainer" ).html(data);	
											$("#numExpedienteGlobal").text(id_usuario_expedienteGlobal);
											$("#expediente").text(num_expediente);
											$("#numExpedienteGlobal").val(id_usuario_expedienteGlobal);
											
										   }
										   
										}); 
	
										
									}
									else
									if(materia==="AGRARIO"){
										console.log("holaAgrario");
										 $.ajax({
											url: "materia/agrario.php",
											type: "GET",
																					
											success: function (data) {
												$( "#menuContainer" ).html(data);	
												$("#numExpedienteGlobal").text(id_usuario_expedienteGlobal);
												$("#expediente").text(num_expediente);
												$("#numExpedienteGlobal").val(id_usuario_expedienteGlobal);
												
											   }
											   
											}); 
		
											
										} 
									else
									if(materia==="MIXTO"){
										console.log("holaAgrario");
										 $.ajax({
											url: "materia/mixto.php",
											type: "GET",
																					
											success: function (data) {
												$( "#menuContainer" ).html(data);	
												$("#numExpedienteGlobal").text(id_usuario_expedienteGlobal);
												$("#expediente").text(num_expediente);
												$("#numExpedienteGlobal").val(id_usuario_expedienteGlobal);
												
											   }
											   
											}); 
		
											
										} else{
//CASO DE QUE SEA EL RESTO DE LAS MATERIAS
										 $.ajax({
											url: "materia/seguimientoMateria.php",
											type: "GET",
																					
											success: function (data) {
												$( "#menuContainer" ).html(data);	
												$("#numExpedienteGlobal").text(id_usuario_expedienteGlobal);
												$("#expediente").text(num_expediente);
												$("#numExpedienteGlobal").val(id_usuario_expedienteGlobal);
											   }
											   
											}); 
		
											
										} 
							
						  },false) 
					 }
	 
					
   // console.log(jsonMisExp);
}); $('#example').DataTable({
searching: false,

	
language: {
	"decimal":        "",
	"emptyTable":     "No hay datos",
	"info":           "mostrando _START_ a _END_ de _TOTAL_ pagina",
	"infoEmpty":      "mostrando 0 datos",
	"infoFiltered":   "(filtered from _MAX_ total entries)",
	"infoPostFix":    "",
	"thousands":      ",",
	"lengthMenu":     "mostrar de _MENU_ paginas",
	"loadingRecords": "Loading...",
	"processing":     "Processing...",
	"search":         "Buscar:",
	"zeroRecords":    "No matching records found",
	
	"aria": {
		"sortAscending":  ": activate to sort column ascending",
		"sortDescending": ": activate to sort column descending"
	},	"emptyTable":     "No hay datos",

	paginate: {
		previous: 'Atras',
		next:     'Siguiente'
	},
	aria: {
		paginate: {
			previous: 'Atras',
			next:     'Siguiente'
		}
	}
},

});
}

function filtroActividades(str) {
	console.log(str, ' str del filtro');
	//var filtro2 = $('#filtro2')[0].value;
	//var botonDess = $('#botonDesc').get(0);
	var fotoVis='';
	var active =false;
	 if (str == "" ) {
		$('#resultadoInforme').empty();
		$('#resultadoInforme').append('SELECCIONE UNA OPCION DEL FILTRO');
		
	} else {
		$.ajax({
			url: "../../controlador/actividad/listarActividades.php",
			type: "GET",
			data: "q=" + str ,
			success: function (data) {
				
				if (data != 0) {
					var actividad = '';
					var es_visita='';	
					var idAct;	

					var botonObservacion= '';				
					var jsonInforme = jQuery.parseJSON(data);
					console.log(jsonInforme, ' data de actividades');
					//descarga.on("click", function(){ descargarPDF(jsonExpDef); });
					//console.log(data,' resultado de data');
					$('#resultadoInforme').empty();
					$.each(jsonInforme, function (KEY, VALOR) {
						idAct = VALOR.idAct;
						
						botonObservacion ='<button type="button" onclick="editarObservaciones('+idAct+')"class="btn btn-default">	<span class="glyphicon glyphicon-ok"></span></button>';
						if(VALOR.latAse != null || VALOR.longAse != undefined){
							actividad = 'ASESORÍA';
						}
						if(VALOR.latAud != null || VALOR.longAud != undefined){
							actividad = 'AUDIENCIA';
						}
						if(VALOR.fotoVis != null || VALOR.fotoVis != undefined){
							actividad = 'VISITA CARCELARÍA';
							fotoVis = VALOR.fotoVis;
							console.log(fotoVis, 'valor fotoVis');
						}						
						if(actividad == 'VISITA CARCELARÍA'){
							es_visita = '<td tabindex="0"  class="sorting_1"> <a id="verFotoVisita">'+actividad+'</a>'+
							'<button type="button" onclick="verFotoVisita(this)" value = "'+fotoVis+'" class="btn btn-success">	<span class="glyphicon glyphicon-ok"></span></button>';
							active=true;
						}else{
							es_visita = '<td tabindex="0" class="sorting_1"> '+actividad+'';
						}
						$('#resultadoInforme').append(
							'<tr role="row" class="oven">' + //cla	ss ="oven" or "odd"							
							'<td id="verDialog" tabindex="0" class="sorting_1">' + VALOR.Usuario + '</td>' +
							'<td tabindex="0" class="sorting_1">' + VALOR.fechaR + '</td>' +
							'<td id="tdObservaciones" tabindex="0" class="sorting_1">' + VALOR.observaciones + '</td>' +
							  es_visita+botonObservacion+'</td>'+
							'</tr>'
						);

					});
					
				} else {
					$('#resultadoInforme').empty();
					$('#resultadoInforme').append('NO EXISTEN DATOS AÚN');
				}
			}
		});
	}
/* 	if(active == true){
		console.log(active, $('#verFotoVisita'));
		$('#verFotoVisita').addEventListener('click', verFotoVisita, false);
	} */
}
function saveObservacion(idAct){
	
	var textA  = $('#textArea').get(0);
	console.log(idAct, 'id kllaksj');
	var obs= textA.value;
	var dialog = $('#dialogoV');

	$.ajax({
		url: "../../controlador/actividad/cambiarObservacion.php",
		type: "GET",
		data: "observacion=" +  obs+ "&idAct="+idAct ,
		success: function (data) {
			console.log(data);
			if (data != 0) {
				console.log(data, ' data');
				//$('#menuContainer').load('listarActividades.php');
				dialog.dialog("close");
				//window.location="index.php"
			} else {
				console.log('ERROR REGRESO 0000');
			}
		}
	});
}
function verFotoVisita(botn) {
	var fotoVis = botn.value;
	console.log(botn.value, ' valor foto verFoto ');

	$('#exampleModalLong').modal('show');
	$('#miActividad').empty();
	  $('#miActividad').append(
	    '<div class="col-sm-6 invoice-col">' +
	  '<img class="img-quad img-responsive" src="../../recursos/archivo/vistas'+fotoVis+'" alt="" class="img-quad ">' +
  '</div>');
	

}

function editarObservaciones(idAct) {
	
	//console.log(obs);
	var dialog;
	dialog=$("#dialogoV").dialog({
		resizable: true,
		height: "auto",
		width: 500,
		modal: true,
		show: {
			effect: "blind",
			duration: 1000
		},
		hide: {
			effect: "explode",
			duration: 1000
		},
		position: {
			my: "left top",
			at: "left bottom",
			of: $('#verDialog')
		},
		buttons: {
			"Cancelar": function () {
				$(this).dialog("close");
			}
		},
		open: function () {
			$(this).empty();
			
			var textArea='<div class="col-md-12"><textarea id="textArea" value="" name="resultado" pattern="[a-z0-9.,:áéíóú ]+" data-error="solo numeros o letras en minisculas con minimo 10 caracter" rows="10" cols="150" minlength="10" maxlength="250" class="form-control col-md-4 col-xs-12" placeholder="describre el resultado u observaciones"></textarea>'+
			'<div>'+
				'<button type="button" onclick="saveObservacion('+idAct+')" class="btn btn-success">Guardar Observaciones</button>'+
			'</div>'+
			'</div>';			
			 $(this).append(
				 textArea
			); 
			$('#textArea').append($('#tdObservaciones').text());
		}
	});
}
///VERSION 1