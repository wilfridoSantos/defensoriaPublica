
$(document).ready(function () {
	$('#tablaAsinacionExpedienteusuario').on('click', '.eliminar', function (evst) {
		var desc = $('#botonDesc').get(0);
		  var target= $(this);
		  //console.log(target);
		  var eliminar = $(this).closest('tr');
		  var id_usuarioEliminar = $(this).closest('tr')[0].children[0].getAttribute("id_usuario_eliminar");;
		   //console.log("id",id_usuarioEliminar);
		   
		  var usuarios=$("#usuarios").val().split(",");
		  //console.log(usuarios);
		  usuarios.splice(usuarios.indexOf(id_usuarioEliminar),1);
		  $("#usuarios").val(usuarios.toString());
		  $(eliminar).remove();
		  $("#project").attr('disabled', false);
		  $("#project").val("");
		  desc.disabled= true;
	});
	$('#tablaAsinacionExpedienteusuarioP').on('click', '.eliminar', function (evst) {
		//var desc = $('#botonDesc').get(0);
		  var target= $(this);
		  //console.log(target);
		  var eliminar = $(this).closest('tr');
		  var id_usuarioEliminar = $(this).closest('tr')[0].children[0].getAttribute("id_usuario_eliminar");;
		   //console.log("id",id_usuarioEliminar);
		   
		  var usuarios=$("#usuarios").val().split(",");
		  //console.log(usuarios);
		  usuarios.splice(usuarios.indexOf(id_usuarioEliminar),1);
		  $("#usuarios").val(usuarios.toString());
		  $(eliminar).remove();
		  $("#project").attr('disabled', false);
		  $("#project").val("");
		  //desc.disabled= true;
	});
	$("input[type=radio][name=optradio]").change(function() {
		var desc = $('#botonDesc').get(0);
		var inputProject = $('#project').val();
		var checkDef = $('#checkId').get(0).checked;                                                              		

		if(this.id == "inputRadio1"){//informe por periodo			
			$("#divPeriodo").removeAttr('style');
			if(checkDef){
				if(inputProject != '' && myFunctionDate('') != false){
					desc.disabled= false;
				}
				//desc.disabled= true;
			}else{
				if(myFunctionDate('') != false){
					desc.disabled= false;
				}
				//desc.disabled= true;
			}						
		}
		if(this.id == "inputRadio2"){//informe  completo				
			$("#divPeriodo").attr('style','display:none');
			console.log(inputProject, ' valor del input project');
			if(checkDef){ 
				if(inputProject != ''){
					desc.disabled= false;
				}
			}else{
				desc.disabled= false;
			}	
		}
	}); 
	$("input[type=radio][name=optradioP]").change(function() {
		var desc = $('#botonDesc').get(0);
		var inputProject = $('#project').val();
		var checkDef = $('#checkId').get(0).checked;                                                              		

		if(this.id == "inputRadio1"){//informe por periodo			
			$("#divPeriodo").removeAttr('style');
			/* if(checkDef){
				if(inputProject != '' && myFunctionDate('')){
					desc.disabled= false;
				}
			}else{
				if(myFunctionDate('') != false){
					desc.disabled= false;
				}
			} */						
		}
		if(this.id == "inputRadio2"){//informe  completo				
			$("#divPeriodo").attr('style','display:none');
			/* console.log(inputProject, ' valor del input project');
			if(checkDef){ 
				if(inputProject != '' && selectSistema != ''){
					desc.disabled= false;
				}
			}else{
				if(selectSistema != ''){
					desc.disabled= false;
				}
			}	 */
		}
    }); 
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
			$("#labelFinal").hide();
			$("#labelFinal").removeClass(".alert alert-danger");
			generarInformeAct2(nue);
			return true;
		} else {			
//			$(".errors").removeClass();
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
	var inputProject = $('#project').val();
	var check = $('#checkId').get(0).checked;
	var inicio = $('#inputInicio')[0].value;
	var final = $('#inputFinal')[0].value;
	var labelFinal = document.getElementById('labelFinal');
	var desc = $('#botonDesc').get(0);

	if (inicio != '' && final != '') {
		var ini = new Date(inicio);
		var fin = new Date(final);
		var actual = (new Date).getFullYear();
		var ante = 2000;
		if ( ((ini < fin) || (ini == fin))) {
			console.log('ini es menor o igual a fin');
			if( fin.getFullYear() > actual){
				//$(".errors").remove();
				//$(".alert").remove();
				$("#labelFinal").show();
				labelFinal.setAttribute("class", "alert alert-danger");
				labelFinal.innerText="";
				labelFinal.innerText = "La fecha final debe ser menor al año actual!.";
				return false;
			}else if(ini.getFullYear()<ante){
				$("#labelFinal").show();
				labelFinal.setAttribute("class", "alert alert-danger");
				labelFinal.innerText="";
				labelFinal.innerText = "La fecha de inicio debe ser mayor al año 2000!.";
				return false;
			}else{					
				$("#labelFinal").hide();
				$("#labelFinal").removeClass(".alert alert-danger");
				return true;
			}
		} else {
			$("#labelFinal").show();
			labelFinal.setAttribute("class", "alert alert-danger");
			labelFinal.innerText="";
			labelFinal.innerText = "La fecha final debe ser mayor a la fecha de inicio!.";
			return false;
		}
	} 
	return false;
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
function saveObservacion(idAct) {

	var textA = $('#textArea').get(0);
	console.log(idAct, 'id kllaksj');
	var obs = textA.value;
	//var dialog = $('#dialogoV');

	$.ajax({
		url: "../../controlador/actividad/cambiarObservacion.php",
		type: "GET",
		data: "observacion=" + obs + "&idAct=" + idAct,
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
		'<img class="img-quad img-responsive" src="../../recursos/uploads/' + fotoVis + '" alt="" class="img-quad ">' +
		'</div>');

}
function editarObservaciones(idAct) {
	console.log(idAct, ' ID ACTIVIDAD');
	$('#exampleModalLongObs').modal('show');
	$('#miActividadObs').empty();
	$('#miActividadObs').append(
		'<div class="table-responsive x_content">' +
		'<div class="col-md-12"><textarea id="textArea" value="" name="resultado" pattern="[a-z0-9.,:áéíóú ]+" 				data-error="solo numeros o letras en minisculas con minimo 10 caracter" rows="10" cols="150" minlength="10" 	maxlength="250" class="form-control col-md-4 col-xs-12" placeholder="describre el resultado observaciones"></textarea>' +
		'<div>' +
		'<button type="button" onclick="saveObservacion(' + idAct + ')" class="btn btn-success">Guardar Observaciones</button>' +
		'</div>');
}
function generarInformeAct() {
	var desc = $('#botonDesc').get(0);
	var fechaI = document.getElementById('inputInicio').value;
	var fechaF = document.getElementById('inputFinal').value;
	var actividad = '';
	var es_visita = '';
	var idAct;
	var botonObservacion = '';
	var accion = '';
	var coordenadas = ' ';

	$.ajax({
		url: "../../controlador/personal_campo/controladorInformeAct.php",
		type: "POST",
		data: "fechaI=" + fechaI + "&fechaF=" + fechaF,
		success: function (data) {
			//console.log(data);
			if (data != 0) {
				desc.disabled = false;
				//filtroActividades2(4);
				var jsonInforme = jQuery.parseJSON(data);
				$('#resultadoInforme').empty();
				$.each(jsonInforme, function (KEY, VALOR) {
					idAct = VALOR.idAct;
					//console.log(idAct, ' iiiiiiiid de la actividad');
					botonObservacion = '<button type="button" onclick="editarObservaciones(' + idAct + ')"class="btn 					btn-default">	<span class="glyphicon glyphicon-ok"></span></button>';

					if (VALOR.latAse != null || VALOR.longAse != undefined) {
						actividad = 'ASESORÍA';
						accion = '<button type="button" class="btn btn-success botonVerMapa" id="verDireccion" 				name="verDireccion" onclick = "verMapaDir(this)">Ver Localizacion</button>';
						coordenadas = '<td tabindex="0" class="sorting_1" id="idlatitud" style="display:none;">' + VALOR.latAse + '</td>' +
							'<td tabindex="0" class="sorting_1" id="idlongitud" style="display:none;">' + VALOR.longAse + '</td>';
					}
					if (VALOR.latAud != null || VALOR.longAud != undefined) {
						actividad = 'AUDIENCIA';
						accion = '<button type="button" class="btn btn-success botonVerMapa" id="verDireccion" name="verDireccion" onclick = "verMapaDir(this)">Ver Localizacion</button>';

						coordenadas = '<td tabindex="0" class="sorting_1" id="idlatitud" style="display:none;">' + VALOR.latAud + '</td>' +
							'<td tabindex="0" class="sorting_1" id="idlongitud" style="display:none;">' + VALOR.longAud + '</td>';
					}
					if (VALOR.fotoVis != null || VALOR.fotoVis != undefined) {
						actividad = 'VISITA CARCELARÍA';
						fotoVis = VALOR.fotoVis;
						accion = ' ';
						coordenadas = '';
						//console.log(fotoVis, 'valor fotoVis');
					}
					if (actividad == 'VISITA CARCELARÍA') {
						es_visita = '<td tabindex="0"  class="sorting_1"> <a id="verFotoVisita">' + actividad + '</a>' +
							'<button type="button" onclick="verFotoVisita(this)" value = "' + fotoVis + '" class="btn btn-success">	<span class="glyphicon glyphicon-ok"></span></button>';

					} else {
						es_visita = '<td tabindex="0" class="sorting_1"> ' + actividad + '';
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
						'<td tabindex="0" class="sorting_1">' + VALOR.generoU + '</td>' +
						'<td id="tdObservaciones" tabindex="0" class="sorting_1">' + VALOR.sistema + '</td>' +
						es_visita + botonObservacion + accion + '</td>' +
						coordenadas +
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
	$('#modalVisualizarExpediente').modal('show');
	var idExpediente=$(botn).closest('tr')[0].children[1].getAttribute('id_expediente');
	var idPersonal=$(botn).closest('tr')[0].children[1].getAttribute('id_personal');
     console.log(idExpediente);
     console.log(idPersonal);
	// $(this).closest('tr')[0].children[0].getAttribute("id_usuario_eliminar")
	 //idPersonal=19;
	 //idExpediente=9;
	$.ajax({
		url: "../../controlador/coordinador/tarjetaInformativa.php",
		type: "GET",
		data: "id_personal=" + idPersonal + "& id_expediente=" + idExpediente,
		success: function (data) {
			console.log(data,' resultado de data');
			if (data != 0) {
				//var jsonExpDef = jQuery.parseJSON(data);
				//descarga.on("click", function(){ descargarPDF(jsonExpDef); });
				//console.log(data,' resultado de data');
				//$('#id_tarjetaInformativa').empty();
				$("#usuarioServicio").empty()
				$("#involucrado").empty()
				$("#situacionAnterior").empty();
				$("#accionImplementarAnterior").empty();
				$("#situacionActual").empty();
				$("#accionImplementar").empty();

				$("#numExpediente").empty().html(data.expediente[0].num_expediente);
				$("#delito").empty().html(data.expediente[0].nombre_delito)
				$.each(data.usuarioServicio, function (KEY, VALOR) {
					
				$("#usuarioServicio").append("<p>"+VALOR.nombreCompleto+"</p>")
				});
				$.each(data.usuarioContraparte, function (KEY, VALOR) {
					
					$("#involucrado").append("<p>"+VALOR.nombreCompleto+"</p>")
				});
				console.log("respusta 2 ",data.respuestas[1]);
				console.log("respusta 1",data.respuestas[0]);

				if(data.respuestas[1]!==undefined){
					$("#situacionAnterior").empty().html(data.respuestas[1].respuesta)
					$("#accionImplementarAnterior").empty().html(data.respuestas[1].accion_implementar);
				}
				if(data.respuestas[0]!==undefined){
					$("#situacionActual").empty().html(data.respuestas[0].respuesta)
					$("#accionImplementar").empty().html(data.respuestas[0].accion_implementar);
			    }
			

			} else {
				$('#tebody').empty();
			
			}
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
							'<td> <textarea rows="2%"  disabled cols="45" minlength="10" maxlength="250"style="background-color:transparent; border:none;color:#000000; " readonly class="form-control col-md-5 col-xs-12">'+VALOR.observaciones+'</textarea></td>'+                                                     
					
							//'<td style="white-space:nowrap;">' + VALOR.observaciones + '</td>' +
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
function dataDefensor(){
	//console.log("defenwsor en atendiendoCoordinador");
	
    $.ajax({
      type: 'GET',
    //  url: '../../controlador/defensor/controladorListaDef.php?term=busqueda',
	url: '../../controlador/defensor/listatodosDefensores.php?term=busqueda',  
	success: function (data) {
		  //console.log("data del defensor en ajax ",data);
		  		 		
		 functionInputDefensores(data);
      },
      error: function () {
		  alert('Error peticion Ajax ');
      }
      });
      
}
function functionInputDefensores(dataDefe){
	//console.log("datos en input def ",dataDefe);
	
	var desc = $('#botonDesc').get(0);
    var varUsuario=[];
	var datos = $.parseJSON(dataDefe);
	//console.log(datos, 'valor datos en functionInputDefensores');
    $.each(datos, function (KEY, VALOR) {
        var temp={};
        if(VALOR.id_personal > 0){
            temp['label']=VALOR.nombre;
            temp['apellidos']=VALOR.ap_paterno+" "+VALOR.ap_materno;
            temp['desc']=VALOR.colonia+", "+VALOR.municipio;
			temp['id_usuario']=VALOR.id_personal;   
			//$('#idDefensor').get(0).value = VALOR.id_personal;         
            varUsuario.push(temp);
        }
    });
    $( function() {
        function log( message ) {
            var usuario=message.item.label+" "+message.item.apellidos;
            if($("#usuarios").val()!= " " || $("#usuarios").val()!= ""){//PRIMERO CHECO SI ESQUE EL USUARIO NO FUE YA INSERTADO
                $('#usuarioSeleccionados').empty();
                var tr=document.createElement("tr");                
                var td=document.createElement("td");
                tr.appendChild(td);
                $( td ).text( usuario );// A ESTE TD LE ASIGO AL USUARIO DEL SERVICIO
                td.setAttribute("id_usuario_eliminar",message.item.id_usuario);        
                $("#usuarioSeleccionados").append(tr);
                var td2=document.createElement("td");         
                $("#usuarios").val(message.item.id_usuario);          
                $(td2).append("<button type='button' class='btn btn-primary eliminar '><span class='glyphicon glyphicon-remove' aria-hidden='true'> </span> </button>");   
                tr.appendChild(td2);
            }   
            $("#project").attr('disabled', true);//SIEMPRE LIMPIA EL INPUT DE BUSQUEDA  // $( "#usuarioSeleccionados" ).scrollTop( 0 );
        }///TERMINA LA FUCION
        $( "#project" ).autocomplete({
            minLength: 0,
            source: varUsuario,
            focus: function( event, ui ) {
            $( "#project" ).val(ui.item.label+" "+ ui.item.apellidos );
            return false;
         },
         select: function( event, ui ) {
            var usuario=ui.item.label+" "+ui.item.apellidos;     
			log(ui);
			$('#idDefensor').get(0).value = ui.item.id_usuario;  
			console.log($('#idDefensor').val(),'valor id actual del defensor seleccionado');
            return false;
         }
       }).autocomplete("instance")._renderItem = function( ul, item ) {
            return $( "<li>" )
           .append( "<div>" + item.label+" "+item.apellidos+ "<br>" + item.desc + "</div>" )
           .appendTo( ul );
       };
	 });
	 
	 
}
function estadoInputParcial(val){
	var desc = $('#botonDesc').get(0);
	var selectSistema = $('#selectSistema').val();
	var check = $('#checkId').get(0).checked;
	var rParcialC = $('#inputRadio4').get(0).checked;
	var rParcialP = $('#inputRadio3').get(0).checked;
	var inicio = $('#inputInicio')[0].value;
	var final = $('#inputFinal')[0].value;
	console.log('fuera del if dentro estadoIo=nput');
	if(rParcialC){//radio parcial completo
		if(check){//check defensor unico
			if(val != '' && selectSistema != '' ){
				desc.disabled= false;
				return true;				
			}
		}else{
			if(selectSistema != '' ){
				desc.disabled= false;
				return true;				
			}
			desc.disabled= true;
			return false;                                   
		}
		
	}
	if(rParcialP){// radio general x periodo de tiempo
		if(check){//check defensor unico
			if(val != '' ){//input no vacio?
				if(myFunctionDate('') != false && selectSistema != '') {
					desc.disabled= false;
					return true;
				}
				desc.disabled= true;
				return false;				
			}
				desc.disabled= true;
				return false;	
		}else{
			if(myFunctionDate('') != false && selectSistema!='') {
				desc.disabled= false;
				return true;
			}
			desc.disabled= true;
			return false;	
		}
		desc.disabled= true;
		return false;	
	}
}
function estadoInput(val){
	var desc = $('#botonDesc').get(0);
	//var selectSistema = $('#selectSistema').val();
	var check = $('#checkId').get(0).checked;
	var rGeneralC = $('#inputRadio2').get(0).checked;
	var rGeneralP = $('#inputRadio1').get(0).checked;
	/* 	var rParcialC = $('#inputRadio4').get(0).checked;
	var rParcialP = $('#inputRadio3').get(0).checked; */
	var inicio = $('#inputInicio')[0].value;
	var final = $('#inputFinal')[0].value;
	console.log('fuera del if dentro estadoIo=nput');
	if(rGeneralC){//radio general completo
		if(check){//check defensor unico
			if(val != '' ){
				desc.disabled= false;
				return true;				
			}
			desc.disabled= true;
				return false;
		}
			desc.disabled= false;
			return true;	
	}
	if(rGeneralP){// radio general x periodo de tiempo
		if(check){//check defensor unico
			if(val != '' ){//input no vacio?
				if(myFunctionDate('') != false) {
					desc.disabled= false;
					return true;
				}		
				desc.disabled= true;
				return false;				
			}			
			desc.disabled= true;
				return false;
		}else{
			if(myFunctionDate('') != false) {
				desc.disabled= false;
			}			
				desc.disabled= true;
				return false;
		}
	}	
	desc.disabled= true;
		return false;
}
function seleccionarUnDefensorParcial(val){//checkdefensor especifico
	console.log(val, ' valor parametro val');
	var desc = $('#botonDesc').get(0);	
	var rParcialC = $('#inputRadio4').get(0).checked;
	var rParcialP = $('#inputRadio3').get(0).checked;
	var inicio = $('#inputInicio')[0].value;
	var final = $('#inputFinal')[0].value;
	var selectSistema  = $('#selectSistema').val();
	var inputProject = $('#project').val();
	if(val){
		$('#idCheckDefensor').removeAttr('style'); //entonces muestra su input
		//dataDefensor();
	}else{
		$("#idCheckDefensor").attr('style','display:none');
	}
	if(rParcialC){
		$("#divPeriodo").attr('style', 'display:none;');		
		if(val){//esta activada el check defensor esp?  	
			if(inputProject != '' && selectSistema != ''){
				desc.disabled= false;
				return true;
			}
			desc.disabled= true;
			return false;
		}else{
			if(selectSistema != ''){
				desc.disabled= false;
				return true;
			}
			desc.disabled= true;
			return false;
		}
	}
	if(rParcialP){//esta activado por periodo
		$("#divPeriodo").removeAttr('style');
		if(val){//esta activada el check defensor esp?     
			if(myFunctionDate('') != false && inputProject != '' && selectSistema != ''){
				desc.disabled= false;
				return true;
			}
			desc.disabled= true;
			console.log('se congelo bpoton porque no hay');
			return false;		
		}else{//check defensor esta desact
			if (myFunctionDate('') != false && selectSistema != ''){
				desc.disabled= false;
				return true;
			}
			desc.disabled= true;
			return false; 
		}
		desc.disabled= true;
		return false;
	}
}
function seleccionarUnDefensor(val){//checkdefensor especifico
	var desc = $('#botonDesc').get(0);	
	var rGeneralC = $('#inputRadio2').get(0).checked;
	var rGeneralP = $('#inputRadio1').get(0).checked;
	var selectAtributos =$('#selectAtributos');
	//var rParcialC = $('#inputRadio4').get(0).checked;
	//var rParcialP = $('#inputRadio3').get(0).checked;
	var inicio = $('#inputInicio')[0].value;
	var final = $('#inputFinal')[0].value;
	var inputProject = $('#project').val();
	if(val){
		$('#idCheckDefensor').removeAttr('style'); 
		dataDefensor();
		//entonces muestra su input
		//$('#sistemaAtributos').attr('style','display:none');
		$("#selectAtributos option[value='TOP']").remove();
	}else{
		$("#idCheckDefensor").attr('style','display:none');	
		selectAtributos.append('<option value="TOP">Top Defensores</option>');
	}
	if(rGeneralC){
		$("#divPeriodo").attr('style', 'display:none;');		
		if(val){//esta activada el check defensor esp?  	
			if(inputProject != ''){
				desc.disabled= false;
				return true;
			}
			desc.disabled= true;
			return false;
		}else{
			desc.disabled= false;
			return true;
		}
	}
	if(rGeneralP){//esta activado por periodo
		$("#divPeriodo").removeAttr('style');
		if(val){//esta activada el check defensor esp?     
			if(myFunctionDate('') != false && inputProject != ''){
				desc.disabled= false;
				return true;
			}
			desc.disabled= true;
			console.log('se congelo bpoton porque no hay');
			return false;		
		}else{//check defensor esta desact
			if (myFunctionDate('') != false){
				desc.disabled= false;
				return true;
			}
			desc.disabled= true;
			return false; 
		}
		desc.disabled= true;
		return false;
	}
}

function verObservacion(check, llave) {
	var divs = document.getElementsByName('idObs');
	var divEsp = divs[llave];
	if (check.checked == true) {
		//var checks=document.getElementsByName('checkObservaciones');
		console.log(divEsp);
		divEsp[0].textContent = '<h3>lasjlak</h3>';
		//divEsp.append('<textarea class="col-md-4">jkhakjdhakj</textarea>');
	} else {
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



					'<div class="col-md-6 col-sm-3 col-xs-12"><textarea id="name" class="form-control" data-validate-length-range="6" 	data-validate-words="2" name="name" placeholder="Ingresa una respuesta" required="required" type="text">' + VALOR.respuesta + '</textarea></div>' +

					'</div>' +
					'<div class="col-md-6 col-sm-3 col-xs-12">' +
					'<div><label>' +
					'<input id="checkObservaciones" name="checkObservaciones" onchange="verObservacion(this, ' + KEY + ')" type="checkbox" unchecked data-switchery="true" > Observaciones' +
					'</label></div>' +
					'<div id="idObs" name="idObs" ><textarea id="txtA" name="txtA" style="display:none;"></textarea></div>' +
					'</div>');
			});
		}
	});
};
function validarFecha(e, elemento) {  
	var fechas= document.getElementById("").value;
	  
	  //console.log(fechas);
	  var ano=fechas.split('-')[0];
	  var mes=fechas.split('-')[1];
	  var dia=fechas.split('-')[2];
	  
	  
	//   alert("fff");
	var date = new Date()
	//   var error=elemento.parentElement.children[1];
	var error=elemento.parentElement;
  
	// removeChild
	
	var ul=document.createElement('li');
	//  ul.setAttribute("class", "errors");
		  if(ano == "" || ano.length < 4 || ano.search(/\d{4}/) != 0)
		  {
		$(".errors").remove();
		ul.setAttribute("class", "errors");
			ul.innerText="solo 4 digito";
			error.appendChild(ul);
	  
			  return false;
		  }   
	  
	if(ano <date.getFullYear() || ano > date.getFullYear())
	  { 
		console.log(" año invalida");
	  $(".errors").remove();
		ul.setAttribute("class", "errors");
  
		ul.innerText="año invalida";
		error.appendChild(ul);
			  return false;
	  } 
	  else{
		$(".errors").remove();
	  }  
	
  
	  if(mes < date.getMonth()+1 || mes > date.getMonth()+1)
	  { 
		console.log("mes invalida");
	  $(".errors").remove();
		ul.setAttribute("class", "errors");
  
		ul.innerText="Mes invalida";
		error.appendChild(ul);
			  return false;
	  } 
	  else{
		$(".errors").remove();
	  } 
  
	  if(dia < date.getDate()-5 || dia > date.getDate())
	  { 
		console.log("fecha invalida");
	  $(".errors").remove();
		ul.setAttribute("class", "errors");
  
		ul.innerText="Dia invalida";
		error.appendChild(ul);
			  return false;
	  } 
	  else{
		$(".errors").remove();
	  } 
		  
	  
	  
	  intMes  = parseInt(dia);
	  intDia  = parseInt(mes);
	  intano=parseInt(ano);
  
	  
	  console.log( date.getYear());
  }
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
	var fotoVis = '';
	var active = false;
	if (str == "") {
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
					var es_visita = '';
					var idAct;

					var botonObservacion = '';
					var jsonInforme = jQuery.parseJSON(data);
					//console.log(jsonInforme, ' data de actividades');
					$('#resultadoInforme').empty();
					$.each(jsonInforme, function (KEY, VALOR) {
						//console.log(VALOR.idAct);
						idAct = VALOR.idAct;

						botonObservacion = '<button type="button" onclick="editarObservaciones(' + idAct + ')"class="btn btn-default">	<span class="glyphicon glyphicon-ok"></span></button>';
						if (VALOR.latAse != null || VALOR.longAse != undefined) {
							actividad = 'ASESORÍA';
						}
						if (VALOR.latAud != null || VALOR.longAud != undefined) {
							actividad = 'AUDIENCIA';
						}
						if (VALOR.fotoVis != null || VALOR.fotoVis != undefined) {
							actividad = 'VISITA CARCELARÍA';
							fotoVis = VALOR.fotoVis;
							//console.log(fotoVis, 'valor fotoVis');
						}
						if (actividad == 'VISITA CARCELARÍA') {
							es_visita = '<td tabindex="0"  class="sorting_1"> <a id="verFotoVisita">' + actividad + '</a>' +
								'<button type="button" onclick="verFotoVisita(this)" value = "' + fotoVis + '" class="btn btn-success">	<span class="glyphicon glyphicon-ok"></span></button>';

						} else {
							es_visita = '<td tabindex="0" class="sorting_1"> ' + actividad + '';
						}
						$('#resultadoInforme').append(
							'<tr role="row" class="oven">' + //cla	ss ="oven" or "odd"
							'<td id="verDialog" tabindex="0" class="sorting_1">' + VALOR.Usuario + '</td>' +
							'<td tabindex="0" class="sorting_1">' + VALOR.fechaR + '</td>' +
							'<td id="tdObservaciones" tabindex="0" class="sorting_1">' + VALOR.observaciones + '</td>' +
							es_visita + botonObservacion + '</td>' +
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
function seleccionFiltro(val){
	var arr = listaMAtributos();
	var selectAtributos =$('#selectAtributos');
	console.log($('#selectAtributos').val(), ' VALOR DE ATRIBUTOS');
	var sistema = $('#selectSistema').val();
	var check = $('#checkId').get(0).checked;
	var region = $('#selectRegion').val();
	switch(val){
		case 'MATERIA':
		
			if($('#selectSistema').val()!=''){
				$.ajax({
					url: "../../controlador/consultas/parciales.php",
					type: "POST",
					data: {"sistema":$('#selectSistema').val(),"filtro":$('#selectFiltro').val()},
					success: function (data) {							
						var jsonInforme = jQuery.parseJSON(data);										
						//console.log(data, ' resultado consulta');
						$('#selectMateria').empty();
						$('#selectMateria').append('<option value=""> Seleccione una materia </option>');	
						$.each(jsonInforme, function(k,v){

							$('#selectMateria').append('<option value='+v.materia+'> '+v.materia+' </option>');	
						});
					}
				});
			}
			arr = listaMAtributos();
			if(arr.find(function(c){return (c=='MATERIA')}) != undefined){
				$("#selectAtributos option[value='MATERIA']").remove();
				
			}
			if(arr.find(function(c){return (c=='REGION')}) == undefined){
				selectAtributos.append('<option value="REGION">Region</option>');
			}
			$('#vistaRegion').attr('style','display:none');
			$('#vistaMateria').removeAttr('style');
			
		break;
		case 'REGION':
				arr = listaMAtributos();
					if(arr.find(function(c){return (c=='REGION')}) != undefined){
						$("#selectAtributos option[value='REGION']").remove();
						
					}
					if(arr.find(function(c){return (c=='MATERIA')}) == undefined){
						selectAtributos.append('<option value="MATERIA">Materia</option>');
					}
					$('#vistaMateria').attr('style','display:none');

					$('#vistaRegion').removeAttr('style');	
		break;
		case 'AMBAS':
			if($('#selectSistema').val()!=''){
				$.ajax({
					url: "../../controlador/consultas/parciales.php",
					type: "POST",
					data: {"sistema":$('#selectSistema').val(),"filtro":'MATERIA'},
					success: function (data) {							
						var jsonInforme = jQuery.parseJSON(data);										
						//console.log(jsonInforme, ' resultado consulta');
						//$('#selectRegion').empty();
						//$('#selectMateria').empty();
						//console.log('llenando region');
						/* $.each(jsonInforme['region'], function(k,v){							
							$('#selectRegion').append('<option value='+v.region+'> '+v.region+' </option>');	
						});  */
						$('#selectMateria').empty();
						$('#selectMateria').append('<option value=""> Seleccione una materia </option>');	
						$.each(jsonInforme, function(k,v){

							$('#selectMateria').append('<option value='+v.materia+'> '+v.materia+' </option>');	
						});
					}
				});
			}
				arr = listaMAtributos();
					if(arr.find(function(c){return (c=='REGION')}) != undefined){
						$("#selectAtributos option[value='REGION']").remove();						
					}
					if(arr.find(function(c){return (c=='MATERIA')}) != undefined){
						$("#selectAtributos option[value='MATERIA']").remove();						
					}
			$('#vistaMateria').removeAttr('style');
			$('#vistaRegion').removeAttr('style');			
		break;
		case 'NINGUNO':	

		$.ajax({
			type: 'GET',
			url: '../../controlador/defensor/controladorListaDef.php?term=busqueda',
			data:"sistema="+$('#selectSistema').val(),
			success: function (data) {
				if(data != 0 ){
					console.log(data,'defensores by filtroo NINGUNO');	
					$('#project').val('');	 		
					functionInputDefensores(data);
				}else{
					$('#project').val('NO HAY DEFENSORES!');
				}
			},
			error: function () {
				alert('Error peticion Ajax ');
			}
		});
				arr = listaMAtributos();
				if(arr.find(function(c){return (c=='REGION')}) == undefined){
					selectAtributos.append('<option value="REGION">Región</option>');						
				}
				if(arr.find(function(c){return (c=='MATERIA')}) == undefined){
					selectAtributos.append('<option value="MATERIA">Materia</option>');
				}
			$('#vistaMateria').attr('style','display:none');
			$('#vistaRegion').attr('style','display:none');
			
		break;
		default:
		break;
	}
};
function seleccionRegion(val){
	var filtro = $('#selectFiltro').val();
	var check = $('#checkId').get(0).checked;
	//console.log($('#selectSistema').val(), val, ' VALOR SISTEMA Y MATERIA');
	if(val!=''){
	switch(filtro){
		case 'REGION':
				//var checkDef = $('#checkId').get(0).checked;			
					$.ajax({
						type: 'GET',
						url: '../../controlador/defensor/controladorListaDef.php?term=busqueda',
						data:"sistema="+$('#selectSistema').val()+"&region="+val,
						success: function (data) {
							if(data != 0 ){
								//console.log(data,'defensores by region');	
								$('#project').val('');	 		
								   functionInputDefensores(data);
							}else{
								$('#project').val('NO HAY DEFENSORES!');
							}
						},
						error: function () {
							alert('Error peticion Ajax ');
						}
						});
						/* if(check){
							$("#selectAtributos option[value='REGION']").remove();
							$("#selectAtributos option[value='MATERIA']").remove();
						}else{
							selectAtributos.append('<option value="MATERIA">Region</option>');
							selectAtributos.append('<option value="REGION">Region</option>');
						} */
		break;
		case 'AMBAS':	
						var materia = $('#selectMateria').val();
						if(materia !=''){
							$.ajax({
								type: 'GET',
								url: '../../controlador/defensor/controladorListaDef2.php?term=busqueda',
								data:"sistema="+$('#selectSistema').val()+"&region="+val+"&materia="+materia,
								success: function (data) {
									console.log(data, '  FILTRO AMBAS REGION', val);
									if(data != 0 ){
										//console.log(data,'defensores BY 2 FILTRO');	
										$('#project').val('');	 		
										   functionInputDefensores(data);
									}else{
										$('#project').val('NO HAY DEFENSORES!');
									}
								},
								error: function () {
									alert('Error peticion Ajax ');
								}
								});
						}
		break;
					}
				}
};
function seleccionMateria(val){
	var filtro = $('#selectFiltro').val();
	var check = $('#checkId').get(0).checked;
	console.log($('#selectSistema').val(), val, ' VALOR SISTEMA Y MATERIA');
	switch(filtro){
		case 'MATERIA':
			$.ajax({
				type: 'GET',
				url: '../../controlador/defensor/controladorListaDef.php?term=busqueda',
				data:"sistema="+$('#selectSistema').val()+"&materia="+val,
				success: function (data) {
					if(data != 0 ){
						console.log(data,'defensores by filtroo MATERIA');	
						$('#project').val('');	 		
						functionInputDefensores(data);
					}else{
						$('#project').val('NO HAY DEFENSORES!');
					}
				},
				error: function () {
					alert('Error peticion Ajax ');
				}
			});	
			/* if(check){
				//selectAtributos.append('<option value="REGION">Region</option>');
				$("#selectAtributos option[value='TOP']").remove();
			}else{
				selectAtributos.append('<option value="TOP">Top Defensores</option>');

			}
			selectAtributos.append('<option value="REGION">Región</option>'); */
					
		break;

	}
							
					
};
function myFunctionSistemaParcial(val){// aqui tambien debe checar por radio en que se encuentra
		var arr = listaMAtributos();
		if(val!=''){
			switch($('#selectFiltro').val()){
				case 'MATERIA':
				arr = listaMAtributos();					
						$.ajax({
							url: "../../controlador/consultas/parciales.php",
							type: "POST",
							data: {"sistema":$('#selectSistema').val(),"filtro":$('#selectFiltro').val() },
							success: function (data) {							
								var jsonInforme = jQuery.parseJSON(data);										
								//console.log(data, ' resultado consulta');
								$('#selectMateria').empty();
								$('#selectMateria').append('<option value=""> Seleccione una materia </option>');	

								console.log('llenando materia');
								$.each(jsonInforme, function(k,v){
									
									$('#selectMateria').append('<option value='+v.materia+'> '+v.materia+' </option>');	
								});
							}
						});
					if(arr.find(function(c){return (c=='MATERIA')}) != undefined){
						$("#selectAtributos option[value='MATERIA']").remove();
						
					}
					if(arr.find(function(c){return (c=='REGION')}) == undefined){
						selectAtributos.append('<option value="REGION">Region</option>');
					}
					
					$('#vistaRegion').attr('style','display:none');
					$('#vistaMateria').removeAttr('style');
				break;
				case 'REGION':
					arr = listaMAtributos();
					if(arr.find(function(c){return (c=='REGION')}) != undefined){
						$("#selectAtributos option[value='REGION']").remove();
						
					}
					if(arr.find(function(c){return (c=='MATERIA')}) == undefined){
						selectAtributos.append('<option value="MATERIA">Region</option>');
					}
					$('#vistaMateria').attr('style','display:none');
					$('#vistaRegion').removeAttr('style');
				break;
				case 'AMBAS':
					$.ajax({
						url: "../../controlador/consultas/parciales.php",
						type: "POST",
						data: {"sistema":$('#selectSistema').val(),"filtro":"MATERIA"},
						success: function (data) {							
							var jsonInforme = jQuery.parseJSON(data);										
							console.log(jsonInforme, ' resultado consulta');
							$('#selectMateria').empty();
							$.each(jsonInforme, function(k,v){
	
								$('#selectMateria').append('<option value='+v.materia+'> '+v.materia+' </option>');	
							});
						}
					});
					arr = listaMAtributos();
					if(arr.find(function(c){return (c=='REGION')}) != undefined){
						$("#selectAtributos option[value='REGION']").remove();						
					}
					if(arr.find(function(c){return (c=='MATERIA')}) != undefined){
						$("#selectAtributos option[value='MATERIA']").remove();						
					}
					$('#vistaMateria').removeAttr('style');
					$('#vistaRegion').removeAttr('style');			
				break;
				case 'NINGUNO':
					arr = listaMAtributos();
					if(arr.find(function(c){return (c=='REGION')}) == undefined){
						selectAtributos.append('<option value="REGION">Región</option>');						
					}
					if(arr.find(function(c){return (c=='MATERIA')}) == undefined){
						selectAtributos.append('<option value="MATERIA">Materia</option>');
					}					
			
					$('#vistaMateria').attr('style','display:none');
					$('#vistaRegion').attr('style','display:none');
				break;
				default:
				break;
			}
	}
};
function myFunctionSistema(val){// aqui tambien debe checar por radio en que se encuentra
	var inicio = $('#inputInicio').val();
	var final = $('#inputFinal').val();
	var check = $('#checkId').get(0).checked;
	var rGeneralC = $('#inputRadio2').get(0).checked;
	var rGeneralP = $('#inputRadio1').get(0).checked;

	var selProject = $('#project').val();
	//var selectSistema = $('#selectSistema').get(0); 
	var desc = $('#botonDesc').get(0);   
	console.log(check, "valor seleccionadpo");
	if(rGeneralP){//esta activado por periodo
		if (inicio != '' && final != '' ) {
			var ini = new Date(inicio);
			var fin = new Date(final);
			if((fin > ini)  && val !=''){
				if(check){
					if(	selProject != ''){
						desc.disabled = false;
						return true;
					}
					desc.disabled = true;
					return false;
				}
				desc.disabled = false;
					return true;			
			}else{
				desc.disabled = true;
				return false;
			}
		} else {
			//console.log('entro false');
			desc.disabled = true;
			return false;
		}
	} 
	if(rGeneralC){//esta activado por periodo
		if(check){
			if(inputProject != '' ){
				desc.disabled = false;
			}
			desc.disabled = true;
		}else{			
			desc.disabled = false;
		}
	} 
	if(rParcialP){//esta activado por periodo
		if (inicio != '' && final != '' ) {
			var ini = new Date(inicio);
			var fin = new Date(final);
			if((fin > ini || ini == fin)  && val !=''){
				if(check){
					if(	selProject != '' && selectSistema != ''){
						desc.disabled = false;
						return true;
					}
					desc.disabled = true;
					return false;
				}else{
					if(selectSistema != ''){
						desc.disabled = false;
					}
				}
				desc.disabled = true;
					return true;			
			}else{
				desc.disabled = true;
				return false;
			}
		} else {
			//console.log('entro false');
			desc.disabled = true;
			return false;
		}
	} 
	if(rParcialC){//esta activado por periodo
		if(check){
			if(inputProject != '' && selectSistema != ''){
				desc.disabled = false;
			}
			desc.disabled = true;
		}else{
			if(selectSistema != ''){
				desc.disabled = false;
			}
			desc.disabled = true;
		}
	} 
};
function generarPDFExpedientesParcial() {
	var r1 = $('#inputRadio1').get(0).checked;
	var r2 = $('#inputRadio2').get(0).checked;
	var f1=  $('#inputInicio').val();
	var f2=  $('#inputFinal').val();
	var sistema = $('#selectSistema').val();
	var filtro = $('#selectFiltro').val();
	var materia = $('#selectMateria').val();
	var region = $('#selectRegion').val();
	var check = $('#checkId').get(0).checked;
	var atributos = $('#selectAtributos').val();
	var id = $('#idDefensor').val();
	console.log(sistema, filtro, materia, region, check, atributos, 'ID-> ',id, r1, r2);

	if(r1){
		if(sistema != '' && f1!='' && f2!=''){
			switch(filtro){
				case 'MATERIA':
					if(materia!=''){
						if(check){//por sistema, materia y un defensor!
							$.ajax({
								url: "../../controlador/informes/querys2.php",
								type: "POST",
								data: {"sistema":sistema,
									   "materia":materia,
									   "filtro":filtro,
									   "atributos":atributos,
									   "check":check,
										"id":id,
										"f1":f1,
										"f2":f2},
								success: function (data) {	
									//console.log('filtro por materia y un sistema', data);						
									var jsonInforme = jQuery.parseJSON(data);		
									console.log(jsonInforme, ' JSON MATERIA X SISTEMA defnsorrr PERIODO');
									constructor(jsonInforme);
									//var nombreDef = jsonInforme['nombreDef'][0].nombre + ' '+ jsonInforme['nombreDef'][0].ap_paterno + ' '+ jsonInforme['nombreDef'][0].ap_materno;									
									//var sistema= jsonInforme['nombreDef'][0].sistema;
									//var expedientes= jsonInforme['expBySistemaDef'][0];
									//console.log(sistema,' valor sistema antes de crear pdf', nombreDef, ' nombre del defensro');
								 var pdfExp = informeMatByDefPeriodo(sistema, atributos);					  											  
									pdfMake.createPdf(pdfExp).open();

								}
							});
						}else{//por sistema, y materia nada mas!
							$.ajax({
								url: "../../controlador/informes/querys2.php",
								type: "POST",
								data: {"sistema":sistema,
									   "materia":materia,
									   "filtro":filtro,
									   "atributos":atributos,
									   "check":check,
									   "f1":f1,
									   "f2":f2},
								success: function (data) {	
									//console.log('filtro por materia y un sistema', data);						
									var jsonInforme = jQuery.parseJSON(data);		
									console.log(jsonInforme, ' JSON MATERIA X SISTEMA PERIODO sin def');
									constructor(jsonInforme);
									//var nombreDef = jsonInforme['nombreDef'][0].nombre + ' '+ jsonInforme['nombreDef'][0].ap_paterno + ' '+ jsonInforme['nombreDef'][0].ap_materno;									
									//var sistema= jsonInforme['nombreDef'][0].sistema;
									//var expedientes= jsonInforme['expBySistemaDef'][0];
									//console.log(sistema,' valor sistema antes de crear pdf', nombreDef, ' nombre del defensro');
								 var pdfExp = informeMatPeriodo(sistema, atributos);					  											  
									pdfMake.createPdf(pdfExp).open();

								}
							});
						}
					}
				break;
				case 'REGION':
					if(region!=''){
						if(check){//por sistema, materia y un defensor!
							$.ajax({
								url: "../../controlador/informes/querys2.php",
								type: "POST",
								data: {"sistema":sistema,
									   "region":region,
									   "filtro":filtro,
									   "atributos":atributos,
									   "check":check,
										"id":id,
										"f1":f1,
										"f2":f2},
								success: function (data) {	
									//console.log('filtro por region y un sistema', data);						
									var jsonInforme = jQuery.parseJSON(data);		
									console.log(jsonInforme, ' JSON REGION X SISTEMA defensor PERIODO');
									constructor(jsonInforme);
									//var nombreDef = jsonInforme['nombreDef'][0].nombre + ' '+ jsonInforme['nombreDef'][0].ap_paterno + ' '+ jsonInforme['nombreDef'][0].ap_materno;									
									//var sistema= jsonInforme['nombreDef'][0].sistema;
									//var expedientes= jsonInforme['expBySistemaDef'][0];
									//console.log(sistema,' valor sistema antes de crear pdf', nombreDef, ' nombre del defensro');
								 var pdfExp = informeRegByDefPeriodo(sistema, atributos);					  											  
									pdfMake.createPdf(pdfExp).open();
								}
							});
						}else{//por sistema, y materia nada mas!
							$.ajax({
								url: "../../controlador/informes/querys2.php",
								type: "POST",
								data: {"sistema":sistema,
									   "region":region,
									   "filtro":filtro,
									   "atributos":atributos,
									   "check":check,
									   "f1":f1,
									   "f2":f2},
								success: function (data) {	
									//console.log('filtro por region y un sistema', data);						
									var jsonInforme = jQuery.parseJSON(data);		
									console.log(jsonInforme, ' JSON REGION X SISTEMA PERIODO');
									constructor(jsonInforme);
									//var nombreDef = jsonInforme['nombreDef'][0].nombre + ' '+ jsonInforme['nombreDef'][0].ap_paterno + ' '+ jsonInforme['nombreDef'][0].ap_materno;									
									//var sistema= jsonInforme['nombreDef'][0].sistema;
									//var expedientes= jsonInforme['expBySistemaDef'][0];
									//console.log(sistema,' valor sistema antes de crear pdf', nombreDef, ' nombre del defensro');
								 var pdfExp = informeRegPeriodo(sistema, atributos);					  											  
									pdfMake.createPdf(pdfExp).open();

								}
							});
						}
					}
				break;
				case 'AMBAS':
					if(materia!='' && region !=''){
						if(check){//por sistema, materia y un defensor!
							$.ajax({
								url: "../../controlador/informes/querys2.php",
								type: "POST",
								data: {"sistema":sistema,
									   "region":region,
									   "materia":materia,
									   "filtro":filtro,
									   "atributos":atributos,
									   "check":check,
										"id":id,
										"f1":f1,
										"f2":f2},
								success: function (data) {	
									//console.log('filtro por region y un sistema', data);						
									var jsonInforme = jQuery.parseJSON(data);		
									console.log(jsonInforme, ' JSON AMBAS X SISTEMA DEFNSOR PERIDO');
									constructor(jsonInforme);
									//var nombreDef = jsonInforme['nombreDef'][0].nombre + ' '+ jsonInforme['nombreDef'][0].ap_paterno + ' '+ jsonInforme['nombreDef'][0].ap_materno;									
									//var sistema= jsonInforme['nombreDef'][0].sistema;
									//var expedientes= jsonInforme['expBySistemaDef'][0];
									//console.log(sistema,' valor sistema antes de crear pdf', nombreDef, ' nombre del defensro');
								 var pdfExp = informeAmbasByDefPeriodo(sistema, atributos);					  											  
									pdfMake.createPdf(pdfExp).open();
								}
							});
						}else{//por sistema, y materia nada mas!
							$.ajax({
								url: "../../controlador/informes/querys2.php",
								type: "POST",
								data: {"sistema":sistema,
									   "region":region,
									   "materia":materia,
									   "filtro":filtro,
									   "atributos":atributos,
									   "check":check,
									   "f1":f1,
									   "f2":f2},
								success: function (data) {	
									//console.log('filtro por region y un sistema', data);						
									var jsonInforme = jQuery.parseJSON(data);		
									console.log(jsonInforme, ' JSON AMBAS X SISTEMA PERIDO');
									constructor(jsonInforme);
									//var nombreDef = jsonInforme['nombreDef'][0].nombre + ' '+ jsonInforme['nombreDef'][0].ap_paterno + ' '+ jsonInforme['nombreDef'][0].ap_materno;									
									//var sistema= jsonInforme['nombreDef'][0].sistema;
									//var expedientes= jsonInforme['expBySistemaDef'][0];
									//console.log(sistema,' valor sistema antes de crear pdf', nombreDef, ' nombre del defensro');
								 var pdfExp = informeAmbasPeriodo(sistema, atributos);					  											  
									pdfMake.createPdf(pdfExp).open();
								}
							});
						}
					}
				break;
				case 'NINGUNO'://solo preguntas por defensor activado?
					if(sistema!=''){
						if(check){//por sistema, materia y un defensor!
							$.ajax({
								url: "../../controlador/informes/querys2.php",
								type: "POST",
								data: {"sistema":sistema,
									   "filtro":filtro,
									   "atributos":atributos,
									   "check":check,
										"id":id,
										"f1":f1,
										"f2":f2},
								success: function (data) {	
									//console.log('filtro por region y un sistema', data);						
									var jsonInforme = jQuery.parseJSON(data);		
									console.log(jsonInforme, ' JSON AMBAS X SISTEMA DEFFENSOR PERIODO');
									constructor(jsonInforme);
									//var nombreDef = jsonInforme['nombreDef'][0].nombre + ' '+ jsonInforme['nombreDef'][0].ap_paterno + ' '+ jsonInforme['nombreDef'][0].ap_materno;									
									//var sistema= jsonInforme['nombreDef'][0].sistema;
									//var expedientes= jsonInforme['expBySistemaDef'][0];
									//console.log(sistema,' valor sistema antes de crear pdf', nombreDef, ' nombre del defensro');
								 var pdfExp = informeNingunoByDefPeriodo(sistema, atributos);					  											  
									pdfMake.createPdf(pdfExp).open();
								}
							});
						}else{//por sistema, y materia nada mas!
							$.ajax({
								url: "../../controlador/informes/querys2.php",
								type: "POST",
								data: {"sistema":sistema,
									   "filtro":filtro,
									   "atributos":atributos,
									   "check":check,
									   "f1":f1,
									   "f2":f2},
								success: function (data) {	
									//console.log('filtro por region y un sistema', data);						
									var jsonInforme = jQuery.parseJSON(data);		
									console.log(jsonInforme, ' JSON AMBAS X SISTEMA PERIODO');
									constructor(jsonInforme);
									//var nombreDef = jsonInforme['nombreDef'][0].nombre + ' '+ jsonInforme['nombreDef'][0].ap_paterno + ' '+ jsonInforme['nombreDef'][0].ap_materno;									
									//var sistema= jsonInforme['nombreDef'][0].sistema;
									//var expedientes= jsonInforme['expBySistemaDef'][0];
									//console.log(sistema,' valor sistema antes de crear pdf', nombreDef, ' nombre del defensro');
								 var pdfExp = informeNingunoPeriodo(sistema, atributos);					  											  
									pdfMake.createPdf(pdfExp).open();
								}
							});
						}
					}
				break;
				default:
					//manda mensaje de error
					//$('#msnError').append("RELLENE CORRECTAMENTE LOS CAMPOS QUE SON REQUERIDOS!");
				break;
			}
		}
	}
	if(r2){
		if(sistema != ''){
			switch(filtro){
				case 'MATERIA':
					if(materia!=''){
						if(check){//por sistema, materia y un defensor!
							$.ajax({
								url: "../../controlador/informes/querys.php",
								type: "POST",
								data: {"sistema":sistema,
									   "materia":materia,
									   "filtro":filtro,
									   "atributos":atributos,
									   "check":check,
										"id":id},
								success: function (data) {	
									//console.log('filtro por materia y un sistema', data);						
									var jsonInforme = jQuery.parseJSON(data);		
									console.log(jsonInforme, ' JSON MATERIA X SISTEMA defnsorrr ');
									constructor(jsonInforme);
									//var nombreDef = jsonInforme['nombreDef'][0].nombre + ' '+ jsonInforme['nombreDef'][0].ap_paterno + ' '+ jsonInforme['nombreDef'][0].ap_materno;									
									//var sistema= jsonInforme['nombreDef'][0].sistema;
									//var expedientes= jsonInforme['expBySistemaDef'][0];
									//console.log(sistema,' valor sistema antes de crear pdf', nombreDef, ' nombre del defensro');
								 var pdfExp = informeMatParcialByDef(sistema, atributos);					  											  
									pdfMake.createPdf(pdfExp).open();
								}
							});
						}else{//por sistema, y materia nada mas!
							$.ajax({
								url: "../../controlador/informes/querys.php",
								type: "POST",
								data: {"sistema":sistema,
									   "materia":materia,
									   "filtro":filtro,
									   "atributos":atributos,
									   "check":check},
								success: function (data) {	
									//console.log('filtro por materia y un sistema', data);						
									var jsonInforme = jQuery.parseJSON(data);		
									console.log(jsonInforme, ' JSON MATERIA X SISTEMA ');
									constructor(jsonInforme);
									//var nombreDef = jsonInforme['nombreDef'][0].nombre + ' '+ jsonInforme['nombreDef'][0].ap_paterno + ' '+ jsonInforme['nombreDef'][0].ap_materno;									
									//var sistema= jsonInforme['nombreDef'][0].sistema;
									//var expedientes= jsonInforme['expBySistemaDef'][0];
									//console.log(sistema,' valor sistema antes de crear pdf', nombreDef, ' nombre del defensro');
								 var pdfExp = informeMatParcial(sistema, atributos);					  											  
									pdfMake.createPdf(pdfExp).open();
								}
							});
						}
					}
				break;
				case 'REGION':
					if(region!=''){
						if(check){//por sistema, materia y un defensor!
							$.ajax({
								url: "../../controlador/informes/querys.php",
								type: "POST",
								data: {"sistema":sistema,
									   "region":region,
									   "filtro":filtro,
									   "atributos":atributos,
									   "check":check,
										"id":id},
								success: function (data) {	
									//console.log('filtro por region y un sistema', data);						
									var jsonInforme = jQuery.parseJSON(data);		
									console.log(jsonInforme, ' JSON REGION X SISTEMA defensorr PERIODO');
									constructor(jsonInforme);
									//var nombreDef = jsonInforme['nombreDef'][0].nombre + ' '+ jsonInforme['nombreDef'][0].ap_paterno + ' '+ jsonInforme['nombreDef'][0].ap_materno;									
									//var sistema= jsonInforme['nombreDef'][0].sistema;
									//var expedientes= jsonInforme['expBySistemaDef'][0];
									//console.log(sistema,' valor sistema antes de crear pdf', nombreDef, ' nombre del defensro');
								 var pdfExp = informeRegByDefParcial(sistema, atributos);					  											  
									pdfMake.createPdf(pdfExp).open();
								}
							});
						}else{//por sistema, y materia nada mas!
							$.ajax({
								url: "../../controlador/informes/querys.php",
								type: "POST",
								data: {"sistema":sistema,
									   "region":region,
									   "filtro":filtro,
									   "atributos":atributos,
									   "check":check},
								success: function (data) {	
									//console.log('filtro por region y un sistema', data);						
									var jsonInforme = jQuery.parseJSON(data);		
									console.log(jsonInforme, ' JSON REGION X SISTEMA ');
									constructor(jsonInforme);
									//var nombreDef = jsonInforme['nombreDef'][0].nombre + ' '+ jsonInforme['nombreDef'][0].ap_paterno + ' '+ jsonInforme['nombreDef'][0].ap_materno;									
									//var sistema= jsonInforme['nombreDef'][0].sistema;
									//var expedientes= jsonInforme['expBySistemaDef'][0];
									//console.log(sistema,' valor sistema antes de crear pdf', nombreDef, ' nombre del defensro');
								 var pdfExp = informeRegParcial(sistema, atributos);					  											  
									pdfMake.createPdf(pdfExp).open();
								}
							});
						}
					}
				break;
				case 'AMBAS':
					if(materia!='' && region !=''){
						if(check){//por sistema, materia y un defensor!
							$.ajax({
								url: "../../controlador/informes/querys.php",
								type: "POST",
								data: {"sistema":sistema,
									   "region":region,
									   "materia":materia,
									   "filtro":filtro,
									   "atributos":atributos,
									   "check":check,
										"id":id},
								success: function (data) {	
									//console.log('filtro por region y un sistema', data);						
									var jsonInforme = jQuery.parseJSON(data);		
									console.log(jsonInforme, ' JSON AMBAS X SISTEMA DEFNSOR ');
									constructor(jsonInforme);
									//var nombreDef = jsonInforme['nombreDef'][0].nombre + ' '+ jsonInforme['nombreDef'][0].ap_paterno + ' '+ jsonInforme['nombreDef'][0].ap_materno;									
									//var sistema= jsonInforme['nombreDef'][0].sistema;
									//var expedientes= jsonInforme['expBySistemaDef'][0];
									//console.log(sistema,' valor sistema antes de crear pdf', nombreDef, ' nombre del defensro');
								 var pdfExp = informeAmbasByDefParcial(sistema, atributos);					  											  
									pdfMake.createPdf(pdfExp).open();

								}
							});
						}else{//por sistema, y materia nada mas!
							$.ajax({
								url: "../../controlador/informes/querys.php",
								type: "POST",
								data: {"sistema":sistema,
									   "region":region,
									   "materia":materia,
									   "filtro":filtro,
									   "atributos":atributos,
									   "check":check},
								success: function (data) {	
									//console.log('filtro por region y un sistema', data);						
									var jsonInforme = jQuery.parseJSON(data);		
									console.log(jsonInforme, ' JSON AMBAS X SISTEMA ' );
									constructor(jsonInforme);
									//var nombreDef = jsonInforme['nombreDef'][0].nombre + ' '+ jsonInforme['nombreDef'][0].ap_paterno + ' '+ jsonInforme['nombreDef'][0].ap_materno;									
									//var sistema= jsonInforme['nombreDef'][0].sistema;
									//var expedientes= jsonInforme['expBySistemaDef'][0];
									//console.log(sistema,' valor sistema antes de crear pdf', nombreDef, ' nombre del defensro');
								 var pdfExp = informeAmbasParcial(sistema, atributos);					  											  
									pdfMake.createPdf(pdfExp).open();
								}
							});
						}
					}
				break;
				case 'NINGUNO'://solo preguntas por defensor activado?
					if(sistema!=''){
						if(check){//por sistema, materia y un defensor!
							$.ajax({
								url: "../../controlador/informes/querys.php",
								type: "POST",
								data: {"sistema":sistema,
									   "filtro":filtro,
									   "atributos":atributos,
									   "check":check,
										"id":id},
								success: function (data) {	
									//console.log('filtro por region y un sistema', data);						
									var jsonInforme = jQuery.parseJSON(data);		
									console.log(jsonInforme, ' JSON AMBAS X SISTEMA DEFFENSOR ');
									constructor(jsonInforme);
									//var nombreDef = jsonInforme['nombreDef'][0].nombre + ' '+ jsonInforme['nombreDef'][0].ap_paterno + ' '+ jsonInforme['nombreDef'][0].ap_materno;									
									//var sistema= jsonInforme['nombreDef'][0].sistema;
									//var expedientes= jsonInforme['expBySistemaDef'][0];
									//console.log(sistema,' valor sistema antes de crear pdf', nombreDef, ' nombre del defensro');
								 var pdfExp = informeNingunoByDefParcial(sistema, atributos);					  											  
									pdfMake.createPdf(pdfExp).open();
								}
							});
						}else{//por sistema, y materia nada mas!
							$.ajax({
								url: "../../controlador/informes/querys.php",
								type: "POST",
								data: {"sistema":sistema,
									   "filtro":filtro,
									   "atributos":atributos,
									   "check":check},
								success: function (data) {	
									//console.log('filtro por region y un sistema', data);						
									var jsonInforme = jQuery.parseJSON(data);		
									console.log(jsonInforme, ' JSON AMBAS X SISTEMA ');
									constructor(jsonInforme);
									//var nombreDef = jsonInforme['nombreDef'][0].nombre + ' '+ jsonInforme['nombreDef'][0].ap_paterno + ' '+ jsonInforme['nombreDef'][0].ap_materno;									
									//var sistema= jsonInforme['nombreDef'][0].sistema;
									//var expedientes= jsonInforme['expBySistemaDef'][0];
									//console.log(sistema,' valor sistema antes de crear pdf', nombreDef, ' nombre del defensro');
								 var pdfExp = informeNingunoParcial(sistema, atributos);					  											  
									pdfMake.createPdf(pdfExp).open();
								}
							});
						}
					}
				break;
				default:
					//manda mensaje de error
					//$('#msnError').append("RELLENE CORRECTAMENTE LOS CAMPOS QUE SON REQUERIDOS!");
				break;
			}
		}
	}

	
};
function generarPDFExpedientesGeneral(){
	var inputProject, fechaI, fechaFi,selectSistema, selectAtributos; 
	var checkDef = $('#checkId').get(0).checked;
	console.time('TEST PERFORMANCE');
	var r1 = $('#inputRadio1').get(0).checked;//informe general con periodo
	var r2 = $('#inputRadio2').get(0).checked;//informe general completo	
	if(r1){//informe por periodo
		fechaI = document.getElementById('inputInicio').value;
		fechaFi = document.getElementById('inputFinal').value;
		if(checkDef){//informe por defensor
			inputProject = $('#idDefensor').val();
			console.log('PETICION AJAX  PERIODO + DEFENSOR');
			console.log($('#idDefensor').val(), 'id del defensor');
			$.ajax({
				url: "../../controlador/personal_campo/controladorInformeExp.php",
				type: "POST",
				data: {"fechaI":fechaI, "fechaF":fechaFi, "defensor":inputProject,
					   "radio1":r1, "check":checkDef},
				success: function (data) {							
					var jsonInforme = jQuery.parseJSON(data);					
					var pdfExp;
					console.log(jsonInforme, ' informe por defensor');
					constructor(jsonInforme);
					var nombreDef = jsonInforme['nombreDef'][0].nombre + ' '+ jsonInforme['nombreDef'][0].ap_paterno + ' '+ jsonInforme['nombreDef'][0].ap_materno;
					//var totalAsesorias = parseInt(jsonInforme['actBySistemaDef'][0].actAsesoria);
					var sistema= jsonInforme['nombreDef'][0].sistema;
					if(jsonInforme['tablaGeneralExpDef'][1]== undefined || jsonInforme['tablaGeneralExpDef'][1]==null){
						jsonInforme['tablaGeneralExpDef'][1]={"expedientesPorSistema":0};
					}
					var totalExp = parseInt(jsonInforme['tablaGeneralExpDef'][0].expedientesPorSistema)+ parseInt(jsonInforme['tablaGeneralExpDef'][1].expedientesPorSistema);

					  pdfExp = informeGByDefPeriodo(nombreDef, sistema, totalExp);					  
					  // print the PDF
					  //pdfMake.createPdf(docDefinition).print();
					  // download the PDF
					  //pdfMake.createPdf(docDefinition).download('optionalName.pdf');				  
					  pdfMake.createPdf(pdfExp).open();					
				}
			});
		}else{//solo esta las fechas y sera general
			console.log('PETICION AJAX ONLY PERIODO');
			$.ajax({
				url: "../../controlador/personal_campo/controladorInformeExp.php",
				type: "POST",
				data: {"fechaI":fechaI, "fechaF":fechaFi,"radio1":r1, "check":checkDef},
				success: function (data) {	
					//console.log(data, ' DATA DEV');
					 var jsonInforme = jQuery.parseJSON(data);
					 console.log(jsonInforme, ' DATA JSONNNN');
					constructor(jsonInforme);
					if(jsonInforme['tablaGeneralExp'][1]== undefined || jsonInforme['tablaGeneralExp'][1]==null){
						jsonInforme['tablaGeneralExp'][1]={"expedientesPorSistema":0};
					}
					var totalExp = parseInt(jsonInforme['tablaGeneralExp'][0].expedientesPorSistema)+ parseInt(jsonInforme['tablaGeneralExp'][1].expedientesPorSistema);

					var pdfAct =  informeExpGPeriodo(totalExp);					  
					  // print the PDF
					  //pdfMake.createPdf(docDefinition).print();
					  // download the PDF
					  //pdfMake.createPdf(docDefinition).download('optionalName.pdf');				  
					pdfMake.createPdf(pdfAct).open();
				}
			});
		}
	}
	if(r2){// informe completo
		if(checkDef){//informe por defensor
			inputProject = $('#idDefensor').val();//hacer ajax con el defensor en esp
			$.ajax({
				url: "../../controlador/personal_campo/controladorInformeExp.php",
				type: "POST",
				data: {"defensor":inputProject,"radio2":r2, "check":checkDef},
				success: function (data) {
					var jsonInforme = jQuery.parseJSON(data);
					console.log('completo POR DEFENSOR ', jsonInforme);
					// funciion validar(jsonInforme) return json
					var totalExp = parseInt(jsonInforme['tablaGeneralExpDef'][0].expedientesPorSistema);
						constructor(jsonInforme);
					var nombreDef = jsonInforme['nombreDef'][0].nombre + ' '+ jsonInforme['nombreDef'][0].ap_paterno + ' '+ jsonInforme['nombreDef'][0].ap_materno;					
					var sistema = jsonInforme['nombreDef'][0].sistema;
					var pdfAct= informeGByDefCompleto(nombreDef, sistema, totalExp);
						pdfMake.createPdf(pdfAct).open();			
				}
			});
		}else{//shacer ajax informe completo sin filtros
			$.ajax({
				url: "../../controlador/personal_campo/controladorInformeExp.php",
				type: "POST",
				data: {"radio2":r2, "check":checkDef},
				success: function (data) {	
					var jsonInforme = jQuery.parseJSON(data);
					console.log('completo FULL ', jsonInforme);
					// funciion validar(jsonInforme) return json
					var totalExp = parseInt(jsonInforme['tablaGeneralExp'][0].expedientesPorSistema) + parseInt(jsonInforme['tablaGeneralExp'][1].expedientesPorSistema);
					constructor(jsonInforme);
					//var actividades= jsonInforme['expBySistema'];
					var pdfAct = informeExpGCompleto(totalExp);					  
						// print the PDF
						//pdfMake.createPdf(docDefinition).print();
						// download the PDF
						//pdfMake.createPdf(docDefinition).download('optionalName.pdf');					
					  pdfMake.createPdf(pdfAct).open();	
					  console.log("creando ppdfffff....");				
				}
			});
		}
	}
	console.timeEnd('TEST PERFORMANCE');
}
function generarPDFActividadesGeneral() {
	var inputProject, fechaI, fechaFi,selectSistema, selectAtributos; 
	var checkDef = $('#checkId').get(0).checked;
	console.time('TEST PERFORMANCE');
	var r1 = $('#inputRadio1').get(0).checked;//informe general con periodo
	var r2 = $('#inputRadio2').get(0).checked;//informe general completo
	
	if(r1){//informe por periodo
		fechaI = document.getElementById('inputInicio').value;
		fechaFi = document.getElementById('inputFinal').value;
		if(checkDef){//informe por defensor
			inputProject = $('#idDefensor').val();
			console.log('PETICION AJAX  PERIODO + DEFENSOR');
			console.log($('#idDefensor').val(), 'id del defensor');
			$.ajax({
				url: "../../controlador/personal_campo/controladorInformeAct.php",
				type: "POST",
				data: {"fechaI":fechaI, "fechaF":fechaFi, "defensor":inputProject,
					   "radio1":r1, "check":checkDef},
				success: function (data) {							
					var jsonInforme = jQuery.parseJSON(data);					
					var pdfAct;
					console.log(jsonInforme, ' informe por defensor');
					constructor(jsonInforme);
					var nombreDef = jsonInforme['nombreDef'][0].nombre + ' '+ jsonInforme['nombreDef'][0].ap_paterno + ' '+ jsonInforme['nombreDef'][0].ap_materno;
					//var totalAsesorias = parseInt(jsonInforme['actBySistemaDef'][0].actAsesoria);
					var sistema= jsonInforme['nombreDef'][0].sistema;
					var actividades= jsonInforme['actBySistemaDef'][0];
					//console.log(sistema,' valor sistema antes de crear pdf', nombreDef, ' nombre del defensro');
					  pdfAct = informeGByDefPeriodo(nombreDef, sistema, actividades);					  
					  // print the PDF
					  //pdfMake.createPdf(docDefinition).print();
					  // download the PDF
					  //pdfMake.createPdf(docDefinition).download('optionalName.pdf');				  
					  pdfMake.createPdf(pdfAct).open();					
				}
			});
		}else{//solo esta las fechas y sera general
			console.log('PETICION AJAX ONLY PERIODO');
			$.ajax({
				url: "../../controlador/personal_campo/controladorInformeAct.php",
				type: "POST",
				data: {"fechaI":fechaI, "fechaF":fechaFi,"radio1":r1, "check":checkDef},
				success: function (data) {	
					//console.log(data, ' DATA DEV');
					 var jsonInforme = jQuery.parseJSON(data);
					 console.log(jsonInforme, ' DATA JSONNNN');
					 if(jsonInforme['actBySistema'][1]==null || jsonInforme['actBySistema'][1]==undefined){
						jsonInforme['actBySistema'][1]={"sistemaG":0,"actividadesPorSistema":0,"actAudiencia":0,"actVisita":0,"actAsesoria":0};
					 }
					var totalAsesorias = parseInt(jsonInforme['actBySistema'][1].actAsesoria) + parseInt(jsonInforme['actBySistema'][0].actAsesoria);
					var actividades=jsonInforme['actBySistema']; //parseInt(jsonInforme['actBySistema'][0].actividadesPorSistema)+parseInt(jsonInforme['actBySistema'][0].actividadesPorSistema);
					
					constructor(jsonInforme);					
					var pdfAct = informeGPeriodo(totalAsesorias, actividades);					  
					  // print the PDF
					  //pdfMake.createPdf(docDefinition).print();
					  // download the PDF
					  //pdfMake.createPdf(docDefinition).download('optionalName.pdf');				  
					pdfMake.createPdf(pdfAct).open();
				}
			});
		}
	}
	if(r2){// informe completo
		if(checkDef){//informe por defensor
			inputProject = $('#idDefensor').val();//hacer ajax con el defensor en esp
			$.ajax({
				url: "../../controlador/personal_campo/controladorInformeAct.php",
				type: "POST",
				data: {"defensor":inputProject,"radio2":r2, "check":checkDef},
				success: function (data) {

					var jsonInforme = jQuery.parseJSON(data);					
					console.log(jsonInforme, ' JSON DE DATA');
					constructor(jsonInforme);
					var nombreDef = jsonInforme['nombreDef'][0].nombre + ' '+ jsonInforme['nombreDef'][0].ap_paterno + ' '+ jsonInforme['nombreDef'][0].ap_materno;
					var sistema= jsonInforme['nombreDef'][0].sistema;
					var actividades= jsonInforme['actBySistemaDef'][0];
					var pdfAct= informeGByDefCompleto(nombreDef, sistema, actividades);
					  
					  // print the PDF
					  //pdfMake.createPdf(docDefinition).print();
					  // download the PDF
					  //pdfMake.createPdf(docDefinition).download('optionalName.pdf');
				  
						pdfMake.createPdf(pdfAct).open();			
				}
			});
		}else{//shacer ajax informe completo sin filtros
			$.ajax({
				url: "../../controlador/personal_campo/controladorInformeAct.php",
				type: "POST",
				data: {"radio2":r2, "check":checkDef},
				success: function (data) {	
					var jsonInforme = jQuery.parseJSON(data);
					console.log('completo FULL ', jsonInforme);
					if(jsonInforme['actBySistema'][1]==undefined || jsonInforme['actBySistema'][1]==null){
						jsonInforme['actBySistema'][1]={"actAsesoria":0};
					}
					var totalAsesorias = parseInt(jsonInforme['actBySistema'][1].actAsesoria) + parseInt(jsonInforme['actBySistema'][0].actAsesoria);
					constructor(jsonInforme);
					var actividades= jsonInforme['actBySistema'];
					var pdfAct = informeGCompleto(totalAsesorias, actividades)					  
						// print the PDF
						//pdfMake.createPdf(docDefinition).print();
						// download the PDF
						//pdfMake.createPdf(docDefinition).download('optionalName.pdf');					
					  pdfMake.createPdf(pdfAct).open();					
				}
			});
		}
	}
	console.timeEnd('TEST PERFORMANCE');
};
function generarPDFActividadesParcial() {
	var inputProject, fechaI, fechaFi,selectSistema, selectAtributos; 
	var checkDef = $('#checkId').get(0).checked;
	console.time('TEST PERFORMANCE');
	var r3 = $('#inputRadio3').get(0).checked;//informe general con periodo
	var r4 = $('#inputRadio4').get(0).checked;//informe general completo
	fechaI = document.getElementById('inputInicio').value;
	fechaFi = document.getElementById('inputFinal').value;
	selectSistema = $('#selectSistema').val();
	selectAtributos = $('#selectAtributos').val();	
	
	if(r3){//informe PARCIAL por periodo
		if(checkDef){	//informe por defensor
			//inputProject = $('#project').val();//ajax con fechas y input con defensor unico
			inputProject = $('#idDefensor').val();			
			console.log('vallor atributos');
			console.log('PETICION AJAX  PERIODO + UN DEFENSOR + UN SISTEMA + ATRIBUTOS');
			console.log($('#idDefensor').val(), 'id del defensor');
			$.ajax({
				url: "../../controlador/personal_campo/controladorInformeAct.php",
				type: "POST",
				data: {"fechaI":fechaI, "fechaF":fechaFi, 
					 "defensor":inputProject, "radio3":r3,
					 "check":checkDef, "atributos":selectAtributos, "sistema":selectSistema},
				success: function (data) {			
					console.log(data, ' resultado r3 por defensor' );
					var jsonInforme = jQuery.parseJSON(data);					
					console.log(jsonInforme,' valor jsonInfr');
					constructor(jsonInforme);
					var pdfAct= informePByDefPeriodo(jsonInforme,selectAtributos);					  
					  // print the PDF
					  //pdfMake.createPdf(docDefinition).print();
					  // download the PDF
					  //pdfMake.createPdf(docDefinition).download('optionalName.pdf');				  
					  pdfMake.createPdf(pdfAct).open();

				}
			});
		}else{//no activado check defensor
			console.log('PETICION AJAX parcial periodo varios defensores ');
			$.ajax({
				url: "../../controlador/personal_campo/controladorInformeAct.php",
				type: "POST",
				data: {"fechaI":fechaI, "fechaF":fechaFi,"radio3":r3, 
						"check":checkDef,"atributos":selectAtributos, "sistema":selectSistema},
				success: function (data) {	
					console.log(data, ' resultado r3 varios defensores');		
					var jsonInforme = jQuery.parseJSON(data);
					console.log('solopor periodo ', jsonInforme);
					var pdfAct= informePPeriodo(jsonInforme);					  
					  // print the PDF
					  //pdfMake.createPdf(docDefinition).print();
					  // download the PDF
					  //pdfMake.createPdf(docDefinition).download('optionalName.pdf');				  
					pdfMake.createPdf(pdfAct).open();
				}
			});
		}
	}
	if(r4){// informe parcial sin periodo
		if(checkDef){//informe por defensor
			inputProject = $('#idDefensor').val();//hacer ajax con el defensor en esp
			console.log(inputProject, ' id defensor especificooo');
			$.ajax({
				url: "../../controlador/personal_campo/controladorInformeAct.php",
				type: "POST",
				data: {"defensor":inputProject,"radio4":r4, "check":checkDef, "atributos":selectAtributos,
						"sistema":selectSistema},
				success: function (data) {			
					var jsonInforme = jQuery.parseJSON(data);
					constructor(jsonInforme);
					switch(selectSistema){
						case 'TRADICIONAL':
							var pdfAct= informeByDefCompletoParcialT(selectAtributos);
							pdfMake.createPdf(pdfAct).open();
						break;
						case 'ORAL':
							var pdfAct= informeByDefCompletoParcialO(jsonInforme);
							pdfMake.createPdf(pdfAct).open();
						break;
						case 'JUSTICIA':
							var pdfAct= informeByDefCompletoParcialJ(jsonInforme);
							pdfMake.createPdf(pdfAct).open();
						break;
						default://todos
							var pdfAct= informeByDefCompletoParcialALL(jsonInforme);
							pdfMake.createPdf(pdfAct).open();
						break;
					}	
				}
			});
		}else{//shacer ajax informe completo sin filtros
			console.log(selectAtributos, ' atributos seleccionados');
			$.ajax({
				url: "../../controlador/personal_campo/controladorInformeAct.php",
				type: "POST",
				data: {"radio4":r4, "check":checkDef,  "atributos":selectAtributos,
				"sistema":selectSistema},
				success: function (data) {
					var jsonInforme = jQuery.parseJSON(data);
					constructor(jsonInforme);
					switch(selectSistema){
						case 'TRADICIONAL':
							var pdfAct= informeCompletoParcialT(jsonInforme)
							pdfMake.createPdf(pdfAct).open();
						break;
						case 'ORAL':
							var pdfAct= informeCompletoParcialO(jsonInforme)
							pdfMake.createPdf(pdfAct).open();
						break;
						case 'JUSTICIA':
							var pdfAct= informeCompletoParcialJ(jsonInforme)
							pdfMake.createPdf(pdfAct).open();
						break;
						default://todos
							var pdfAct= informeCompletoParcialALL(jsonInforme)
							pdfMake.createPdf(pdfAct).open();
						break;
					}	
			

					
				}
			});
		}
	}
	console.timeEnd('TEST PERFORMANCE');
};
function listaMAtributos(){
	var arr=[];
	$.each($('#selectAtributos').get(0).options, function(k,v){
		//console.log(v.value, ' atributos existentes actualmente');
		arr.push(v.value);
	});
/* 	arr.push('GENERAL');
	arr.push('ACTIVIDAD');
	arr.push('TOP');
	arr.push('SEXO');
	arr.push('GENERO');
	arr.push('EDAD');
	arr.push('ETNIA');
	arr.push('IDIOMA');
	arr.push('DISCAPACIDAD');
	arr.push('MATERIA');
	arr.push('REGION'); */
	
	return arr;
}
function seleccionarUnDefensor2(val){//checkdefensor especifico
	var arr = listaMAtributos();
	//var desc = $('#botonDesc').get(0);	
	var filtro=$('#selectFiltro').val();
	var sis = $('#selectSistema').val();
	var atr = $('#selectAtributos').val();
	var rGeneralC = $('#inputRadio2').get(0).checked;
	var rGeneralP = $('#inputRadio1').get(0).checked;
	var inputProject = $('#project').val();
	var selectAtributos=$('#selectAtributos');
	//console.log($('#selectAtributos').get(0).options[].value,' atributos del select');
	//ar/r.find(function(c){return (c=='tradicional')})
	if(val){
		$('#idCheckDefensor').removeAttr('style');
		$("#selectAtributos option[value='TOP']").remove();		
		switch(filtro){
			case 'MATERIA':
				arr = listaMAtributos();
				if(arr.find(function(c){return (c=='MATERIA')}) != undefined){
					$("#selectAtributos option[value='MATERIA']").remove();
					
				}
				if(arr.find(function(c){return (c=='REGION')}) != undefined){
					$("#selectAtributos option[value='REGION']").remove();
				}
			break;	
			case 'REGION':
			arr = listaMAtributos();
			if(arr.find(function(c){return (c=='MATERIA')}) != undefined){
				$("#selectAtributos option[value='MATERIA']").remove();
				
			}
			if(arr.find(function(c){return (c=='REGION')}) != undefined){
				$("#selectAtributos option[value='REGION']").remove();
			}
		break;			
			case 'AMBAS':
				arr = listaMAtributos();
				if(arr.find(function(c){return (c=='REGION')}) != undefined){
					$("#selectAtributos option[value='REGION']").remove();						
				}
				if(arr.find(function(c){return (c=='MATERIA')}) != undefined){
					$("#selectAtributos option[value='MATERIA']").remove();						
				}
			break;
			case 'NINGUNO':
				arr = listaMAtributos();
				if(arr.find(function(c){return (c=='REGION')}) != undefined){
					$("#selectAtributos option[value='REGION']").remove();
				}
				if(arr.find(function(c){return (c=='MATERIA')}) != undefined){
					$("#selectAtributos option[value='MATERIA']").remove();
				}
			break;
		}
	}else{
		$("#idCheckDefensor").attr('style','display:none');	
			selectAtributos.append('<option value="TOP">Top Defensores</option>');
		
		switch(filtro){
			case 'MATERIA':
				arr = listaMAtributos();
				if(arr.find(function(c){return (c=='MATERIA')}) != undefined){
					$("#selectAtributos option[value='MATERIA']").remove();
					
				}
				if(arr.find(function(c){return (c=='REGION')}) == undefined){
					selectAtributos.append('<option value="REGION">Region</option>');
				}
			break;
			case 'REGION':
				arr = listaMAtributos();
				if(arr.find(function(c){return (c=='REGION')}) != undefined){
					$("#selectAtributos option[value='REGION']").remove();
					
				}
				if(arr.find(function(c){return (c=='MATERIA')}) == undefined){
					selectAtributos.append('<option value="MATERIA">Materia</option>');
				}
					

			break;
			case 'AMBAS':
				arr = listaMAtributos();
				if(arr.find(function(c){return (c=='REGION')}) != undefined){
					$("#selectAtributos option[value='REGION']").remove();						
				}
				if(arr.find(function(c){return (c=='MATERIA')}) != undefined){
					$("#selectAtributos option[value='MATERIA']").remove();						
				}
			break;
			case 'NINGUNO':
				arr = listaMAtributos();
				if(arr.find(function(c){return (c=='REGION')}) == undefined){
					selectAtributos.append('<option value="REGION">Región</option>');						
				}
				if(arr.find(function(c){return (c=='MATERIA')}) == undefined){
					selectAtributos.append('<option value="MATERIA">Materia</option>');
				}
			break;
		}
	}
	
	if(rGeneralC){
		$("#divPeriodo").attr('style', 'display:none;');		
	}
	if(rGeneralP){//esta activado por periodo
		$("#divPeriodo").removeAttr('style');
		
	}
}

function generarConsultaExpedientesGeneral(){
	var inputProject, fechaI, fechaFi,selectSistema, selectAtributos; 
	var checkDef = $('#checkId').get(0).checked;
	console.time('TEST PERFORMANCE');
	var r1 = $('#inputRadio1').get(0).checked;//informe general con periodo
	var r2 = $('#inputRadio2').get(0).checked;//informe general completo	
	if(r1){//informe por periodo
		fechaI = document.getElementById('inputInicio').value;
		fechaFi = document.getElementById('inputFinal').value;
		if(checkDef){//informe por defensor
			inputProject = $('#idDefensor').val();
			console.log('PETICION AJAX  PERIODO + DEFENSOR');
			console.log($('#idDefensor').val(), 'id del defensor');
			var prueba={"fechaI":fechaI, "fechaF":fechaFi, "defensor":inputProject,
			"radio1":r1, "check":checkDef};
			console.log(prueba," lo qu se esta enviADNO");
			
			$.ajax({
				url: "../../controlador/personal_campo/controladorInformeExp.php",
				type: "POST",
				data: {"fechaI":fechaI, "fechaF":fechaFi, "defensor":inputProject,
					   "radio1":r1, "check":checkDef},
				success: function (data) {							
					var jsonInforme = jQuery.parseJSON(data);					
					var pdfExp;
					console.log("dta pedido ",data);
					
					console.log(jsonInforme, ' informe por defensor');
									
				}
			});
		}else{//solo esta las fechas y sera general
			console.log('PETICION AJAX ONLY PERIODO');
			$.ajax({
				url: "../../controlador/personal_campo/controladorInformeExp.php",
				type: "POST",
				data: {"fechaI":fechaI, "fechaF":fechaFi,"radio1":r1, "check":checkDef},
				success: function (data) {	
					//console.log(data, ' DATA DEV');
					 var jsonInforme = jQuery.parseJSON(data);
					 console.log(jsonInforme, ' DATA JSONNNN');
					 
				}
			});
		}
	}
	if(r2){// informe completo
		if(checkDef){//informe por defensor
			inputProject = $('#idDefensor').val();//hacer ajax con el defensor en esp
			$.ajax({
				url: "../../controlador/personal_campo/controladorInformeExp.php",
				type: "POST",
				data: {"defensor":inputProject,"radio2":r2, "check":checkDef},
				success: function (data) {
					var jsonInforme = jQuery.parseJSON(data);
					globalDatosEstadisticoPorDefensor=jsonInforme;
					$("#divGeneralCompleto").hide();
					$("#divGeneralCompletoDefensor").show();
					console.log('completo POR DEFENSOR ', jsonInforme);
					// funciion validar(jsonInforme) return json
						
				}
			});
		}else{//shacer ajax informe completo sin filtros
			$.ajax({
				url: "../../controlador/personal_campo/controladorInformeExp.php",
				type: "POST",
				data: {"radio2":r2, "check":checkDef},
				success: function (data) {	
					var jsonInforme = jQuery.parseJSON(data);
					console.log('completo FULL ', jsonInforme);
					$("#divGeneralCompleto").show();
					$("#divGeneralCompletoDefensor").hide();
					globalDatosEstadistico=jsonInforme;//ALMACENANDO LOS VALORES PARA REOUTILZARLO MAS ADELANTE EN gestionGrafica.js
					//google.charts.load('current', {'packages':['bar']});
					google.charts.load('current', {'packages':['corechart']});
					google.charts.setOnLoadCallback(drawChart);

					var array=jsonInforme.tablaRegionExp;
					console.log("viendo data ",jsonInforme);
					
					var oral=array.filter(function(x){return (x.sis=='ORAL')});
					var tradicional=array.filter(function(x){return (x.sis=='TRADICIONAL')});
					var grafica=[['Región en sistema tradicional','Expediente','Hombres','Mujeres']];
					    tradicional.forEach(element => {
							var arrayNew=[];
								   arrayNew.push(element.reg);
								   arrayNew.push(parseInt(element.totExp));
								   arrayNew.push(parseInt(element.hombres));
								   arrayNew.push(parseInt(element.mujeres));
							   grafica.push(arrayNew);	   
						});
					var graficatwo=[['Región en sistema oral','Expediente','Hombres','Mujeres']];
					    oral.forEach(element => {
							var arrayNew=[];
								   arrayNew.push(element.reg);
								   arrayNew.push(parseInt(element.totExp));
								   arrayNew.push(parseInt(element.hombres));
								   arrayNew.push(parseInt(element.mujeres));
							   graficatwo.push(arrayNew);	   
						});
						console.log("emprimiento la grafica ",grafica);
						
						
						 function drawChart() {
							var data = google.visualization.arrayToDataTable(grafica);
							var datatwo = google.visualization.arrayToDataTable(graficatwo);
							/* var data = new google.visualization.DataTable();
							data.addColumn('string', 'Topping');
							data.addColumn('number', 'Slices');
							data.addRows([
							  ['Mushrooms', 3],
							  ['Onions', 1],
							  ['Olives', 1],
							  ['Zucchini', 1],
							  ['Pepperoni', 2]
							]); */
							var piechart_options = {title:'Grafica de tradicional',
										   subtitle:'fecha:2018-2018'};
							
							var piechart = new google.visualization.ColumnChart(document.getElementById('columnchart_one'));
							   piechart.draw(data, piechart_options);
							   //document.getElementById('buttonone').outerHTML = '<a href="' + piechart.getImageURI() + '" download="Grafica.jpg">Descargar</a>';
							   $('#buttonone').append( '<a href="' + piechart.getImageURI() + '" download="Grafica.jpg">Descargar</a>');
   
							var barchart_options = {title:'Grafica de oral',
										  	//   legend: 'none'
										};
						    //var chart = new google.visualization.Bar(document.getElementById('barchart_div'));
							var barchart = new google.visualization.ColumnChart(document.getElementById('columnchart_two'));
							//barchart.draw(data, barchart_options);
							barchart.draw(datatwo, barchart_options);
							$('#buttontwo').append( '<a href="' + barchart.getImageURI() + '" download="Grafica.jpg">Descargar</a>');
   
							//barchart.draw(data, google.charts.Bar.convertOptions(barchart_options));
						}
				 	//function drawChart() {
                      //  var data = google.visualization.arrayToDataTable(grafica);
						//d
						/* var data = new google.visualization.DataTable();
						data.addColumn('string', 'Topping');
						data.addColumn('number', 'Slices');
						data.addRows([
						  ['Mushrooms', 3],
						  ['Onions', 1],
						  ['Olives', 1],
						  ['Zucchini', 1],
						  ['Pepperoni', 2]
						]); */
						
 					   /*  var data = google.visualization.arrayToDataTable([ 
						["Región en sistema tradicional", "Expediente", "Hombre", "Mujeres"],
						 ["Cañada", "16", "10", "8"],
						 ["istmo", "33", "18", "20"],
						 ["Sierra Norte", "5", "0", "7"],
						 ["sierra sur", "5", "1", "6"],
						 ["Valles Centrales", "1", "1", "0"],
         
					   ]);   */ 
 				 	 /*  var data = google.visualization.arrayToDataTable([ 
								['Year', 'Sales', 'Expenses', 'Profit'],
								['2014', 16, 10,8],
								['2015', 24, 12,17],
								['2016', 33, 18,20],
								['2014', 1, 1, 0]          
					   ]); */
			  
					   /* var options = {
						chart: {
						  title: 'Grafica de tradicional',
						  subtitle: 'fecha: 2018-2018',
						}
					  }; */
					   /* 
					  var optionstwo = {
						chart: {
						  title: 'Grafica de oral',
						  subtitle: 'fecha: 2018-2018',
						}
					  }; */
			  
					  /* var chart = new google.charts.Bar(document.getElementById('barchart_div'));
					  //var chartwro = new google.charts.Bar(document.getElementById('columnchart_two'));
			  
					  chart.draw(data, google.charts.Bar.convertOptions(options));//}
					//  chartwro.draw(datatwo, google.charts.Bar.convertOptions(optionstwo));
					}  */
					// funciion validar(jsonInforme) return json
										
				}
			});
		}
	}
	console.timeEnd('TEST PERFORMANCE');
}