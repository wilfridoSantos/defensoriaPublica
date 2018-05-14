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
						'<li><span class="glyphicon glyphicon-ok-sign"></span> Numero Expediente: ' + (VALOR.num_expediente) + ' </li>' +
						'<li><span class="glyphicon glyphicon-ok-sign"></span> Materia: ' + (VALOR.materia).toUpperCase() + ' </li>' +
						'<li><span class="glyphicon glyphicon-ok-sign"></span> Fecha de Inicio: ' + (VALOR.fecha_inicio) + ' </li>' +
						'<li><span class="glyphicon glyphicon-ok-sign"></span> Fecha de Finalizacion: ' + (VALOR.fecha_final) + ' </li>' +
						'<li><span class="glyphicon glyphicon-ok-sign"></span> Nombre del Delito: ' + (VALOR.nombre_delito).toUpperCase() + ' </li>' +
						'<li><span class="glyphicon glyphicon-ok-sign"></span> Grado del Delito: ' + (VALOR.grado_delito).toUpperCase() + ' </li>' +
						'<li><span class="glyphicon glyphicon-ok-sign"></span> Estado del Expediente: ' + (VALOR.estado).toUpperCase() + ' </li>' +
						'<li><span class="glyphicon glyphicon-ok-sign"></span> Observaciones: ' + (VALOR.observaciones).toUpperCase() + ' </li>' +

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
							'<li><span class="glyphicon glyphicon-ok-sign"></span> Numero Expediente: ' + (VALOR.num_expediente) + ' </li>' +
							'<li><span class="glyphicon glyphicon-ok-sign"></span> Materia: ' + (VALOR.materia).toUpperCase() + ' </li>' +
							'<li><span class="glyphicon glyphicon-ok-sign"></span> Fecha de Inicio: ' + (VALOR.fecha_inicio) + ' </li>' +
							'<li><span class="glyphicon glyphicon-ok-sign"></span> Fecha de Finalizacion: ' + (VALOR.fecha_final) + ' </li>' +
							'<li><span class="glyphicon glyphicon-ok-sign"></span> Nombre del Delito: ' + (VALOR.nombre_delito).toUpperCase() + ' </li>' +
							'<li><span class="glyphicon glyphicon-ok-sign"></span> Grado del Delito: ' + (VALOR.grado_delito).toUpperCase() + ' </li>' +
							'<li><span class="glyphicon glyphicon-ok-sign"></span> Estado del Expediente: ' + (VALOR.estado).toUpperCase() + ' </li>' +
							'<li><span class="glyphicon glyphicon-ok-sign"></span> Observaciones: ' + (VALOR.observaciones).toUpperCase() + ' </li>' +
	
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
				console.log(jsonInfoDef.id_personal, 'entro   ');

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
					$('#updateDefensor').append(
						'<div class="form-group">' +
						'<label style="display:none;" class="control-label col-md-3 col-sm-3 col-xs-4"><span class="required"></span></label>' +
						'<div style="display:none;" class="col-md-6 col-sm-6 col-xs-12  form-group has-feedback">' +
						'<input style="display:none;" type="text" class="form-control " id="id_personal" placeholder="Id personal" name="id_personal"' +
						'value="' + VALOR.id_personal + '" readonly>' +
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
						'<input type="text" required pattern= "[A-Z|a-z]+"  maxlength="50" title = "Se aceptan solo letras" class="form-control text-uppercase" id="nombre" placeholder="Nombre" name="nombre"' +
						'value="' + (VALOR.nombre).toUpperCase() + '" >' +
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
						'<input type="text"  title"solo se acepta 5 digitos" required pattern="[1-9]+([0-9]*)" maxlength="4" class="form-control" id="numero_ext" placeholder="Numero Exterior" name="numero_ext"' +
						'value="' + VALOR.numero_ext + '">' +
						'</div>' +
						'</div>' +
						'<div class="form-group">' +
						'<label class="control-label col-md-3 col-sm-3 col-xs-4">Numero Interior</label>' +
						'<div class="col-md-6 col-sm-6 col-xs-4 form-group has-feedback">' +
						'<input type="text" title"solo se acepta cinco digitos"  pattern="[1-9]+([0-9]*)" maxlength="4" class="form-control" id="numero_int" placeholder="Numero Interior" name="numero_int"' +
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
						'<input type="text" required pattern="[0-9]{10}" class="form-control " title=": solo numero telefonico"  id="telefono" placeholder="Numero Telefonico" name="telefono"' +
						'value="' + VALOR.telefono + '">' +
						'</div>' +
						'</div>' +
						'<div class=" form-group">'+
						'<label for= "inputMail" class="control-label col-md-3 col-sm-3 col-xs-12">Email<span class="required">*</span></label>' +
						'<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">' +
						   '<input type="text" id= "correo_electronico" title"correo invalido" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)+$" data-error="correo invalido" maxlength="50" class="form-control" required="required" placeholder="Email" name="email"'+
						   ' value="' + VALOR.correo_electronico + '">' +
						   '<div  class="help-block with-errors"></div>  </div> '+
				   		'</div>'+
						'<div class="ln_solid"></div>' +
						'<div class="form-group">' +
						'<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">' +
						'<!-- <input type="submit"name="cancelar" class="btn btn-primary" value="Cancelar"></button>-->' +
						'<input class="btn btn-primary" type="submit" name="botonUpdate" id="botonUpdate" ' +
						'value="Actualizar Datos"></input> ' +
						'<!--   <button  type="submit" class="btn btn-success">Submit</button> -->' +
						'</div>' +
						'</div>'
					);

				});
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
			beforeSend: function () {

				$('#menuContainer').load('listarDefensores.php');
			},
			success: function (data) {
				//console.log('Success!! Eliminado defensor id = '+idDef);
				$('#menuContainer').load('listarDefensores.php');

			}
		});

	}




	var registroJuzgado = document.getElementById('crea_juzgado');
	if (registroJuzgado != null) {
		registroJuzgado.addEventListener('click', registrarJuzgado, false);

		function registrarJuzgado() {
			$.ajax({
				//	 include '../../controlador/defensor/controladorListaDef.php';
				url: "../../controlador/juzgado/registrar_juzgado.php",
				type: "POST",
				data: "",

				success: function (data) {
					console.log("FDF", data);
				},


				error: function (xhr, status) {
					console.log("FDssF", xhr);
					console.log("FDsF", status);
					alert('Disculpe, existió un problema');
				}

			});

		};

	}
});