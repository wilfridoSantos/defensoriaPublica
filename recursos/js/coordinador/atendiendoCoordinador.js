
$(document).ready(function () {
	$('#tebody').on('click', '.botonExp', function (evst) {
		var idDef = $(this).closest('tr').find('#idPersonal').text();
		console.log(idDef, ' id del defensor');
		verExpedientes(idDef);
	});
	function verExpedientes(idDef) {
		var id;
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
				var fechac = new Date();
				var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
				var fechaF = fechac.toLocaleDateString("es-ES", options);
				if (data != 0) {
					$('#infoGeneral').empty();
					$('#verInfoUsuario').empty();
					var content = '';
					var botonDetalle = '';
					$.each(jsonInfoDef, function (KEY, VALOR) {
						//console.log(KEY, ' valor del llave');
						id = VALOR.id_expediente;
						console.log(id, ' id expediente');

						content += 							//dentro de div row
							'				<tr role="row"><td><div style="width:100%;"  class="col-md-6 col-sm-12 col-xs-12 form-group">' +//COL 1 INFO EXPEDIENTE
							'					<div style="width:100%;"   class="col-md-4 col-sm-12 col-xs-12 well profile_view><ul class=" list-unstyled"="">' +
							'	<li style="display:none;" name="myclasse">' + VALOR.num_expediente + '</li>' +
							'	<li><span class="glyphicon glyphicon-ok-sign"></span><b class="textoo"> Numero Expediente: </b> ' + VALOR.num_expediente + '</li>' +
							'	<li><span class="glyphicon glyphicon-ok-sign"></span><b class="textoo"> Materia: </b>' + VALOR.materia + '</li>' +
							'	<li><span class="glyphicon glyphicon-ok-sign"></span><b class="textoo"> Fecha de Inicio: </b>' + VALOR.fecha_inicio + '</li>' +
							'	<li><span class="glyphicon glyphicon-ok-sign"></span><b class="textoo"> Fecha de Finalizacion: </b>' + VALOR.fecha_final + '</li>' +
							'	<li><span class="glyphicon glyphicon-ok-sign"></span><b class="textoo"> Nombre del Delito: </b>' + VALOR.nombre_delito + '</li>' +
							'	<li><span class="glyphicon glyphicon-ok-sign"></span><b class="textoo"> Grado del Delito: </b>' + VALOR.grado_delito + ' </li>' +
							'	<li><span class="glyphicon glyphicon-ok-sign"></span><b class="textoo"> Estado del Expediente: </b>' + VALOR.estado + ' </li>' +
							'	<li><span class="glyphicon glyphicon-ok-sign"></span><b class="textoo"> Observaciones: </b>' + VALOR.observaciones + ' </li>' +
							'	<li><button class="btn btn-success" onclick="verInfoUsuario(' + id + ')" name="botonVerUser" type="button" ><span class="glyphicon glyphicon-ok-sign"></span></button>' +
							'	<button class="btn btn-warning" onclick="verDetalleExp(' + KEY + ')" name="botonVerDetalleExp" type="button" ><span class="glyphicon glyphicon-ok-sign"></span></button></li>' +

							'</div>' +
							'			  	</div></td>' +
							'				<td>CERO PREGUNTAS POR AHORA<td></tr>';




						//console.log(VALOR.foto, " =>RUTA");
						if (VALOR.perfil == undefined && VALOR.cedula_profesional == undefined) {
							VALOR.perfil = 'Aun no tiene escolaridad registrada.';
							VALOR.cedula_profesional = 'Aun no tiene escolaridad registrada.';
						}
						if (VALOR.fecha_final == '0000-00-00') {
							VALOR.fecha_final = 'SIN FINALIZAR';
						}
					});
					$('#infoGeneral').append(
						'<div class="row">' +
						'   <div id="partePDF" class="col-md-12">' +
						'     <div class="x_panel">' +
						'           <div class="row no-print">' +
						'             <div class="col-xs-12">' +
						'               <button class="btn btn-primary pull-right" onclick="generarPDF2();" style="margin-right: 5px;">' +
						'<i class="fa fa-download"></i> Generar PDF</button>' +
						'             </div>' +
						'           </div>' +
						'       <div class="x_content">' +
						'         <section class="content invoice">' +
						'           <div class="row">' +
						'             <div class="col-xs-12 invoice-header">' +
						'               				<center><h3>' +
						'                               <i class="fa fa-globe"></i><b> DEFENSORÍA PÚBLICA DEL ESTADO DE OAXACA.</b>' +
						'                           </h3></center>' +
						'                               <h3><small class="pull-right">Fecha: ' + fechaF + '; A las ' + fechac.getHours() + ':' + fechac.getMinutes() + ':' + fechac.getSeconds() + ' Horas</small></h3>' +
						'             </div>' +//div cols xs-12 invoice-header						
						'           <div class="row invoice-info">' +
						'			  <div class="col-sm-2 invoice-col">' +
						'				<p align="left"><img src="../../recursos/uploads/' + jsonInfoDef[0].foto + '" alt="" class="img-circle img-responsive"><span class="glyphicon glyphicon-lock"></span>Lic. en derecho</p>' +
						'			  </div>' +
						'             <div class="col-sm-10 invoice-col">' +
						'               <address>' +
						'                       <strong><i class="glyphicon glyphicon-ok-sign"></i>' + jsonInfoDef[0].nomDef + ' ' + jsonInfoDef[0].appDef + ' ' + jsonInfoDef[0].apmDef + ' ' + '</strong>' +
						'                       <br><i class="glyphicon glyphicon-ok-sign"></i>' + jsonInfoDef[0].calleDef + ', #' + jsonInfoDef[0].numDef + ', Col:' + jsonInfoDef[0].coloniaDef + ' ' +
						'                       <br><i class="glyphicon glyphicon-ok-sign"></i>' + jsonInfoDef[0].muniDef +
						'                       <br><i class="glyphicon glyphicon-ok-sign"></i>Telefono:' + jsonInfoDef[0].telDef +
						'                       <br><i class="glyphicon glyphicon-ok-sign"></i>Email:' + jsonInfoDef[0].emailDef +
						'               </address>' +
						'             </div>' +//col-sm-10 invoice-col
						'           </div>' +//row invoice-info
						'           </div>' +//class row
						'           <div id = "rowContenidoExp" class="row">' +
						'           </div>' +
						'         </section>' +
						'       </div>' +
						'     </div>' +
						'   </div>' +
						' </div>'
					);
					$('#rowContenidoExp').append(
						'<table id="datatable-responsive" class="table table-striped dt-responsive nowrap dataTable no-footer dtr-inline" cellspacing="0" width="100%" role="grid" aria-describedby="datatable-responsive_info" style="width: 100%;">' +
						'	<tbody>' +
						content +
						'	</tbody>' +
						'</table>'
					);
				} else {
					$('#infoGeneral').empty();
					$('#verInfoUsuario').empty();
					$('#infoGeneral').append("<h3><b>NO TIENE EXPEDIENTE(S) REGISTRADO(S)</b></h3>");
					$('#verInfoUsuario').append("<h3><b>NO TIENE USUARIO(S) REGISTRADO(S)</b></h3>");
				}
			}
		});
	};
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
						VALOR.perfil = 'Aún no tiene capacitación y/o curso registrado.';
						VALOR.cedula_profesional = 'Aún no tiene capacitación y/o curso registrado.';
					}
					if (VALOR.foto == '' || VALOR.foto == ' ') {
						VALOR.foto = 'default.png';
					}
					$('#verInfoDef').append(
						'<div class="row"> ' +
						'<div  class="col-md-12 col-sm-12 col-xs-12  profile_details">' +
						'<div class="col-md-10 col-sm-10 col-xs-12 well profile_view verInfoDef" class="col-xl-12">' +
						'<center><h2 ><span class="glyphicon glyphicon-user"></span> <b>' + (VALOR.nombre).toUpperCase() + ' ' + (VALOR.ap_paterno).toUpperCase() + ' ' + (VALOR.ap_materno).toUpperCase() + '</b></h2></center>' +
						'<div class="left">' +
						'<ul class="list-unstyled">' +
						'<li id="idNueLi" style="display:none;">' + (VALOR.nue) + '</li>' +
						'<li><span class="glyphicon glyphicon-info-sign"></span> Direccion: ' + (VALOR.calle).toUpperCase() + ', ' + VALOR.numero_ext + ', ' + VALOR.numero_int + ', ' + ' </li>' +
						'<li><span class="glyphicon glyphicon-info-sign"></span> Curp :' + (VALOR.curp).toUpperCase() + ' </li>' +
						'<li><span class="glyphicon glyphicon-info-sign"></span> Nup :' + VALOR.nup + ' </li>' +
						'<li><span class="glyphicon glyphicon-info-sign"></span> Nue :' + VALOR.nue + ' </li>' +
						'<li><span class="glyphicon glyphicon-info-sign"></span> Juzgado :' + (VALOR.juzgado).toUpperCase() + ' </li>' +
						'<li><span class="glyphicon glyphicon-info-sign"></span> Cedula Profesional :' + (VALOR.cedula_profesional).toUpperCase() + ' </li>' +
						'<li><span class="glyphicon glyphicon-envelope"></span> E-Mail :' + (VALOR.correo_electronico).toUpperCase() + ' </li>' +
						'</ul>' +
						'</div>' +
						'<div class="right ">' +
						'<p align="right"><img src="../../recursos/uploads/' + VALOR.foto + '" alt="" class="img-circle img-responsive"><span class="glyphicon glyphicon-lock"></span>' + (VALOR.perfil).toUpperCase() + '        </p>' +
						'</div>' +
						'<div><input type ="button" class="btn btn-succes btn btn-success" onclick="cambiarAdscripcion()" value="Cambiar de adscripcón"/>' +
						'<input type="button" class="btn btn-succes btn btn-success" onclick="generaInformeByNue()"  value="Generar Informe" id="generarInfoActByNue"/> ' +
						'</div>' +
						'</div>' +
						'</div>' +
						'</div>');


				});
			}
		});
	};
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
						foto = '<input style="padding-left:300px;" class="inputfile" type="file" required id="fileToUpload" name ="fileToUpload">';
					} else {
						foto = '<input style="padding-left:300px;" class="inputfile" type="file" id="fileToUpload" name ="fileToUpload">';
					}
					$('#myform').append(
						'<div class="form-group">' +
						'<label style="display:none;" class="control-label col-md-3 col-sm-3 col-xs-4"><span class="required"></span></label>' +
						'<div style="display:none;" class="col-md-6 col-sm-6 col-xs-12  form-group has-feedback">' +
						'<input style="display:none;" type="text" class="form-control " id="id_personal" placeholder="Id personal" name="id_personal"' +
						'value="' + VALOR.id_personal + '" readonly>' +
						'<span class ="help-block"> Nombre<span	>' +
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
						'<input type="text"  id="nombre" pattern="[a-zA-ZéėíóúūñÁÉÍÓÚÜÑ ]+"  maxlength="40" minlength="4" autofocus="autofocus"   required class="form-control text-uppercase" data-error="se letras no máximo de 40 ni minimo de 4" placeholder="Nombre" name="nombre"' +
						'value="' + (VALOR.nombre).toUpperCase() + '" >' +
						'<div class="help-block "></div>' +
						'</div>' +
						'</div>' +
						'<div class="form-group">' +
						'<label class="control-label col-md-3 col-sm-3 col-xs-12">Apellido Paterno<span class="required">*</span></label>' +
						'<div class="col-md-6 col-sm-6 col-xs-12  form-group has-feedback">' +
						'<input type="text" required pattern="[a-zA-ZéėíóúūñÁÉÍÓÚÜÑ]+"  maxlength="50" title = "Se aceptan solo letras" data-error=" letras no máximo de 40 y minimo de 4" class="form-control text-uppercase" id="ap_paterno" placeholder="apellido Paterno" name="ap_paterno"' +
						'value="' + (VALOR.ap_paterno).toUpperCase() + '">' +
						'</div>' +
						'</div>' +
						'<div class="form-group">' +
						'<label class="control-label col-md-3 col-sm-3 col-xs-4">Apellido Materno<span class="required">*</span></label>' +
						'<div class="col-md-6 col-sm-6 col-xs-4 form-group has-feedback">' +
						'<input type="text" required pattern="[a-zA-ZéėíóúūñÁÉÍÓÚÜÑ]+"  maxlength="50" title = "Se aceptan solo letras" class="form-control text-uppercase" id="ap_materno" placeholder="apellido materno" name="ap_materno"' +
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
						'<div class="help-block with-errors"></div>' +
						'</div>' +
						'</div>' +
						'<div class=" form-group">' +
						'<label for= "inputMail" class="control-label col-md-3 col-sm-3 col-xs-12">Email<span class="required">*</span></label>' +
						'<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">' +
						'<input type="text" id="correo_electronico" title"correo invalido" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)+$" data-error="correo invalido" maxlength="50" class="form-control" required="required" placeholder="Email" name="correo_electronico"' +
						' value="' + VALOR.correo_electronico + '">' +
						'<div  class="help-block with-errors"></div>  </div> ' +
						'</div>' +
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

				//$('#menuContainer').html(data);
				//$('body').removeClass('loading');

			},
			/* 	complete:function(data) {
					 alert("iojfiojfdsioj");
					$('#menuContainer').load('	listarDefensores.php');
				} */

		});
	};
	$('#tebody').on('click', '.botonDel', function (evst) {
		var idDef = $(this).closest('tr').find('#idPersonal').text();

		console.log(idDef, ' before');
		$.ajax({
			url: "../../controlador/defensor/consultaRapida.php",
			type: "get",
			data: "id_personal=" + idDef,
			success: function (data) {
				console.log(data, ' expedientes del id_Defensor-> ' + idDef);
				if (data != 0) {
<<<<<<< HEAD
					$("#msnDialog").removeAttr("style");
=======
					$('#msnDialog').removeAttr("style");
>>>>>>> 463deed2d4cb356adb1227d4525a885ff5f87be2
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
				} else {
					eliminarDefensor(idDef);
				}
			}
		});
	});
	function eliminarDefensor(idDef) {
		//console.log(idDef, 'i defensor');
		$.ajax({
			url: "../../controlador/defensor/controlDelDefensor.php",
			type: "get",
			data: "id_personal=" + idDef,
			success: function (data) {
				console.log(data);
				$('#msnDialog').attr('style', 'display:none');

				$('#menuContainer').load('listarDefensores.php');
			}
		});

	};

}); // fin document ready -------------------------------------------------------------------------------------------------

