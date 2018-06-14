var dialogUniv;
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
					$("#msnDialog").removeAttr("style");
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
	//console.log(getBase64FromImageUrl('../../recursos/images/cabecera.png'));
	$.ajax({
		url: "../../controlador/personal_campo/controladorInformeAct.php",
		type: "POST",
		data: "fechaI=" + fechaI + "&fechaF=" + fechaF,
		success: function (data) {
			var base64 = 'iVBORw0KGgoAAAANSUhEUgAABagAAAExCAYAAACZAkXJAAAgAElEQVR4Xuy9CXiV1bn+/ciQSUKAhAQyMSSBkDBPYZ4nGUQUBYWq1VpbOfa01v57tP8ev57ztZ5+tbTWg2NR6xFERBERZAjILGEeDAQCBDIxJUASMjF+1/3Qtc/OyN7JTvLunXtdl5cked/1rvVbb1B+ebife27fvn1bOEiABEiABEiABEiABEiABEiABEiABEiABEiABEiABEigngncQ0Fdz8T5OBIgARIgARIgARIgARIgARIgARIgARIgARIgARIgASVAQc0XgQRIgARIgARIgARIgARIgARIgARIgARIgARIgARIoEEIUFA3CHY+lARIgARIgARIgARIgARIgARIgARIgARIgARIgARIgIKa7wAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkECDEKCgbhDsfCgJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAFNd8BEiABEiABEiABEiABEiABEiABEiABEiABEiABEiCBBiFAQd0g2PlQEiABEiABEiABEiABEiABEiABEiABEiABEiABEiABCmq+AyRAAiRAAiRAAiRAAiRAAiRAAiRAAiRAAiRAAiRAAg1CgIK6QbDzoSRAAiRAAiRAAiRAAiRAAiRAAiRAAiRAAiRAAiRAAhTUfAdIgARIgARIgARIgARIgARIgARIgARIgARIgARIgAQahAAFdYNg50NJgARIgARIgARIgARIgARIgARIgARIgARIgARIgAQoqPkOkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJNAgBCuoGwc6HkgAJkAAJkAAJkAAJkAAJkED9E7h27Zrs339A0k6f0Ye3bt1KWgUE6K+Dg4PFv6W/BAUG1v/C+EQSIAESIAESIIFGS4CCutEePTdOAiRAAiRAAiRAAiRAAiTQGAgUFBQI/gkKCpJFi5dIaGh76dE9XkJDQyU7O1sR5OUXSH5enorr3EuXJCw0VDp27CBRnTuJv79/Y8DEPZIACZAACZAACTQQAQrqBgLPx5IACZAACZAACZAACZAACZBAXROAgH5v4YcyYvhQGTpksArqPn16S0DLlpK0a7c+3sfHR7p27SLdYrvK0ZRj+u+c3FzJzMzSamtfX1/p1aunfp6DBEiABEiA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6BMDTzZt3/yR+c8Tp6jzMCEJkAAJkAAJkEAaAYSneGzB43V9gF9ai5g6RmDK5LPM3E/PUYVKiZXF30128Ka9vv+9fyASEiABEiABEihEgAJ1IWzMRAKtTeCdzbvNwvuXmlWPyXEGIUxfeuN0c8GVU01b/4/jGrb69R/vbDJ/eOm35t8X/g8RxSdGzjB/dtnnzZ9deJX5RFv/VkfG9pMACZAACZBArxNA6Io1a141zy9dZg4fPtLr9+MN+oYAvKbnXj3HjB07pm8q0KR3pUDdpB3LZpEACZBAjQlQoK4xcN6OBJqJADyq3960y+x++73uZg05YaAZPupT5sQRjOcn9TU8qv/v3p3mP7as707yySEnmE+eNNp88sQRzWQibAsJkAAJkAAJNAwBCNXr39xgli1/kR7VDdNr8YrCYxr/KEzHWRVJQYG6CDXmIQESIAEScAlQoKZNkAAJkAAJkAAJkAAJkAAJkECOwIcffmh27tptPjh0yOzZ+645evQo+TQIgZNOGm7a29qy+Nv5eNsNUv2GqyYF6obrMlaYBEiABOqSAAXquuwWVooESIAESIAESIAESIAESIAESIAE6psABer67h/WjgRIgAQahQAF6kbpKdaTBEiABEiABEiABEiABEiABEiABOqIAAXqOuoMVoUESIAEGpgABeoG7jxWnQRIgARIgARIgARIgARIgARIgAT6igAF6r4iz/uSAAmQQHMRoEDdXP3J1pAACZAACZAACZAACZAACZAACZBATQhQoK4JZt6EBEiABJqeAAXqpu9iNpAESIAESIAESIAESIAESIAESIAEqk+AAnX1mbJEEiABEmhFAhSoW7HX2WYSIAESIAESIAESIAESIAESIAESKEmAAnVJgMxOAiRAAiSQEaBATUMgARIgARIgARIgARIgARIgARIgARJIJkCBOhkZM5AACZAACXgIUKCmWZAACZAACZAACZAACZAACZAACZAACSQToECdjIwZSIAESIAEKFDTBkiABEiABEiABEiABEiABEiABEiABKpBgAJ1NSiyDBIgARIgAXpQ0wZIgARIgARIgARIgARIgARIgARIgASSCVCgTkbGDCRAAiRAAh4CFKhpFiRAAiRAAiRAAiRAAiRAAiRAAiRAAskEKFAnI2MGEiABEiABCtS0ARIgARIgARIgARIgARIgARIgARIggWoQ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v/nsxOWvGU2oF2wJ/YZY2tv/+F1m81ob8bFAvfLhUKxdoA/zNuSeXWLLRH+PGXOyaHs+u0O/IJ9re+iD1WtezZwE8vez90LfV/t5p+HLNCRAAiRAAiTQFwSaRqDuC3i8JwmQAAmQAAmQAAmQAAmQAAmQAAmQAAmQAAmQAAmQQHECFKiLs2NOEiABEiABEiABEiABEiABEiABEiABEiABEiABEiCBEgQoUJeAx6wkQAIkQAIkQAIkQAIkQAIkQAIkQAIkQAIkQAIkQALFCVCgLs6OOUmABEiABEiABEiABEiABEiABEiABEiABEiABEiABEoQoEBdAh6zkgAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJFCdAgbo4O+YkARIgARIgARIgARIgARIgARIgARIgARIgARIgARIoQYACdQl4zEoCJEACJEACJEACJEACJEACJEACJEACJEACJEACJFCcAAXq4uyYkwRIgARIgARIgARIgARIgARIgARIgARIgARIgARIoAQBCtQl4DErCZAACZAACZAACZAACZAACZAACZAACZAACZAACZBAcQIUqIuzY04SIAESIAESIAESIAESIAESIAESIAESIAESIAESIIESBChQl4DHrCRAAiRAAiRAAiRAAiRAAiRAAiRAAiRAAiRAAiRAAsUJUKAuzo45SYAESIAESIAESIAESIAESIAESIAESIAESIAESIAEShCgQF0CHrOSAAmQAAmQAAmQAAmQAAmQAAmQAAmQAAmQAAmQAAkUJ0CBujg75iQBEiABEiABEiABEiABEiABEiABEiABEiABEiABEihBgAJ1CXjMSgIkQAIkQAIkQAIkQAIkQAIkQAIkQAIkQAIkQAIkUJzA/wdBuUFVqWtdxwAAAABJRU5ErkJggg==';
			var jsonInforme = jQuery.parseJSON(data);
			//console.log(base64, ' base 64');
			var contenido = '';
			$.each(jsonInforme, function (KEY, VALOR) {
				contenido += 'Nombre del defensor: ' + VALOR.Defensor + '\n';
				contenido += 'Nombre del usuario de servicio: ' + VALOR.Usuario + '\n';
				contenido += 'Fecha de registro: ' + VALOR.fecha_registro + '\n';
				contenido += 'Observaciones: ' + VALOR.observacion + '\n\n';
			});
var dd = {
	watermark: {text: 'www-oaxaca-gob-mx', color: 'gray', opacity: 0.3, bold: true, italics: false},pageSize: 'A4',
	// by default we use portrait, you can change it to landscape if you wish
	pageOrientation: 'portrait',
	header: {
		margin: [100,20,100,0],
		columns: [
			{
				// usually you would use a dataUri instead of the name for client-side printing
				// sampleImage.jpg however works inside playground so you can play with it
				image: 'data:image/png;base64,' + base64, width:400,height:50
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
			{text: 'Reyes Mantecón, San Bartolo Coyotepec, Oax; ___de_______ del 2018.\n'+
			'Periodo de___ ', style: 'subheader'},
		],
		style: 'header'},
		{text: '1.- ASESORÍAS JURÍDICAS', style: 'subheader2'},
		{text:'Con el objetivo de contribuir a una justicia pronta, expedita e imparcial, durante el periodo que comprende del ___ de _______ al ____ de ________ del presente año, la Defensoría Pública brindó _________servicios gratuitos de asesorías jurídicas generales, lo anterior se detalla de la siguiente manera:', style:'textoJustificado'},
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
						['Asesorías simples Jurídicas', ' ', ' '],
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
function cambiarDefensor(botn) {
	console.log(botn, ' valor del boton');
	$("#dialogoCambio").dialog({
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
	var botones = document.getElementsByName('idBoton');
	var botn = botones[llave];
	var divEsp = divs[llave];
	console.log('valor obssss ', divEsp.textContent);
	if(check.checked == true){ 
		divEsp.removeAttribute("style");
		botn.removeAttribute("style");
	}else{
		$('#mensajeCambios').empty();
		divEsp.setAttribute("style", "display:none");
		botn.setAttribute("style", "display:none");
	}

}
function guardarObs(llave, idResp){
	console.log(llave);
	var obs=document.getElementsByName('idObs');
	var dato = obs[llave].value;
	console.log(obs[llave].value, idResp);
	 $.ajax({
		url: "../../controlador/expediente/guardarObservacionRespuestas.php",
		type: "GET",
		data: "id_respuesta=" + idResp + "&observacion="+dato,
		success: function (data) {
			if(data != 0){
				console.log(data, ' valor data');
				$('#mensajeCambios').empty();
				$('#mensajeCambios').append('<span style = " display:none, color:green" class="glyphicon glyphicon-ok"> Se guardaron los cambios correctamente.');
			}else{
				console.log('ERROR', data);
				$('#mensajeCambios').empty();
				$('#mensajeCambios').append('<span style = " display:none, color:red" class="glyphicon glyphicon-remove"> No se detectaron cambios.');
			}
			
			
		}
	});
 

}
function verDetalleExp(llave) {//llave -> 0 exp1, 1 exp2 ....
	var lis = document.getElementsByName('myclasse');//[0].textContent;
	console.log(lis[llave].textContent, ' ver detall', llave);
	var numExp = lis[llave].textContent;
	
	//$(this).closest('tr').find('#idPersonal').text();	
	 $.ajax({
		url: "../../controlador/expediente/obtenerDetalleExpediente.php",
		type: "GET",
		data: "numExp=" + numExp,
		beforeSend: function () {
			dialogUniv = $("#dialogoDetalleExp").dialog({
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
						'<div class="col-md-6 col-sm-3 col-xs-12"><textarea readonly id="name" class="form-control" data-validate-length-range="6" 	data-validate-words="2" name="name" placeholder="Ingresa una respuesta" required="required" type="text">' + VALOR.respuesta + '</textarea></div>'+
			  '</div>'+
			  '<div style="float:right;" class="col-md-6 col-sm-3 col-xs-12">'+
			 	 '<div><label>'+
					'<input id="checkObservaciones" name="checkObservaciones" onchange="verObservacion(this, '+KEY+')" type="checkbox" unchecked data-switchery="true" /> Observaciones'+
			  	'</label></div>'+
			  	'<div><textarea id="idObs" name="idObs" style="display:none;" class="form-control" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Ingresa una respuesta" required="required" type="text">'+
			  VALOR.obsR+'</textarea></div><div><input type="button" id="idBoton" class="btn btn-success" name="idBoton" style="display:none" onclick="guardarObs('+KEY+', '+VALOR.id_respuesta+')" value="Guardar Observaciones"/> <div id = "mensajeCambios"></div></div></div>'+	
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

