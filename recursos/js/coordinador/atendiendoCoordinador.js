
$(document).ready(function () {


	$('#tebody').on('click', '.botonExp', function (evst) {
		//		  var target= $(event.target);
		//  var target= $(this.);
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
						VALOR.perfil = 'Aun no tiene escolaridad registrada.';
						VALOR.cedula_profesional = 'Aun no tiene escolaridad registrada.';
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
					$('#msnDialog').removeAttr("style");
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
function saveObservacion(idAct){
	
	var textA  = $('#textArea').get(0);
	console.log(idAct, 'id kllaksj');
	var obs= textA.value;
	//var dialog = $('#dialogoV');

	$.ajax({
		url: "../../controlador/actividad/cambiarObservacion.php",
		type: "GET",
		data: "observacion=" +  obs+ "&idAct="+idAct ,
		success: function (data) {
			console.log(data);
			if (data != 0) {
				console.log(data, ' Se guardaron correctamente los datos');
				//$('#menuContainer').load('listarActividades.php');
				//dialog.dialog("close");
				//window.location="index.php"
			} else {
				console.log('No se registró ningún cambio en las observaciones.');
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
	    '<div class="table-responsive x_content">' +
	  	'<img class="img-quad img-responsive" src="../../recursos/uploads/'+fotoVis+'" alt="" class="img-quad ">' +
 		'</div>');
	
}
function editarObservaciones(idAct) {
	console.log(idAct, ' ID ACTIVIDAD');
	$('#exampleModalLongObs').modal('show');
	$('#miActividadObs').empty();
	  $('#miActividadObs').append(
	    '<div class="table-responsive x_content">' +
			'<div class="col-md-12"><textarea id="textArea" value="" name="resultado" pattern="[a-z0-9.,:áéíóú ]+" 				data-error="solo numeros o letras en minisculas con minimo 10 caracter" rows="10" cols="150" minlength="10" 	maxlength="250" class="form-control col-md-4 col-xs-12" placeholder="describre el resultado observaciones"></textarea>'+
			'<div>'+
			'<button type="button" onclick="saveObservacion('+idAct+')" class="btn btn-success">Guardar Observaciones</button>'+
		'</div>');
}
function generarInformeAct() {
	var desc = $('#botonDesc').get(0);
	var fechaI = document.getElementById('inputInicio').value;
	var fechaF = document.getElementById('inputFinal').value;
	var actividad = '';
	var es_visita='';	
	var idAct;	
	var botonObservacion= '';
	var accion = '';
	var coordenadas = ' ';

	$.ajax({
		url: "../../controlador/personal_campo/controladorInformeAct.php",
		type: "POST",
		data: "fechaI=" + fechaI + "&fechaF=" + fechaF,
		success: function (data) {
			if (data != 0) {
				desc.disabled = false;
				//filtroActividades2(4);
				var jsonInforme = jQuery.parseJSON(data);
				$('#resultadoInforme').empty();
				$.each(jsonInforme, function (KEY, VALOR) {
					idAct = VALOR.idAct;
					console.log(idAct, ' iiiiiiiid de la actividad');
				botonObservacion ='<button type="button" onclick="editarObservaciones('+idAct+')"class="btn 					btn-default">	<span class="glyphicon glyphicon-ok"></span></button>';

				if(VALOR.latAse != null || VALOR.longAse != undefined){
					actividad = 'ASESORÍA';
					accion = '<button type="button" class="btn btn-success botonVerMapa" id="verDireccion" 				name="verDireccion" onclick = "verMapaDir(this)">Ver Localizacion</button>';
					coordenadas = '<td tabindex="0" class="sorting_1" id="idlatitud" style="display:none;">' + 						VALOR.latAse + '</td>' +
							  '<td tabindex="0" class="sorting_1" id="idlongitud" style="display:none;">' + 				VALOR.longAse +'</td>';
				}
				if(VALOR.latAud != null || VALOR.longAud != undefined){
					actividad = 'AUDIENCIA';
					accion = '<button type="button" class="btn btn-success botonVerMapa" id="verDireccion" name="verDireccion" onclick = "verMapaDir(this)">Ver Localizacion</button>';

					coordenadas = '<td tabindex="0" class="sorting_1" id="idlatitud" style="display:none;">' + 						VALOR.latAud + '</td>' +
							  	  '<td tabindex="0" class="sorting_1" id="idlongitud" style="display:none;">' + 		VALOR.longAud +'</td>';
				}
				if(VALOR.fotoVis != null || VALOR.fotoVis != undefined){
					actividad = 'VISITA CARCELARÍA';
					fotoVis = VALOR.fotoVis;
					accion = ' ';
					coordenadas = '';
					//console.log(fotoVis, 'valor fotoVis');
				}						
				if(actividad == 'VISITA CARCELARÍA'){
					es_visita = '<td tabindex="0"  class="sorting_1"> <a id="verFotoVisita">'+actividad+'</a>'+
					'<button type="button" onclick="verFotoVisita(this)" value = "'+fotoVis+'" class="btn btn-success">	<span class="glyphicon glyphicon-ok"></span></button>';
				
				}else{
					es_visita = '<td tabindex="0" class="sorting_1"> '+actividad+'';
				}
					if (VALOR.latitud == '' || VALOR.latitud == ' ') {
						VALOR.latitud = '16.909759';
					}
					if (VALOR.longitud == '' || VALOR.longitud == ' ') {
						VALOR.longitud = '-96.722320';
					}					
					$('#resultadoInforme').append(
						'<tr role="row" class="oven">' + //cla	ss ="oven" or "odd"
						'<td tabindex="0" class="sorting_1">' + VALOR.Defensor + '</td>' +
						'<td tabindex="0" class="sorting_1">' + VALOR.Usuario + '</td>' +
						'<td tabindex="0" class="sorting_1">' + VALOR.fecha_registro + '</td>' +
						'<td id="tdObservaciones" tabindex="0" class="sorting_1">' + VALOR.observacion + '</td>'+
							es_visita+botonObservacion+accion+'</td>'+
						coordenadas+
						'</tr>'
					);
				});
				//console.log('JJJJJJJJAAAAAAAASZZZZZ :#', jsonInforme[0]);
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


	console.log(lat, lon);
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
function getNumAsesoriasTO(jsonInforme){
	var asesorias = {};	
	var numAseT = 0;
	var numAseO = 0;
		$.each(jsonInforme, function (KEY, VALOR) {
			if(VALOR.latAse != null || VALOR.longAse != undefined){
				if(VALOR.sistema === 'TRADICIONAL'){
					numAseT++;
				}
				if(VALOR.sistema === 'ORAL'){
					numAseO++;
				}
			}
		});
		asesorias ['asesTradicional'] = numAseT;
		asesorias ['asesOral'] = numAseO;
	
	return asesorias;
}

function getNumActividades(jsonInforme){
	var actividades = {};	
	var numAses = 0;
	var numAuds = 0;
	var numVis = 0;	
		$.each(jsonInforme, function (KEY, VALOR) {
			if(VALOR.latAse != null || VALOR.longAse != undefined){
				numAses++;
			}
			if(VALOR.latAud != null || VALOR.longAud != undefined){
				numAuds++;
			}
			if(VALOR.fotoVis != null || VALOR.fotoVis != undefined){
				numVis++;
			}
		});
		actividades ['asesorias'] = numAses;
		actividades ['audiencias'] = numAuds;
		actividades ['visitas'] = numVis;
	return actividades;
}

function generarPDFActividades() {
	var fechaI = document.getElementById('inputInicio').value;
	var fechaFi = document.getElementById('inputFinal').value;
	var fecha1 = new Date(fechaI);
	var fecha2 = new Date(fechaFi);
	var actividades;
	var asesoriasTO;
	var meses = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Nomviembre", "Diciembre"];
	console.log(fecha1.getUTCDate(), meses[fecha1.getUTCMonth()]);
	//console.log(getBase64FromImageUrl('../../recursos/images/cabecera.png'));
	$.ajax({
		url: "../../controlador/personal_campo/controladorInformeAct.php",
		type: "POST",
		data: "fechaI=" + fechaI + "&fechaF=" + fechaFi,
		success: function (data) {
			var base64 = globalHeaderPDF;
			var jsonInforme = jQuery.parseJSON(data);
			//console.log(base64, ' base 64');
			console.log(getNumActividades(jsonInforme), ' Numero de actividades ');
			actividades = getNumActividades(jsonInforme);
			asesoriasTO = getNumAsesoriasTO(jsonInforme);
			console.log(asesoriasTO, '  nuuumero de aseroias por sistema');
/* 			var contenido = '';
			$.each(jsonInforme, function (KEY, VALOR) {
				contenido += 'Nombre del defensor: ' + VALOR.Defensor + '\n';
				contenido += 'Nombre del usuario de servicio: ' + VALOR.Usuario + '\n';
				contenido += 'Fecha de registro: ' + VALOR.fecha_registro + '\n';
				contenido += 'Observaciones: ' + VALOR.observacion + '\n\n';
			}); */
			var fecha = new Date();
			var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
			var fechaF = fecha.toLocaleDateString("es-ES", options);
			
			var primerM = fechaF.charAt(0).toUpperCase();
			var siguiente = fechaF.slice(1).toLowerCase();
			//console.log(fecha1, ' fecha actual ');
			var dd = {
	watermark: {text: 'www oaxaca gob mx', color: 'gray', opacity: 0.3, bold: true, italics: false},
	pageSize: 'A4',
	pageOrientation: 'portrait',
	header: {
		margin: [105,20,100,0],
		columns: [
			{
				// usually you would use a dataUri instead of the name for client-side printing
				// sampleImage.jpg however works inside playground so you can play with it
				image: 'data:image/png;base64,' + base64, width:400,height:60
			}
		]
	},
	footer: function (currentPage, pageCount) {
		return {
			table: {
				widths: ['*', 00],
				body: [
					[
						{ text: 'Pág. ' + currentPage + ' de ' + pageCount + '   ', alignment: 'center', bold: true, color:'gray' }
					]
				]
			},
			layout: 'noBorders',
		};
	},
	// [left, top, right, bottom] or [horizontal, vertical] or just a number for equal margins
	pageMargins: [80, 60, 40, 60],
	content: [
		{	stack: [
			'“2018, AÑO DE LA ERRADICACIÓN DEL TRABAJO INFANTIL”',
			{text: 'Reyes Mantecón, San Bartolo Coyotepec, Oax; '+primerM+siguiente+'.\n'+
			'Periodo de '+fechaI + ' a '+fechaFi, style: 'subheader'},
		],
		style: 'header'},
		{text: '1.- ASESORÍAS JURÍDICAS', style: 'subheader2'},
		{text:'Con el objetivo de contribuir a una justicia pronta, expedita e imparcial, durante el periodo que comprende del '+fecha1.getUTCDate()+' de '+meses[fecha1.getUTCMonth()]+' al '+fecha2.getUTCDate()+' de '+meses[fecha2.getUTCMonth()]+' del presente año, la Defensoría Pública brindó '+actividades['asesorias']+' servicios gratuitos de asesorías jurídicas generales, lo anterior se detalla de la siguiente manera:', style:'textoJustificado'},
		{
			style: 'tableExample',
			color: 'black',
			table: {
				headerRows: 1,
				// keepWithHeaderRows: 1,
				body: [
					[
						{text: 'Sistema de justicia', style: 'tableHeader', alignment:'center'},
						{text: 'Tradicional', style: 'tableHeader',  alignment: 'center'}, 
						{text: 'Acusatorio y oral', style: 'tableHeader', alignment:'center'},				
					],					
						['Asesorías simples Jurídicas', asesoriasTO['asesTradicional'], asesoriasTO['asesOral']],
				]
			}
		},
		{text:'Del total general de asesorías jurídicas, a continuación se desglosan los atributos de los beneficiarios:', style:'textoJustificado'},
		{
			style: 'tableExample',
			color: 'black',
			table: {
				widths: [200, 'auto', 'auto'],
				headerRows: 2,
				// keepWithHeaderRows: 1,
				body: [
					[
						{text: 'Atributos', rowSpan:2, style: 'tableHeader', alignment:'center'},{text: 'Sistema de justicia', style: 'tableHeader', colSpan: 2, alignment: 'center'}, {}, 
					],
					[
						{},
						{text: 'Tradicional', style: 'tableHeader', alignment: 'center'}, 
						{text: 'Acusatorío y Oral', style: 'tableHeader', alignment: 'center'}					
					],
					['1. SEXO', ' ', ' '],
					['2. GÉNERO', ' ', ' '],
					['3. EDAD', ' ', ' '],
					['4. ETNIA', ' ', ' '],
					['5. IDIOMA O LENGUA',' ', ' '],
					['6. DISCAPACIDAD',' ', ' ']
				]
			}
		},
		{text:'* Mostrar listado de los 10 defensores públicos que reportan un alto número de asesorías jurídicas brindadas en el periodo establecido en la búsqueda, así como los 10 defensores que reportan los números más bajos en  asesorías jurídicas, esto también por sistema. ', style:'textoJustificado'},
		{
			style: 'tableExample',
			color: 'black',
			table: {
				headerRows: 2,
				// keepWithHeaderRows: 1,
				body: [
					[
						{text: 'Sistema de justicia', style: 'tableHeader', alignment:'center'},
						{text: 'Defensor público', style: 'tableHeader',  alignment: 'center'}, {text: 'Lugar de adscripción', style: 'tableHeader', alignment:'center'}, 
						{text: 'Asesorías brindadas', style: 'tableHeader', alignment:'center'}
					],					
						['Tradicional', ' ', ' ',' '],
						['Acusatorio y oral', ' ', ' ',' ']
					]
			}
		},
		{text:' ', style:'saltoLinea'},
		{text: '2.- AUDIENCIAS', style: 'subheader2'},
		{text:'Durante el periodo que comprende del ___ de _______ al ____ de ________ del 			presente año, los Defensores Públicos asistieron a _______ audiencias celebradas.', style:'textoJustificado'
		},
		{text:'Por sistema__________ Sistema Tradicional: materia penal _____; materia civil ________; materia familiar _______; materia administrativa _______; materia agraria ________; materia ejecución de sanciones ________; tribunal de alzada _______. Sistema Acusatorio y oral: materia penal adultos __________; materia penal adolescentes ________; materia ejecución de sanciones ________.',style:'textoJustificado'},
		{text:'* Mostrar listado de los 10 defensores públicos que reportan un alto número de asistencia a audiencias en el periodo establecido en la búsqueda, así como los 10 defensores que reportan los números más bajos de asistencia en audiencias, esto también por sistema.',style:'textoJustificado'},
		{
			style: 'tableExample',
			color: 'black',
			table: {
				headerRows: 2,
				// keepWithHeaderRows: 1,
				body: [
					[
						{text: 'Sistema de justicia', style: 'tableHeader', alignment:'center'},
						{text: 'Defensor público', style: 'tableHeader',  alignment: 'center'}, {text: 'Lugar de adscripción', style: 'tableHeader', alignment:'center'}, 
						{text: 'Asistencia audiencias', style: 'tableHeader', alignment:'center'}
					],					
						['Tradicional', ' ', ' ',' '],
						['Acusatorio y oral', ' ', ' ',' ']
					]
			}
		},
		{text: '3.- VISITAS CARCELARÍAS', style: 'subheader2'},
		{text:'Durante el periodo que comprende del ___ de _______ al ____ de ________ del presente año, los Defensores Públicos realizaron ___________ visitas carcelarias a sus internos.', style:'textoJustificado'
		},
		{text:'Por sistema__________ Sistema Tradicional: materia penal _____; materia ejecución de sanciones ________ Sistema Acusatorio y oral: materia penal adultos __________; materia penal adolescentes ________; materia ejecución de sanciones ________.',style:'textoJustificado'},
		{text:'* Mostrar listado de los 10 defensores públicos que reportan un alto número de visitas carcelarias  en el periodo establecido en la búsqueda, así como los 10 defensores que reportan los números más bajos en visitas carcelarias , esto también por sistema.',style:'textoJustificado'},
		{
			style: 'tableExample',
			color: 'black',
			table: {
				headerRows: 2,
				// keepWithHeaderRows: 1,
				body: [
					[
						{text: 'Sistema de justicia', style: 'tableHeader', alignment:'center'},
						{text: 'Defensor público', style: 'tableHeader',  alignment: 'center'}, {text: 'Lugar de adscripción', style: 'tableHeader', alignment:'center'}, 
						{text: 'Visitas carcelarías', style: 'tableHeader', alignment:'center'}
					],					
						['Tradicional', ' ', ' ',' '],
						['Acusatorio y oral', ' ', ' ',' ']
					]
			}
		},
		{
			style: 'tableExample',
			color: 'black',
			table: {
				headerRows: 1,
				// keepWithHeaderRows: 1,
				body: [
					[
						{text: 'C.c.p.-', style:['quote', 'small']},
						{text: 'Mtro. Jesús Gerardo Herrera Pérez.- Director de la Defensoría 		Pública del Estado de Oaxaca.- 		Para su conocimiento e intervención.- 	Presente.-C.P Pablo R. López Santos.- Secretario Técnico.- Para 	mismo 	fin.- Presente	Exp. y minutario.', style:['quote', 'small']
						}
					]
					]
			},layout: 'noBorders'
		}
	],
	styles: {
		header: {
			fontSize: 8,
			bold: false,
			alignment: 'center',
			margin: [0, 40, 0, 10]
		},
		subheader: {
			fontSize: 10,
			alignment:'right',
			margin:[0,10,0,0]
		},
		textoJustificado:{
			fontSize: 11,
			alignment:'justify',
			margin:[0,0,15,15],
		},
		subheader2: {
			fontSize: 11,
			alignment:'left',
			margin:[0,0,15,15],
			bold:'true'
		},
		tableExample: {
			margin: [0, 5, 0, 15]
		},
		tableHeader: {
			bold: true,
			fontSize: 13,
			color: 'black'
		},
		saltoLinea:{
			margin:[0,100,0,0]
		},
		quote: {
			italics: true
		},
		small: {
			fontSize: 8
		}
	},
	defaultStyle: {
		// alignment: 'justify'
	}
	
}

			// print the PDF
			//pdfMake.createPdf(docDefinition).print();

			// download the PDF
			//pdfMake.createPdf(docDefinition).download('optionalName.pdf');
			pdfMake.createPdf(dd).open();
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
		$('#tebody').append('SELECCIONE UN FILTRO');

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
			data: "q=" + str,
			success: function (data) {
				if (data != 0) {
					var actividad = '';
					var es_visita='';	
					var idAct;	

					var botonObservacion= '';				
					var jsonInforme = jQuery.parseJSON(data);
					console.log(jsonInforme, ' data de actividades');
					$('#resultadoInforme').empty();
					$.each(jsonInforme, function (KEY, VALOR) {
						console.log(VALOR.idAct);
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