function generaInformeByNue() {
	var nue = $('#idNueLi').get(0).textContent;
	$("#dialogoAds").dialog({
		resizable: true,
		height: "auto",
		width: "auto",
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
			of: $('#verInfoDef')
		},
		buttons: {
			"Cancelar": function () {
				$(this).dialog("close");
			}
		},
		open: function () {
			//var nue = $('#nuePersonal')[0].textContent;
			//var nue = $('#idNueLi')[0].textContent;

			//console.log(nue,' dentro del dialog');
			$(this).empty();
			//$(this).append(data);
			$(this).load('listarActividadesByNue.php?nue=' + nue);
		}
	});
};
function cambiarAdscripcion() {
	var nue = $('#idNueLi').get(0).textContent;
	console.log(nue, 'entroo valorrrr');
	$("#dialogoAds").dialog({

		height: 500,
		width: 600,
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
			of: $('#verInfoDef')
		},
		buttons: {
			"Cancelar": function () {
				$(this).dialog("close");
			}
		},
		open: function () {
			//var nue = $('#nuePersonal')[0].textContent;
			//var nue = $('#idNueLi')[0].textContent;

			//console.log(nue,' dentro del dialog');
			$(this).empty();
			//$(this).append(data);
			$(this).load('cambiarAdscripcion.php?nue=' + nue);
		}
	});
};
function verInfoUsuario(id) {
	console.log(id, ' id expediente');
	$.ajax({
		url: "../../controlador/usuario_servicio/consultasUsuario.php",
		type: "GET",
		data: "id_expediente=" + id,
		success: function (data) {
			var jsonInformacion = jQuery.parseJSON(data);
			var usuarios = '';
			$.each(jsonInformacion, function (KEY, VALOR) {
				usuarios += '<div style="width:100%;" class="col-md-6 col-sm-12 col-xs-12 form-group">' +//COL 2 INFO USUARIO SERVICIO
					'					<div style="width:95%;" class="col-md-4 col-sm-12 col-xs-12 well profile_view><ul class=" list-unstyled"="">' +
					'	<li><span class="glyphicon glyphicon-ok-sign"></span><b class="textoo"> Nombre usuario: </b>' + VALOR.nombre + '</li>' +
					'	<li><span class="glyphicon glyphicon-ok-sign"></span><b class="textoo"> Apellidos: </b>' + VALOR.ap_paterno + ' ' + VALOR.ap_materno + '</li>' +
					'	<li><span class="glyphicon glyphicon-ok-sign"></span><b class="textoo"> Etnia: </b>' + VALOR.etnia + '</li>' +
					'	<li><span class="glyphicon glyphicon-ok-sign"></span><b class="textoo"> Lengua o Idioma: </b> ' + VALOR.idioma + '</li>' +
					'	<li><span class="glyphicon glyphicon-ok-sign"></span><b class="textoo"> Municipio: </b>' + VALOR.municipio + ' </li>' +
					'	<li><span class="glyphicon glyphicon-ok-sign"></span><b class="textoo"> Colonia: </b>' + VALOR.colonia + '</li>' +
					'	<li><span class="glyphicon glyphicon-ok-sign"></span><b class="textoo"> Telefono: </b>' + VALOR.telefono + '</li>' +
					'	<li><span class="glyphicon glyphicon-ok-sign"></span><b class="textoo"> Correo electronico: </b>' + VALOR.correo_electronico + '</li>' +
					'</div>' +
					'			  	</div>'
			});
			console.log(jsonInformacion, ' info del usuario con id ' + id);
			//console.log(jsonInformacion, ' json Informacion');
			$("#dialogoExp").dialog({
				resizable: true,
				height: "auto",
				width: "auto",
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
					of: $('#myTabContent')
				},
				buttons: {
					"Cancelar": function () {
						$(this).dialog("close");
					}
				},
				open: function () {
					$(this).empty();
					//$(this).append(data);					
					$(this).append(usuarios);
				}
			});

		}
	});
};
function myFunctionDate2(val, nue) { //this.value from input date vista informeActividades.php
	console.log(nue, 'en function DAte NUE');
	var inicio = $('#inputInicio')[0].value;
	var final = $('#inputFinal')[0].value;
	var labelInicio = document.getElementById('labelInicio');//val.parentElement.children[1];//label dentro del div
	var labelFinal = document.getElementById('labelFinal');
	//console.log(labelInicio, 'es label?');
	//var ul=document.createElement('li');


	//console.log(inicio, ' longitud ', inicio.length);
	//console.log(final, ' longitud ', final.length);

	if (inicio != '' && final != '') {
		var ini = new Date(inicio);
		var fin = new Date(final);
		if ((ini < fin) || (ini == fin)) {
			var fechaI = ini.toISOString().split('T')[0];
			$(".alert").remove();
			//$('input[name=generar]')[0].disabled=false;
			generarInformeAct2(nue);
			return true;
		} else {

			var fechaI = 'la fecha es mayor a la final';
			//console.log( fechaI, 'fecha inicial');				
			$(".errors").remove();
			labelFinal.setAttribute("class", "alert alert-danger");

			labelFinal.innerText = "la fecha Final debe ser Mayor";
			//parent.appendChild(labelInicio);
			return false;
		}
		//$.datepicker.formatDate('dd M yy');

	} else {
		return false;
	}


};
function myFunctionDate(val) { //this.value from input date vista informeActividades.php
	var inicio = $('#inputInicio')[0].value;
	var final = $('#inputFinal')[0].value;
	var labelInicio = document.getElementById('labelInicio');//val.parentElement.children[1];//label dentro del div
	var labelFinal = document.getElementById('labelFinal');

	var desc = $('#botonDesc').get(0);

	//console.log(desc, 'es label?');
	//var ul=document.createElement('li');


	console.log(inicio, ' longitud ', inicio.length);
	console.log(final, ' longitud ', final.length);

	if (inicio != '' && final != '') {
		var ini = new Date(inicio);
		var fin = new Date(final);
		if ((ini < fin) || (ini == fin)) {
			var fechaI = ini.toISOString().split('T')[0];
			$(".alert").remove();
			//$('input[name=generar]')[0].disabled=false;
			//console.log('antes de generar Informe()');
			generarInformeAct();
			desc.disabled = false;
			return true;
		} else {
			desc.disabled = true;
			var fechaI = 'la fecha es mayor a la final';
			//console.log( fechaI, 'fecha inicial');				
			$(".errors").remove();
			labelFinal.setAttribute("class", "alert alert-danger");

			labelFinal.innerText = "la fecha Final debe ser Mayor";
			//parent.appendChild(labelInicio);
			return false;
		}
		//$.datepicker.formatDate('dd M yy');

	} else {
		return false;
	}


};
function generarInformeAct2(nue) {
	var fechaI = document.getElementById('inputInicio').value;
	var fechaF = document.getElementById('inputFinal').value;
	console.log('antes del ajax', fechaI, fechaF, nue)
	$.ajax({
		url: "../../controlador/personal_campo/controladorInformeAct.php",
		type: "POST",
		data: { "fechaI": fechaI, "fechaF": fechaF, "nue": nue },
		success: function (data) {
			console.log(data);
			var jsonInforme = jQuery.parseJSON(data);


			$('#resultadoInformeByNue').empty();
			$.each(jsonInforme, function (KEY, VALOR) {
				if (VALOR.latitud == '' || VALOR.latitud == ' ') {
					VALOR.latitud = '17.909889';
				}
				if (VALOR.longitud == '' || VALOR.longitud == ' ') {
					VALOR.longitud = '-96.7222278';
				}
				var boton = '<button type="button" class="btn btn-success botonVerMapa" id="verDireccion" name="verDireccion" onclick = "verMapaDir()">Ver Localizacion</button>';

				$('#resultadoInformeByNue').append(
					'<tr role="row" class="oven">' + //cla	ss ="oven" or "odd"
					'<td tabindex="0" class="sorting_1">' + VALOR.Defensor + '</td>' +
					'<td tabindex="0" class="sorting_1">' + VALOR.Usuario + '</td>' +
					'<td tabindex="0" class="sorting_1">' + VALOR.fecha_registro + '</td>' +
					'<td tabindex="0" class="sorting_1">' + VALOR.observacion + '</td>' +
					'<td tabindex="0" class="sorting_1">' + boton + '</td>' +
					'<td tabindex="0" class="sorting_1" id="idlatitud" style="display:none;">' + VALOR.latitud + '</td>' +
					'<td tabindex="0" class="sorting_1" id="idlongitud" style="display:none;">' + VALOR.longitud + '</td>' +
					'</tr>'
				);
			});
			console.log('lo que regresa', jsonInforme);
		}
	});


};
function generarInformeAct() {
	var desc = $('#botonDesc').get(0);
	var fechaI = document.getElementById('inputInicio').value;
	var fechaF = document.getElementById('inputFinal').value;
	//console.log(fechaI, fechaF);

	$.ajax({
		url: "../../controlador/personal_campo/controladorInformeAct.php",
		type: "POST",
		data: "fechaI=" + fechaI + "&fechaF=" + fechaF,
		success: function (data) {
			if (data != 0) {
				desc.disabled = false;
				var jsonInforme = jQuery.parseJSON(data);


				$('#resultadoInforme').empty();
				$.each(jsonInforme, function (KEY, VALOR) {
					if (VALOR.latitud == '' || VALOR.latitud == ' ') {
						VALOR.latitud = '16.909759';

					}
					if (VALOR.longitud == '' || VALOR.longitud == ' ') {
						VALOR.longitud = '-96.722320';
					}
					var boton = '<button type="button" class="btn btn-success botonVerMapa" id="verDireccion" name="verDireccion" onclick = "verMapaDir(this)">Ver Localizacion</button>';

					$('#resultadoInforme').append(
						'<tr role="row" class="oven">' + //cla	ss ="oven" or "odd"
						'<td tabindex="0" class="sorting_1">' + VALOR.Defensor + '</td>' +
						'<td tabindex="0" class="sorting_1">' + VALOR.Usuario + '</td>' +
						'<td tabindex="0" class="sorting_1">' + VALOR.fecha_registro + '</td>' +
						'<td tabindex="0" class="sorting_1">' + VALOR.observacion + '</td>' +
						'<td tabindex="0" class="sorting_1">' + boton + '</td>' +
						'<td tabindex="0" class="sorting_1" id="idlatitud" style="display:none;">' + VALOR.latitud + '</td>' +
						'<td tabindex="0" class="sorting_1" id="idlongitud" style="display:none;">' + VALOR.longitud + '</td>' +
						'</tr>'
					);
				});
				console.log('JJJJJJJJAAAAAAAASZZZZZ :#', jsonInforme[0]);
			}
			else {
				desc.disabled = true;
				$('#resultadoInforme').empty();
				$('#resultadoInforme').append('<h3>no se encotrarón datos en esas fechas</h3>');
			}
		}

	});


};
function verMapaDir(element) {

	var mapsLat = $(element).closest('tr').find('#idlatitud').text();
	var mapsLon = $(element).closest('tr').find('#idlongitud').text();
	var lat = parseFloat(mapsLat);
	var lon = parseFloat(mapsLon);



	initialize(lat, lon);
};
function initialize(lat, lon) {

	$("#dialogoI").dialog({
		modal: true,
		title: "Google Map",
		resizable: true,
		height: "auto",
		width: "auto",
		show: {
			effect: "blind",
			duration: 1000
		},
		hide: {
			effect: "explode",
			duration: 1000
		},
		buttons: {
			Close: function () {
				$(this).dialog('close');
			}
		},
		open: function () {
			console.log('entro en dialog de map');
			var myLatLng = { lat: lat, lng: lon };

			var map = new google.maps.Map(document.getElementById('mapa'), {
				zoom: 16,
				center: myLatLng,
				mapTypeId: google.maps.MapTypeId.roadmap
			});

			var marker = new google.maps.Marker({
				position: myLatLng,
				map: map,
				title: 'Hello World!'
			});
			var panorama = new google.maps.StreetViewPanorama(
				document.getElementById('pano'), {
					position: myLatLng,
					pov: {
						heading: 34,
						pitch: 10
					}
				});
			map.setStreetView(panorama);
		}
	});
};
function convertirParrafo(str) {
	var numPalabras = str.split(/\b[\s,\.\-:;]*/).length;
	console.log(numPalabras, ' numero de palabras en STR');
	if (numPalabras > 2) {

	}
	return str;
};
function getBase64FromImageUrl(url) {
	var img = new Image();

	img.setAttribute('crossOrigin', 'anonymous');
	var code;
	img.onload = function () {
		var canvas = document.createElement("canvas");
		canvas.width = this.width;
		canvas.height = this.height;

		var ctx = canvas.getContext("2d");
		ctx.drawImage(this, 0, 0);

		var dataURL = canvas.toDataURL("image/png");

		console.log(dataURL.replace(/^data:image\/(png|jpg);base64,/, ""));

		code = String(dataURL.replace(/^data:image\/(png|jpg);base64,/, ""));
		console.log(code, ' code');
		return code;
	};
	img.src = url;
	return code;
}
function generarPDFActividades() {
	var fechaI = document.getElementById('inputInicio').value;
	var fechaF = document.getElementById('inputFinal').value;
	$.ajax({
		url: "../../controlador/personal_campo/controladorInformeAct.php",
		type: "POST",
		data: "fechaI=" + fechaI + "&fechaF=" + fechaF,
		success: function (data) {
			var base64 = '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';
			var jsonInforme = jQuery.parseJSON(data);
			console.log(base64, ' base 64');
			var contenido = '';
			$.each(jsonInforme, function (KEY, VALOR) {
				contenido += 'Nombre del defensor: ' + VALOR.Defensor + '\n';
				contenido += 'Nombre del usuario de servicio: ' + VALOR.Usuario + '\n';
				contenido += 'Fecha de registro: ' + VALOR.fecha_registro + '\n';
				contenido += 'Observaciones: ' + VALOR.observacion + '\n\n';
			});
			var docDefinition = {
				// a string or { width: number, height: number }
				pageSize: 'A4',
				// by default we use portrait, you can change it to landscape if you wish
				pageOrientation: 'portrait',
				header: {
					margin: 10,
					columns: [
						{
							// usually you would use a dataUri instead of the name for client-side printing
							// sampleImage.jpg however works inside playground so you can play with it
							image: 'data:image/png;base64,' + base64,
							width: 500, height: 40, style: 'rightme'
						}
						/*, {
							margin: [10, 0, 0, 0],
							text: 'Here goes the rest'
						} */
					]
				},
				footer: function (currentPage, pageCount) {
					return {
						table: {
							widths: ['*', 100],
							body: [
								[
									{ text: 'Página ' + pageCount + ' de ' + currentPage + '   ', alignment: 'center', bold: true }
								]
							]
						},
						layout: 'noBorders',
					};
				},
				// [left, top, right, bottom] or [horizontal, vertical] or just a number for equal margins
				pageMargins: [40, 60, 40, 60],
				content: [
					// using a { text: '...' } object lets you set styling properties
					{ text: '\n\nSE ENCONTRARON: ' + jsonInforme.length + ' REGISTROS DE ACTIVIDAD\n\n', style: 'header' },
					{ text: contenido, style: 'anotherStyle' }

				], styles: {
					header: {
						fontSize: 16,
						bold: true,
						alignment: 'center'
					},
					anotherStyle: {
						italic: true,
						alignment: 'justify',
						fontSize: 12
					},
					rightme: {
						alignment: 'right'
					}
				}
			};

			// print the PDF
			//pdfMake.createPdf(docDefinition).print();

			// download the PDF
			//pdfMake.createPdf(docDefinition).download('optionalName.pdf');
			pdfMake.createPdf(docDefinition).open();
		}
	});

};
function generarPDF2() {
	var content = [];
	var simpleHtm = $('#partePDF').get(0).innerHTML;
	console.log(simpleHtm);
	ParseHtml(content, simpleHtm);
	pdfMake.createPdf({ content: content }).open()
};
function descargarPDF() {
	//$('#menuContainer').load("listarDefensores.php");
	//console.log(myFuncionZX());
	var i1 = $('#filtro1').get(0).value;
	var i2 = $('#filtro2').get(0).value;

	if (i1 == "" && i2 == "") {

	} else {
		$.ajax({
			url: "../../controlador/defensor/controlFiltroListarExpediente.php",
			type: "GET",
			data: "q=" + i1 + "&q2=" + i2,
			success: function (data) {
				var jsonExpDef = jQuery.parseJSON(data);
				// open the PDF in a new window
				var contenido = '';
				$.each(jsonExpDef, function (KEY, VALOR) {
					contenido += 'NOMBRE COMPLETO: ' + VALOR.nombre + ' ' + VALOR.ap_paterno + ' ' + VALOR.ap_materno + '\n';
					contenido += 'EXPEDIENTE NUMERO: ' + VALOR.num_expediente + '\n';
					contenido += 'COLONIA: ' + VALOR.colonia + '\n';
					contenido += 'MATERIA: ' + VALOR.materia + '\n';
					contenido += 'MUNICIPIO: ' + VALOR.municipio + '\n';
					contenido += 'TELEFONO: ' + VALOR.telefono + '\n\n';
				});
				var docDefinition = {
					// a string or { width: number, height: number }
					pageSize: 'A4',

					// by default we use portrait, you can change it to landscape if you wish
					pageOrientation: 'landscape',

					// [left, top, right, bottom] or [horizontal, vertical] or just a number for equal margins
					pageMargins: [40, 60, 40, 60],
					content: [
						// using a { text: '...' } object lets you set styling properties
						{ text: 'SE ENCONTRARON: ' + jsonExpDef.length + ' EXPEDIENTES', style: 'header' },
						{ text: contenido, style: 'anotherStyle' }
					], styles: {
						header: {
							fontSize: 22,
							bold: true,
							alignment: 'center'
						},
						anotherStyle: {
							italic: true,
							alignment: 'justify',
							fontSize: 12
						}
					}
				};

				// print the PDF
				//pdfMake.createPdf(docDefinition).print();

				// download the PDF
				//pdfMake.createPdf(docDefinition).download('optionalName.pdf');
				pdfMake.createPdf(docDefinition).open();
			}
		});
	}


};
var dialogo;
function cambiarDefensor(botn) {
	console.log(botn, ' valor del boton');
	dialogo = $("#dialogoCambio").dialog({
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
			of: $('#tebody')
		},
		buttons: {
			"Cancelar": function () {
				$(this).dialog("close");
			}
		},
		open: function () {
			$(this).empty();
			//$(this).append(data);					
			$(this).load('cambiarDefensor.php?id_exp=' + botn);

			//$(this).dialog("close");
		}
	});

};
function verPreguntasExp(botn) {
	console.log(botn, ' ver preguntas del expediente');
	$("#dialogoCambio").dialog({
		resizable: true,
		height: "auto",
		width: "auto",
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
			of: $('#tebody')
		},
		buttons: {
			"Cancelar": function () {
				$(this).dialog("close");
			}
		},
		open: function () {
			$(this).empty();
			//$(this).append(data);					
			$(this).append('hoooola ');
		}
	});
};
function bajaExpediente(botn) {
	console.log(botn, ' id del expediente ');
	$("#dialogoBaja").dialog({
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
			of: $('#tebody')
		},
		buttons: {
			"Cancelar": function () {
				$(this).dialog("close");
			}
		},
		open: function () {
			$(this).empty();
			//$(this).append(data);					
			$(this).load('bajaExpediente.php?id_exp=' + botn);

			//$(this).dialog("close");
		}
	});

};
function showUser(str) {
	var filtro2 = $('#filtro2')[0].value;
	var botonDess = $('#botonDesc').get(0);
	if (str == "" && filtro2 == "") {

		botonDess.disabled = true;
		$('#tebody').empty();
		$('#tebody').append('<td><h3><b>Debe tener Seleccionado al menos un filtro.</b></h3></td>');

	} else {
		$.ajax({
			url: "../../controlador/defensor/controlFiltroListarExpediente.php",
			type: "GET",
			data: "q=" + str + "&q2=" + filtro2,
			success: function (data) {

				if (data != 0) {
					botonDess.disabled = false;
					var jsonExpDef = jQuery.parseJSON(data);
					//descarga.on("click", function(){ descargarPDF(jsonExpDef); });
					//console.log(data,' resultado de data');
					$('#tebody').empty();
					$.each(jsonExpDef, function (KEY, VALOR) {
						//console.log(VALOR, ' valor ');
						var nomBoton;
						var id_expediente = VALOR.id_expediente;
						if (VALOR.id_personal < 0) {
							nomBoton = '<button type="button" class="btn btn-danger"  id="botonReCambioDef" name="botonCambioDef" onclick="cambiarDefensor(' + id_expediente + ')"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span></button>';
						} else {
							nomBoton = '<button type="button" class="btn btn-primary " id="botonCambioDef" name="botonCambioDef" onclick="cambiarDefensor(' + id_expediente + ')"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span></button>';
						}

						$('#tebody').append(
							'<tr> ' +
							'<td id="nuePersonal" style="display:none;">' + VALOR.nue + ' </td>' +
							'<td>' + VALOR.num_expediente + '</td>' +
							'<td>' + VALOR.materia + '</td>' +
							'<td>' + VALOR.fecha_inicio + '</td>' +
							'<td>' + VALOR.estado + '</td>' +
							'<td style="white-space:nowrap;">' + VALOR.observaciones + '</td>' +
							'<td>' + nomBoton +
							'<button type="button" class="btn btn-dark " id="botonDetalleExp" name="botonDetalleExp" onclick="verPreguntasExp(this)"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>' +
							'<button type="button" class="btn btn-dark " id="botonBajaExp" name="botonBajaExp" onclick="bajaExpediente(' + id_expediente + ')"><span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span></button></td> </tr>'
						);
					});

				} else {
					$('#tebody').empty();
					$('#tebody').append('<td><h3><b>Aún no existen expedientes registrados al sistema.</b></h3></td>');
					botonDess.disabled = true;
				}
			}
		});
	}

};
function showMateria(str) {
	//var descarga = $('#botonDescargar');
	var filtro1 = $('#filtro1')[0].value;
	//console.log(filtro1 + " =>filtro1 " + str + " =>filtro2");
	var botonDess = $('#botonDesc').get(0);
	if (filtro1 == "" && str == "") {
		//por materia
		//descarga[0].disabled = true;
		$('#tebody').empty();
		botonDess.disabled = true;
	} else {
		$.ajax({
			url: "../../controlador/defensor/controlFiltroListarExpediente.php",
			type: "GET",
			data: "q=" + filtro1 + "&q2=" + str,
			success: function (data) {
				if (data != 0) {
					botonDess.disabled = false;
					var jsonExpDef = $.parseJSON(data);
					$('#tebody').empty();
					var nomBoton;
					$.each(jsonExpDef, function (KEY, VALOR) {
						if (VALOR.id_personal < 0) {
							nomBoton = '<button type="button" class="btn btn-danger"  id="botonReCambioDef" name="botonCambioDef" onclick="cambiarDefensor(this)"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span></button>';
						} else {
							nomBoton = '<button type="button" class="btn btn-primary " id="botonCambioDef" name="botonCambioDef" onclick="cambiarDefensor(this)"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span></button>';
						}

						$('#tebody').append(
							'<tr> ' +
							'<td id="idPersonal" style="display:none;">' + VALOR.id_personal + ' </td>' +
							'<td>' + VALOR.num_expediente + '</td>' +
							'<td>' + VALOR.materia + '</td>' +
							'<td>' + VALOR.fecha_inicio + '</td>' +
							'<td>' + VALOR.estado + '</td>' +
							'<td style="white-space:nowrap;">' + VALOR.observaciones + '</td>' +
							'<td>' + nomBoton +
							'<button type="button" class="btn btn-dark " id="botonDetalleExp" name="botonDetalleExp" onclick="versPreguntasExp(this)"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>' +
							'<button type="button" class="btn btn-dark " id="botonBajaExp" name="botonBajaExp" onclick="bajaExpediente()"><span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span></button></td> </tr>'
						);
					});
				} else {
					$('#tebody').empty();
					botonDess.disabled = true;
				}
			}
		});
	}

};
function verObservacion(check, llave){
	var divs=document.getElementsByName('idObs');
	var divEsp = divs[llave];
	if(check.checked == true){ 
		//var checks=document.getElementsByName('checkObservaciones');
		console.log(divEsp);
		divEsp[0].textContent='<h3>lasjlak</h3>';
		//divEsp.append('<textarea class="col-md-4">jkhakjdhakj</textarea>');
	}else{
		//divEsp.empty();
	}

}
function verDetalleExp(llave) {//llave -> 0 exp1, 1 exp2 ....
	var lis = document.getElementsByName('myclasse');//[0].textContent;
	console.log(lis[llave].textContent, ' ver detall', llave);
	var numExp = lis[llave].textContent;
	var dialogoVar;
	//$(this).closest('tr').find('#idPersonal').text();	
	$.ajax({
		url: "../../controlador/expediente/obtenerDetalleExpediente.php",
		type: "GET",
		data: "numExp=" + numExp,
		beforeSend: function () {
			dialogoVar = $("#dialogoDetalleExp").dialog({
				resizable: true,
				height: "auto",
				width: "auto",
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
					of: $('#myTabContent')
				},
				buttons: {
					"Cancelar": function () {
						//console.log('adkjahdkjahdkjha');
						$(this).dialog("close");
					}
				},
				open: function () {
					console.log(' dentro de beforeSend');
					$(this).load('interfazPreguntasR.php');
				}
			});

		},
		success: function (data) {
			console.log(data, ' datos de data response   ');
			//$('#idPregunta').append('Hola mundossssss');
			$.each(data, function (KEY, VALOR) {

				$('#idPregunta').append(
					'<div class="form-group col-md-12 col-sm-3 col-xs-12">' +
						'<div class="col-md-6 col-sm-3 col-xs-12"> <label style="" for="name">' +
							(KEY + 1) + ' ' + VALOR.pregunta + ' <span class="required">*</span> </label></div>' +	


						
						'<div class="col-md-6 col-sm-3 col-xs-12"><textarea id="name" class="form-control" data-validate-length-range="6" 	data-validate-words="2" name="name" placeholder="Ingresa una respuesta" required="required" type="text">' + VALOR.respuesta + '</textarea></div>'+

			  '</div>'+
			  '<div class="col-md-6 col-sm-3 col-xs-12">'+
			  '<div><label>'+
				'<input id="checkObservaciones" name="checkObservaciones" onchange="verObservacion(this, '+KEY+')" type="checkbox" unchecked data-switchery="true" > Observaciones'+
			  '</label></div>'+
			  '<div id="idObs" name="idObs" ><textarea id="txtA" name="txtA" style="display:none;"></textarea></div>' +	
		  '</div>');
			});
		}
	});
};
function validarSelect(str) {
	console.log(str);

	var botn = $('#botonBajaExp').get(0);
	if (str == "") {

		$('input[ name="botonBajaExp"]').attr('disabled', 'disabled');
		$('#mensajeSelectCausa').empty();
		$('#mensajeSelectCausa').append('Selecciona una causa');
	} else {
		$('input[ name="botonBajaExp"]').removeAttr('disabled');
		$('#mensajeSelectCausa').empty();
		$('#mensajeSelectCausa').append('<span style="color:green;" class="glyphicon glyphicon-ok"></span>');

	}

}

