$(document).ready(function () {

		var actividad=document.getElementById('registrarActividad');
		actividad.addEventListener('click', registrarActividad, false);
		function registrarActividad() {
           
			 $('#menuContainer').load("registrarActividadDefensor.php");
		};
		var RegistrarUsuario=document.getElementById('registrarUsuarioServicio');
		RegistrarUsuario.addEventListener('click', registrarUsuarioServicio, false);
		function registrarUsuarioServicio() {
           
			 $('#menuContainer').load("registrarUsuarioServicio.php");
		};
		var listarUser=document.getElementById('listarUser');
	//	console.log(listarUser);
		listarUser.addEventListener('click', listarUsuario, false);
		function listarUsuario() {
			//console.log('entro en la fun listaUser');
			$('#menuContainer').load("listarUsuario.php");
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
			crarExpediente(curpUser);
		});
		function crarExpediente(curpUser) {
			  $.get("crearExpediente.php",function(data){
				  	  $("#mostrarCrearExpediente").html(replazarParametro(data,[{curp:curpUser}]));
				
			  });
					 
			$("#mostrarCrearExpediente").dialog({
				resizable: true,
				height: "auto",
				width: "auto",
				modal: true,
				
			});
		  
		}

          //MUESTRA LA INFORMACION DE UN USUARIO DEL SERVICIO DE DICHO EXPEDIENTE
		
	$('#tebody').on('click', '.botonDetalleUsuario', function (evst) {
		  var target= $(this);
     	  var id_usuario_servicio = $(this).closest('tr').find('#id_usuario_servicio').text();
 		  $.ajax({
			url: "../../controlador/usuario_servicio/listaUsuario.php",
			type: "GET",
			data: "id_usuario_servicio="+id_usuario_servicio,
			success: function (data) {
                    var json=jQuery.parseJSON(data)
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
		
		 	  }
	        });
			$("#miUsuarioServicio").dialog({
				resizable: true,
				height: "auto",
				width: "auto",
				modal: true,
				
			});
		});

		///MUESTRA PARA DAR SEGUIMIENTO DE  UN CASO
		$('#tebody').on('click', '.botonSeguimiento', function (evst) {
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
		  });
  
		
	
});



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


function cargarMisExpedientes(idpersonal) {
   // alert("atendiendoDef");
 //  $('#tebody').children().remove();
	$.get("../../controlador/defensor/controladorListarExp.php?idPersonal="+idpersonal,function(data){
		var jsonMisExp = jQuery.parseJSON(data);
		$('#tebody').children().remove();
          $.each(jsonMisExp, function (KEY, VALOR) {
                    var nomBoton;
					$('#example').dataTable();
                    if(VALOR.id_personal < 0) {
                        nomBoton = '<button type="button" class="btn btn-danger botonCambioDefensor" id="botonCambioDef" name="botonCambioDef">Asignar Defensor</button>';                  
                    }else{
                        nomBoton = '<button type="button" class="btn btn-primary botonCambioDefensor" id="botonCambioDef" name="botonCambioDef">Cambiar Defensor</button>';
                    } 
                    
                     $('#tebody').append(
                        '<tr role="row" class="odd gradeA" > '+
                        '<td id="idPersonal" style="display:none;">'+VALOR.id_personal+' </td>'+
                        '<td id="id_usuario_servicio" style="display:none;">'+VALOR.id_usuario_servicio+' </td>'+
                        '<td > <textarea    rows="1%"  disabled cols="10" minlength="10" maxlength="250"   style="background-color:transparent;overflow: auto; color:#000000; border:none; resize: none;" readonly class="form-control col-md-3 col-xs-12"> '+VALOR.num_expediente+'</textarea></td>'+
                        '<td > <textarea    rows="1%"  disabled cols="30" minlength="10" maxlength="250"   style="background-color:transparent;overflow: auto; color:#000000; border:none; resize: none;" readonly class="form-control col-md-3 col-xs-12"> '+VALOR.estado+'</textarea></td>'+
                        '<td> <textarea 	rows="1%"  disabled cols="35" minlength="10" maxlength="250" style="background-color:transparent; border:none; auto; color:#000000;resize: none;" readonly class="form-control col-md-5 col-xs-12" >'+VALOR.accion_implementar+'</textarea></td>'+
                        '<td> <textarea 	rows="1%"  disabled cols="45" minlength="10" maxlength="250"style="background-color:transparent; border:none;color:#000000; " readonly class="form-control col-md-5 col-xs-12">'+VALOR.observaciones+'</textarea></td>'+                                                     
                        ' <td><button type="button" class="btn btn-primary botonDetalleUsuario" id="detalleUsuario" name="botonDetalleUsuario">Detalle Usuario</button>'+
                        ' <button type="button" class="btn btn-primary botonSeguimiento" id="botonSeguimiento" name="botonSeguimiento">Seguiento</button></td></tr>'
					 
					);   
				});	
			
       // console.log(jsonMisExp);
});
}



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
          console.log(valor);
            });
		
			}
		});
    
    //asignarDefensor
}
