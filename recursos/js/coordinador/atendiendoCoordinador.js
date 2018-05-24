$(document).ready(function () {
	

	$('#tebody').on('click', '.botonExp', function (evst) {
		//		  var target= $(event.target);
		//  var target= $(this.);
		var idDef = $(this).closest('tr').find('#idPersonal').text();
		//console.log(idDef);
		verExpedientes(idDef);
	});
	function verExpedientes(idDef) {
		$.ajax({
			url: "../../controlador/defensor/controlExpDefensor.php",
			type: "GET",
			data: "id_personal=" + idDef,
			beforeSend: function () {
				console.log(idDef, ' => IDpERSONAL');
				$('#menuContainer').load('verExpedientes.php');
			},
			success: function (data) {
				var jsonInfoDef = jQuery.parseJSON(data);
				console.log(jsonInfoDef.id_personal, 'entro');
				$.each(jsonInfoDef, function (KEY, VALOR) {
					//console.log(VALOR.foto, " =>RUTA");
					if (VALOR.perfil == undefined && VALOR.cedula_profesional == undefined) {
						VALOR.perfil = 'Aun no tiene escolaridad registrada.';
						VALOR.cedula_profesional = 'Aun no tiene escolaridad registrada.';
					}
					if (VALOR.fecha_final == '0000-00-00') {
						VALOR.fecha_final = 'SIN FINALIZAR';
					}
					if(true){

					}
					$('#verExpDef').append(
						'<div class="row"> ' +
						'<div  class="col-md-12 col-sm-12 col-xs-12  profile_details">' +
						'<div class="col-md-10 col-sm-10 col-xs-12 well profile_view" class="col-xl-12">' +
						'<ul class="list-unstyled">' +
						'<li><span class="glyphicon glyphicon-ok-sign"></span><b class="textoo"> Numero Expediente: </b> ' + (VALOR.num_expediente) + ' </li>' +
						'<li><span class="glyphicon glyphicon-ok-sign"></span><b class="textoo"> Materia: </b> ' + (VALOR.materia).toUpperCase() + ' </li>' +
						'<li><span class="glyphicon glyphicon-ok-sign"></span><b class="textoo"> Fecha de Inicio: </b> ' + (VALOR.fecha_inicio) + ' </li>' +
						'<li><span class="glyphicon glyphicon-ok-sign"></span><b class="textoo"> Fecha de Finalizacion: </b>' + (VALOR.fecha_final) + ' </li>' +
						'<li><span class="glyphicon glyphicon-ok-sign"></span><b class="textoo"> Nombre del Delito: </b>' + (VALOR.nombre_delito).toUpperCase() + ' </li>' +
						'<li><span class="glyphicon glyphicon-ok-sign"></span><b class="textoo"> Grado del Delito: </b>' + (VALOR.grado_delito).toUpperCase() + ' </li>' +
						'<li><span class="glyphicon glyphicon-ok-sign"></span><b class="textoo"> Estado del Expediente: </b>' + (VALOR.estado).toUpperCase() + ' </li>' +
						'<li><span class="glyphicon glyphicon-ok-sign"></span><b class="textoo"> Observaciones: </b>' + (VALOR.observaciones).toUpperCase() + ' </li>' +

						'</ul>' +
						'</div>' +
						'</div>' +
						'</div>' +
						'</div>');

						$('#verInfoUsuario').append(
							'<div class="row"> ' +
							'<div  class="col-md-12 col-sm-12 col-xs-12  profile_details">' +
							'<div class="col-md-10 col-sm-10 col-xs-12 well profile_view" class="col-xl-12">' +
							'<ul class="list-unstyled">' +
							'<li><b class="textoo"><span class="glyphicon glyphicon-ok-sign"></span> Nombre de usuario: </b>' + (VALOR.nombre).toUpperCase() + ' </li>' +
							'<li><b class="textoo"><span class="glyphicon glyphicon-ok-sign"></span> Apellido paterno: </b>' + (VALOR.ap_paterno).toUpperCase() + ' </li>' +
							'<li><b class="textoo"><span class="glyphicon glyphicon-ok-sign"></span> Apellido materno: </b>' + (VALOR.ap_materno).toUpperCase() + ' </li>' +
							'<li><b class="textoo"><span class="glyphicon glyphicon-ok-sign"></span> Municipio: </b>' + (VALOR.municipio).toUpperCase() + ' </li>' +
							'<li><b class="textoo"><span class="glyphicon glyphicon-ok-sign"></span> Colonia: </b>' + (VALOR.colonia).toUpperCase() + ' </li>' +
							'<li><b class="textoo"><span class="glyphicon glyphicon-ok-sign"></span> Telefono: </b>' + (VALOR.telefono) + ' </li>' +
							'<li><b class="textoo"><span class="glyphicon glyphicon-ok-sign"></span> Email: </b>' + (VALOR.correo_electronico)+ ' </li>' +
							'<li><b class="textoo"><span class="glyphicon glyphicon-ok-sign"></span> Etnia:</b>' + (VALOR.etnia).toUpperCase() + ' </li>' +
							'<li><b class="textoo"><span class="glyphicon glyphicon-ok-sign"></span> Idioma:</b>' + (VALOR.idioma).toUpperCase() + ' </li>' +
	
							'</ul>' +
							'</div>' +
							'</div>' +
							'</div>' +
							'</div>');

					//$('#verExpDef').append('<p>ahskdjhaksjdhkjashdkjashdkjsh</p>');
				});
			}
		});
	}


	$('#tebody').on('click', '.boton', function (evst) {
		//		  var target= $(event.target);
		//  var target= $(this.);
		var idDef = $(this).closest('tr').find('#idPersonal').text();
		//console.log(idDef);
		verInfo(idDef);
	});
	function verInfo(idDef) {
		$.ajax({
			url: "../../controlador/defensor/controlDefensor.php",
			type: "GET",
			data: "id_personal=" + idDef,
			beforeSend: function () {
				console.log(idDef, ' => IDpERSONAL');
				$('#menuContainer').load('verInfoDefensor.php');
			},
			success: function (data) {

				var jsonInfoDef = jQuery.parseJSON(data);
				console.log(jsonInfoDef[0].id_personal, 'entro   ');

				$.each(jsonInfoDef, function (KEY, VALOR) {
					console.log(VALOR.foto, " =>RUTA");
					if (VALOR.perfil == undefined && VALOR.cedula_profesional == undefined) {
						VALOR.perfil = 'Aun no tiene escolaridad registrada.';
						VALOR.cedula_profesional = 'Aun no tiene escolaridad registrada.';
					}
					if (VALOR.foto == '' || VALOR.foto == ' ') {
						VALOR.foto = 'default.png';
					}
					$('#verInfoDef').append(
						'<div class="row"> ' +
							'<div  class="col-md-12 col-sm-12 col-xs-12  profile_details">' +
								'<div class="col-md-10 col-sm-10 col-xs-12 well profile_view" class="col-xl-12">' +
									'<center><h2 ><span class="glyphicon glyphicon-user"></span> <b>' + (VALOR.nombre).toUpperCase() + ' ' + (VALOR.ap_paterno).toUpperCase() + ' ' + (VALOR.ap_materno).toUpperCase() + '</b></h2></center>' +									
									
								
										'<div class="left">'+
											'<ul class="list-unstyled">' +
												'<li><span class="glyphicon glyphicon-info-sign"></span> Direccion: ' + (VALOR.calle).toUpperCase() + ', ' + VALOR.numero_ext + ', ' + VALOR.numero_int + ', ' + ' </li>' +
												'<li><span class="glyphicon glyphicon-info-sign"></span> Curp :' + (VALOR.curp).toUpperCase() + ' </li>' +
												'<li><span class="glyphicon glyphicon-info-sign"></span> Nup :' + VALOR.nup + ' </li>' +
												'<li><span class="glyphicon glyphicon-info-sign"></span> Nue :' + VALOR.nue + ' </li>' +
												'<li><span class="glyphicon glyphicon-info-sign"></span> Juzgado :' + (VALOR.juzgado).toUpperCase() + ' </li>' +
												'<li><span class="glyphicon glyphicon-info-sign"></span> Cedula Profesional :' + (VALOR.cedula_profesional).toUpperCase() + ' </li>' +
												'<li><span class="glyphicon glyphicon-envelope"></span> E-Mail :' + (VALOR.correo_electronico).toUpperCase() + ' </li>' +
											'</ul>' +						
										'</div>'+
										'<div class="right ">'+																					
											'<p align="right"><img src="../../recursos/uploads/' + VALOR.foto + '" alt="" class="img-circle img-responsive"><span class="glyphicon glyphicon-lock"></span>' + (VALOR.perfil).toUpperCase() + '        </p>' +
										'</div>'+
									
								'</div>' +
							'</div>' +
						'</div>');
				});
			}
		});
	}


	$('#tebody').on('click', '.botonUp', function (evst) {
		//		  var target= $(event.target);
		//  var target= $(this.);
		var id_def = $(this).closest('tr').find('#idPersonal').text();
		console.log('id personal atendiendo defensor id ' + id_def);
			//$('#menuContainer').load('updateDef.php?id='+id_def);
		updateDefensor(id_def);
	});
	function updateDefensor(id_def) {
		$.ajax({
			url: "../../controlador/defensor/updateDefensor.php",
			type: "post",
			data: "id_personal=" + id_def,
			beforeSend: function () {
				//console.log(id_def, '=> new ');
				$('#menuContainer').load('updateDef.php');
			},
			success: function (data) {
				//console.log(data);
				var jsonUpdateDef = jQuery.parseJSON(data);
				//console.log(jsonUpdateDef,' => json Update defensor');
				var foto;
				console.log((jsonUpdateDef[0]['foto']).length, 'longitud valor foto');

				$.each(jsonUpdateDef, function (KEY, VALOR) {
					console.log('valor idpersonal-> ', VALOR.id_personal);

					if (VALOR.foto == '' || VALOR.foto == ' ') {
						VALOR.foto = 'default.png';
					}
					if (VALOR.foto == 'default.png') {
						foto = '<input class="inputfile" type="file" required id="fileToUpload" name ="fileToUpload">';
					} else {
						foto = '<input class="inputfile" type="file" id="fileToUpload" name ="fileToUpload">';
					}
					$('#myform').append(
						'<div class="form-group">' +
						'<label style="display:none;" class="control-label col-md-3 col-sm-3 col-xs-4"><span class="required"></span></label>' +
						'<div style="display:none;" class="col-md-6 col-sm-6 col-xs-12  form-group has-feedback">' +
						'<input style="display:none;" type="text" class="form-control " id="id_personal" placeholder="Id personal" name="id_personal"' +
						'value="' + VALOR.id_personal + '" readonly>' +
						'<span class ="help-block"> Nombre<span	>'+
						'</div>' +
						'</div>' +
						'<div class="form-group profile_details ">' +
						'<label for="exampleInputFile" class="control-label col-md-3 col-sm-3 col-xs-12">Foto de Perfil<span class="required">*</span></label>' +
						'<div class="col-md-6 col-sm-6 col-xs-12 well profile_view form-group has-feedback">' +
						'<p align="center"><img src="../../recursos/uploads/' + VALOR.foto + '"  alt="Imagen responsive" class="img-circle img-responsive"> </p>' +
						 foto +
						'<input style="display:none;" type="text" class="form-control " id="imagen" placeholder="imagen" name="imagen" value="' + VALOR.foto + '" >' +

						'<p class="help-block"><center>Selecciona una foto.</center></p>' +
						'<div class="upload-msg"></div>	' +
						'</div>' +
						'</div>' +
						'<div class="form-group">' +
						'<label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre<span class="required">*</span></label>' +
						'<div class="col-md-6 col-sm-6 col-xs-12  form-group has-feedback">' +
						'<input type="text"  id="nombre" pattern="[a-zA-ZéėíóúūñÁÉÍÓÚÜÑ ]+"  maxlength="40" minlength="4" autofocus="autofocus"   required class="form-control text-uppercase" data-error="se letras no máximo de 40 ni minimo de 4" placeholder="Nombre" name="nombre"'+
						'value="' + (VALOR.nombre).toUpperCase() + '" >' +
						'<div class="help-block "></div>'+
						'</div>' +
						'</div>' +
						'<div class="form-group">' +
						'<label class="control-label col-md-3 col-sm-3 col-xs-12">Apellido Paterno<span class="required">*</span></label>' +
						'<div class="col-md-6 col-sm-6 col-xs-12  form-group has-feedback">' +
						'<input type="text" required pattern= "[A-Z |a-z ]+"  maxlength="50" title = "Se aceptan solo letras" class="form-control text-uppercase" id="ap_paterno" placeholder="apellido Paterno" name="ap_paterno"' +
						'value="' + (VALOR.ap_paterno).toUpperCase() + '">' +
						'</div>' +
						'</div>' +
						'<div class="form-group">' +
						'<label class="control-label col-md-3 col-sm-3 col-xs-4">Apellido Materno<span class="required">*</span></label>' +
						'<div class="col-md-6 col-sm-6 col-xs-4 form-group has-feedback">' +
						'<input type="text" required pattern= "[A-Z | a-z ]+"  maxlength="50" title = "Se aceptan solo letras" class="form-control text-uppercase" id="ap_materno" placeholder="apellido materno" name="ap_materno"' +
						'value="' + (VALOR.ap_materno).toUpperCase() + '">' +
						'</div>' +
						'</div>' +
						'<div class="form-group">' +
						'<label class="control-label col-md-3 col-sm-3 col-xs-4">Curp<span class="required">*</span></label>' +
						'<div class="col-md-6 col-sm-6 col-xs-4 form-group has-feedback">' +
						'<input type="text" required pattern= "[A-Z|a-z|0-9]+" title = "Se aceptan solo letras y numeros" class="form-control text-uppercase" id="curp" placeholder="curp" name="curp"' +
						'value="' + (VALOR.curp).toUpperCase() + '" readonly>' +
						'</div>' +
						'</div>' +
						'<div class="form-group">' +
						'<label class="control-label col-md-3 col-sm-3 col-xs-4">Municipio<span class="required">*</span></label>' +
						'<div class="col-md-6 col-sm-6 col-xs-4 form-group has-feedback">' +
						'<input type="text" required pattern= "[A-Z |a-z ]+" title = "solo se aceptan letras" class="form-control text-uppercase" id="municipio" placeholder="Municipio" name="municipio"' +
						'value="' + (VALOR.municipio).toUpperCase() + '">' +
						'</div>' +
						'</div>' +
						'<div class="form-group">' +
						'<label class="control-label col-md-3 col-sm-3 col-xs-4">Colonia<span class="required">*</span></label>' +
						'<div class="col-md-6 col-sm-6 col-xs-4 form-group has-feedback">' +
						'<input type="text" required pattern= "[A-Za-z|0-9]+" title="solo se aceptan letras y numeros" class="form-control text-uppercase" id="colonia" placeholder="colonia" name="colonia"' +
						'value="' + (VALOR.colonia).toUpperCase() + '">' +
						'</div>' +
						'</div>' +
						'<div class="form-group">' +
						'<label class="control-label col-md-3 col-sm-3 col-xs-4">Calle<span class="required">*</span></label>' +
						'<div class="col-md-6 col-sm-6 col-xs-4 form-group has-feedback">' +
						'<input type="text" required pattern= "[A-Za-z | 0-9]+"  title = "Se aceptan solo letras y numeros" class="form-control text-uppercase" id="calle" placeholder="Calle" name="calle"' +
						'value="' + (VALOR.calle).toUpperCase() + '">' +
						'</div>' +
						'</div>' +
						'<div class="form-group">' +
						'<label class="control-label col-md-3 col-sm-3 col-xs-4">Numero Exterior<span class="required">*</span></label>' +
						'<div class="col-md-6 col-sm-6 col-xs-4 form-group has-feedback">' +
						'<input type="text"  title"solo se acepta 5 digitos" required pattern="[1-9]+([0-9]*)" maxlength="5" class="form-control" id="numero_ext" placeholder="Numero Exterior" name="numero_ext"' +
						'value="' + VALOR.numero_ext + '">' +
						'</div>' +
						'</div>' +
						'<div class="form-group">' +
						'<label class="control-label col-md-3 col-sm-3 col-xs-4">Numero Interior</label>' +
						'<div class="col-md-6 col-sm-6 col-xs-4 form-group has-feedback">' +
						'<input type="text" title"solo se acepta cinco digitos"  pattern="[1-9]+([0-9]*)" maxlength="5" class="form-control" id="numero_int" placeholder="Numero Interior" name="numero_int"' +
						'value="' + VALOR.numero_int + '">' +
						'</div>' +
						'</div>' +
						'<div class="form-group">' +
						'<label class="control-label col-md-3 col-sm-3 col-xs-12">Genero<span class="required">*</span></label>' +
						'<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">' +
						'<input type="text"  class="form-control" id="genero" placeholder="genero" name="genero"' +
						'value="' + (VALOR.genero).toUpperCase() + '" readonly>' +
						'</div>' +
						'</div>' +
						'<div class="form-group">' +
						'<label class="control-label col-md-3 col-sm-3 col-xs-12">Telefono<span class="required">*</span></label>' +
						'<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">' +
						'<input type="text" required pattern="[0-9]{10}" class="form-control " title="solo numero telefonico"  id="telefono" placeholder="Numero Telefonico" name="telefono"' +
						'value="' + VALOR.telefono + '">' +
						'<div class="help-block with-errors"></div>'+
						'</div>' +
						'</div>' +
						'<div class=" form-group">'+
						'<label for= "inputMail" class="control-label col-md-3 col-sm-3 col-xs-12">Email<span class="required">*</span></label>' +
						'<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">' +
						   '<input type="text" id="correo_electronico" title"correo invalido" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)+$" data-error="correo invalido" maxlength="50" class="form-control" required="required" placeholder="Email" name="correo_electronico"'+
						   ' value="' + VALOR.correo_electronico + '">' +
						   '<div  class="help-block with-errors"></div>  </div> '+
				   		'</div>'+
						'<div class="ln_solid"></div>' +
						'<div class="form-group">' +
						'<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">' +
						'<!-- <input type="submit"name="cancelar" class="btn btn-primary" value="Cancelar"></button>-->' +
						'<input class="btn btn-succes btn btn-success btn-lg" type="submit" name="botonUpdate" id="botonUpdate" ' +
						'value="Actualizar Datos"></input> ' +
						'<!--   <button  type="submit" class="btn btn-success">Submit</button> -->' +
						'</div>' +
						'</div>'
					);
					

				});
				
				
				$('#myform').validator();
				console.log($('#myform').validator(),'  ');
				//$('#menuContainer').html(data);
				//$('body').removeClass('loading');

			},
			/* 	complete:function(data) {
					 alert("iojfiojfdsioj");
					$('#menuContainer').load('	listarDefensores.php');
				} */

		});
	}
	$('#tebody').on('click', '.botonDel', function (evst) {
		//console.log('click boton del');
		//	 var target= $(event.target);
		//  var target= $(this.);
		var idDef = $(this).closest('tr').find('#idPersonal').text();
		
		console.log(idDef, ' before');
		$.ajax({
			url: "../../controlador/defensor/consultaRapida.php",
			type: "get",
			data: "id_personal=" + idDef,
			success: function (data) {	
				console.log(data, ' expedientes del id_Defensor-> '+idDef);								
				if(data != 0){
					$("#dialogo").dialog({
						resizable: true,
						height: "auto",
						width: "auto",
						modal: true,
						buttons: {
							"Eliminar": function () {
								eliminarDefensor(idDef);
								$(this).dialog("close");
							},
							"Cancelar": function () {
								$(this).dialog("close");
			
							}
						}
					});
				}else{
					eliminarDefensor(idDef);
				}
			}
		});
	});
	function eliminarDefensor(idDef) {
		console.log(idDef, 'i defensor');
		$.ajax({
			url: "../../controlador/defensor/controlDelDefensor.php",
			type: "get",
			data: "id_personal=" + idDef,
			success: function (data) {
				var mensaje={'tipo' :  "exito",
							 'mensaje':"Se ha eliminado satisfactoriamente."};
				var xx = '<?php '+
				'session_start(); '+
				'$_SESSION["mensaje"] ='+mensaje+ '?>';
			  
				console.log('Success!! Eliminado defensor id = '+idDef);
				$('#menuContainer').load('listarDefensores.php');

			}
		});

	}

	
}); // fin documente ready
function myFunctionDate(val) { //this.value from input date vista informeActividades.php
	var inicio = $('#inputInicio')[0].value;
	var final  = $('#inputFinal' )[0].value;
	console.log(inicio,' longitud ', inicio.length);
	console.log(final, ' longitud ',final.length );
	var parent = val.parentElement;//el div
	var labelInicio = document.getElementById('labelInicio');//val.parentElement.children[1];//label dentro del div
	var labelFinal = document.getElementById('labelFinal');
	//console.log(labelInicio, 'es label?');
	//var ul=document.createElement('li');
	
	
	if(inicio != '' && final != ''){
		//$(".infor").remove();
		var ini = new Date(inicio);
		var fin = new Date(final);
		if(ini < fin){
			var fechaI = ini.toISOString().split('T')[0];
			//console.log( fechaI, 'fecha inicial');
			$(".errors").remove();
			$('input[name=generar]')[0].disabled=false;
			return true;
		}else{
			$('input[name=generar]')[0].disabled=true;
			var fechaI = 'la fecha es mayor a la final';
			//console.log( fechaI, 'fecha inicial');				
			$(".errors").remove();
			  labelFinal.setAttribute("class", "errors");
			  labelFinal.innerText="la fecha Final debe ser Mayor";
				//parent.appendChild(labelInicio);
			return false;
		}
		//$.datepicker.formatDate('dd M yy');

	}else{
			  return false;
	}

	
 }

 function generarInformeAct() {
	var fechaI = document.getElementById('inputInicio').value;			
	var fechaF = document.getElementById('inputFinal').value;
	var inputR1 = $('#inputR1')['0'].checked;//RADIO1 INFORME GENERAL only fecha inicial y final
	var inputR2 = $('#inputR2')['0'].checked;
	var inputR3 = $('#inputR3')['0'].checked;
	console.log(inputR1+" R1", inputR2+" R2", inputR3+" R3");
	if(inputR1){// informe general
		$.ajax({			
			url: "../../controlador/personal_campo/controladorInformeAct.php",
			type: "POST",
			data: "fechaI="+fechaI+"&fechaF="+fechaF+"&R1="+inputR1+"&R2="+inputR2+"&R3="+inputR3,
			success: function (data) {
				var jsonInforme = jQuery.parseJSON(data);
			
				console.log(' INPUT R1 JJJJJJJJAAAAAAAASZZZZZ :#', jsonInforme[0]);
				$('#resultadoInforme').empty();					
				$.each(jsonInforme, function (KEY, VALOR) {
					if (VALOR.latitud == '') {
						VALOR.latitud = '40.413740';
					}
					if (VALOR.longitud == '') {
						VALOR.latitud = '-3.6921';
					}
					if (VALOR.latitud == '40.413740' || VALOR.longitud=='-3.6921') {
						var boton = '<button type="button" class="btn btn-default botonVerMapa" id="verDireccion" name="verDireccion" onclick = "verMapaDir()">Ver Localizacion</button>';                  
						//botonVerMapa classe para ir a ver mapa
					} else {
                        var boton = '<button type="button" class="btn btn-success botonVerMapa" id="verDireccion" name="verDireccion" onclick = "verMapaDir()">Ver Localizacion</button>';                  

					}
					$('#resultadoInforme').append(
						'<tr>'+
						'<td>'+VALOR.Defensor+'</td>'+
						'<td>'+VALOR.Usuario+'</td>'+
						'<td>'+VALOR.fecha_registro+'</td>'+			
						'<td>'+VALOR.observacion+'</td>'+
						'<td>'+boton+'</td>'+
						'<td id="idlatitud" style="display:none;">'+VALOR.latitud+'</td>'+
						'<td id="idlongitud" style="display:none;">'+VALOR.longitud+'</td>'+
						'</tr>'
					);
				});				
				//$('#resultadoInforme').load('verInformeActividad.php');
			}
		});
		
	}else if(inputR2){ //informe por filtro cargo y nue personal de campo
				
		var puesto = document.getElementById('puesto').value;
		console.log('puesto:'+puesto);
		$.ajax({			
			url: "../../controlador/personal_campo/controladorInformeAct.php",
			type: "POST",
			data: "fechaI="+fechaI + "&fechaF="+fechaF+"&R1="+inputR1+"&puesto="+puesto+"&R2="+inputR2+"&R3="+inputR3,
			success: function (data) {
				var jsonInforme = jQuery.parseJSON(data);
				console.log(jsonInforme[0],' VALOR R2');
				$('#resultadoInforme').empty();					
				$.each(jsonInforme, function (KEY, VALOR) {
					$('#resultadoInforme').append(
						'<tr>'+
						'<td>'+VALOR.id_personal+'</td>'+
						'<td>'+VALOR.id_usuario_servicio+'</td>'+
						'<td>'+VALOR.latitud+'</td>'+
						'<td>'+VALOR.longitud+'</td>'+
						'<td>'+VALOR.observaciones+'</td>'+
						'<td></td>'+
						'</tr>'
					);
				});
				
				//$('#resultadoInforme').load('verInformeActividad.php');
			}
		});
	}else if(inputR3){ //informe por filtro cargo y nue personal de campo
		var nue = document.getElementById('nue').value;				
		console.log('nue: '+nue);
		$.ajax({			
			url: "../../controlador/personal_campo/controladorInformeAct.php",
			type: "POST",
			data: "fechaI="+fechaI + "&fechaF="+fechaF+"&R1="+inputR1+"&nue="+nue+"&R2="+inputR2+"&R3="+inputR3,
			success: function (data) {
				var jsonInforme = jQuery.parseJSON(data);
				console.log(' INPUT R3 JJJJJJJJAAAAAAAASZZZZZ :#', jsonInforme[0]);
				$('#resultadoInforme').empty();					
				$.each(jsonInforme, function (KEY, VALOR) {
					$('#resultadoInforme').append(
						'<tr>'+
						'<td>'+VALOR.id_personal+'</td>'+
						'<td>'+VALOR.id_usuario_servicio+'</td>'+
						'<td>'+VALOR.latitud+'</td>'+
						'<td>'+VALOR.longitud+'</td>'+
						'<td>'+VALOR.observaciones+'</td>'+
						'</tr>'
					);
				});
				
				//$('#resultadoInforme').load('verInformeActividad.php');
			}
		});
	}

};
function initialize() {	
	 
	var mapOptions = {
		center: new google.maps.LatLng(40.413740, -3.6921), 
		zoom: 10,
		mapTypeId: google.maps.MapTypeId.ROADMAP	
	  }
	  var mapa = new google.maps.Map($('#Mapa'), mapOptions);
	  console.log(mapa, ' VALOR DEL MAPA');
	 
}

 function verMapaDir(){
	//initialize();
	 $("#dialogoI").dialog({
		title: "Location",
		height: "600",
		width: "700",
		show: "blind",
		hide: "explode",
		modal: true,
		buttons: {
			"Cancelar": function () {
				$(this).dialog("close");
			}			
		},
		open: function(){	
			console.log('entro');		
				initialize();
			
			  //google.maps.event.addDomListener(window, 'load', initialize);
			  //
		}

	}); 
}
 