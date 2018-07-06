
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

		if(this.id == "inputRadio3"){//informe por periodo			
			$("#divPeriodo").removeAttr('style');
			if(checkDef){
				if(inputProject != '' && myFunctionDate('') != false && selectSistema !=''){
					desc.disabled= false;
				}
			}else{
				if(myFunctionDate('') != false && selectSistema != ''){
					desc.disabled= false;
				}
			}						
		}
		if(this.id == "inputRadio4"){//informe  completo				
			$("#divPeriodo").attr('style','display:none');
			console.log(inputProject, ' valor del input project');
			if(checkDef){ 
				if(inputProject != '' && selectSistema != ''){
					desc.disabled= false;
				}
			}else{
				if(selectSistema != ''){
					desc.disabled= false;
				}
			}	
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
			$(".alert alert-danger").remove();
			generarInformeAct2(nue);
			return true;
		} else {			
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
	var inputProject = $('#project').val();
	var check = $('#checkId').get(0).checked;
	var inicio = $('#inputInicio')[0].value;
	var final = $('#inputFinal')[0].value;
	var labelFinal = document.getElementById('labelFinal');
	var desc = $('#botonDesc').get(0);
	//var selectSistema = $('#selectSistema').get(0);

	if (inicio != '' && final != '') {
		var ini = new Date(inicio);
		var fin = new Date(final);
		if (((ini < fin) || (ini == fin))) {
			$(".alert").remove();
			$(".errors").remove();
			if(check){
				if(inputProject != ''){
					desc.disabled = false;
					return true;	
				}
				desc.disabled = true;
				return false;
			}
			desc.disabled = false;
			return true;
		} else {
					
			//console.log( fechaI, 'fecha inicial');				
			$(".errors").remove();
			labelFinal.setAttribute("class", "alert alert-danger");
			labelFinal.innerText = "La fecha final debe ser Mayor";
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
function generarPDFExpedientes() {
	var fechaI = document.getElementById('inputInicio').value;
	var fechaFi = document.getElementById('inputFinal').value;
	var fecha1 = new Date(fechaI);
	var fecha2 = new Date(fechaFi);
	var actividades;
	var asesoriasTO, discapacidades;
	var sexos, generos, etnias, etniasR, etniasSistema, edades, idiomasR, idiomas, idiomasSistema;
	var totalH, totalM, totalSexoT, totalSexoO, totalSexo, totalSen, totalMot,totalMen, totalMul, totalDisT,totalDisO, totalDiscapacidad;
	var totalLesbico, totalGay, totalBisexual, totalTransexual, 
		totalTransgenero, totalTravesti, totalIntersexual,
		totalGenerosT, totalGenerosO, totalG, totalEdadT, 
		totalEdadO, totalEdadS,totalEdad1, totalEdad2, totalEdad3, totalEdad4, totalEdad5, totalEdad6 ;
	var meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Nomviembre", "Diciembre"];
	console.log(fecha1.getUTCDate(), meses[fecha1.getUTCMonth()]);
	//console.log(getBase64FromImageUrl('../../recursos/images/cabecera.png'));
	$.ajax({
		url: "../../controlador/personal_campo/controladorInformeExp.php",
		type: "POST",
		data: "fechaI=" + fechaI + "&fechaF=" + fechaFi,
		success: function (data) {
			var base64 = globalHeaderPDF;
			var jsonInforme = jQuery.parseJSON(data);

			/* actividades = getNumActividades(jsonInforme);
			asesoriasTO = getNumAsesoriasTO(jsonInforme);
			sexos = getNumSexoUsuarios(jsonInforme);
			discapacidades = getNumDiscapacidadUsuarios(jsonInforme);
			generos = getNumGeneroUsuarios(jsonInforme);
			etnias = getNumEtniasUsuarios(jsonInforme);
			idiomas = getNumIdiomasUsuarios(jsonInforme);
			idiomasSistema = getIdiomasBySistema(getArrayIdiomasSystem(jsonInforme), jsonInforme);						
			etniasSistema = getEtniasBySistema(getArrayEtniasSystem(jsonInforme), jsonInforme);
			idiomasR = generarRowsIdiomas(idiomas, idiomasSistema);
			etniasR = generarRowsEtnias(etnias, etniasSistema);
			edades = getNumEdadUsuarios(jsonInforme);
			console.log(edades, ' edades por sistema');
			console.log(etniasR, '  CUERPO DE LA TABLA ETNIAS');			
			console.log(idiomasR, '  CUERPO DE LA TABLA IDIOMAS');

			totalH = sexos['numMascT'] + sexos['numMascO'];
			totalM = sexos['numFemT'] + sexos['numFemO'];
			totalSexo = totalH + totalM;
			totalSexoT = sexos['numMascT'] + sexos['numFemT'];
			totalSexoO = sexos['numMascO'] + sexos['numFemO'];


			totalSen = discapacidades['numSensorialesT'] + discapacidades['numSensorialesO'];			
			totalMot = discapacidades['numMotricesT'] + discapacidades['numMotricesO'];			
			totalMen = discapacidades['numMentalesT'] + discapacidades['numMentalesO'];
			totalMul = discapacidades['numMultiplesT'] + discapacidades['numMultiplesO'];	

			totalDisT = discapacidades['numSensorialesT'] + discapacidades['numMotricesT'] + discapacidades['numMentalesT']+discapacidades['numMultiplesT'];
			totalDisO =  discapacidades['numSensorialesO'] + discapacidades['numMotricesO'] + discapacidades['numMentalesO']+discapacidades['numMultiplesO'];
			totalDiscapacidad = totalDisT + totalDisO;


			totalLesbico = generos['numLesbicoT'] + generos['numLesbicoO'];
			totalGay = generos['numGayT'] + generos['numGayO'];
			totalBisexual = generos['numBisexualT'] + generos['numBisexualO'];
			totalTransexual = generos['numTransexualT'] + generos['numTransexualO'];
			totalTransgenero = generos['numTransgeneroT'] + generos['numTransgeneroO'];
			totalTravesti = generos['numTravestiT'] + generos['numTravestiO'];
			totalIntersexual = generos['numIntersexualT'] + generos['numIntersexualO'];
			totalGenerosT = generos['numLesbicoT'] + generos['numGayT'] + generos['numBisexualT'] + generos['numTransexualT'] + generos['numTransgeneroT'] + generos['numTravestiT'] + generos['numIntersexualT'];
			totalGenerosO = generos['numLesbicoO'] + generos['numGayO'] + generos['numBisexualO'] + generos['numTransexualO'] + generos['numTransgeneroO'] + generos['numTravestiO'] + generos['numIntersexualO'];

			totalG = totalLesbico + totalGay + totalBisexual + totalTransexual + totalTransgenero + totalTravesti + totalIntersexual;
			totalEdad1 =  edades['edades1T'] +  edades['edades1O'];
			totalEdad2 =  edades['edades2T'] +  edades['edades2O'];
			totalEdad3 =  edades['edades3T'] +  edades['edades3O'];
			totalEdad4 =  edades['edades4T'] +  edades['edades4O'];
			totalEdad5 =  edades['edades5T'] +  edades['edades5O'];
			totalEdad6 =  edades['edades6T'] +  edades['edades6O'];
			totalEdadT = edades['edades1T'] + edades['edades2T'] + edades['edades3T'] + edades['edades4T'] + edades['edades5T'] +  edades['edades6T'];
			totalEdadO =  edades['edades1O'] + edades['edades2O'] + edades['edades3O'] + edades['edades4O'] + edades['edades5O'] +  edades['edades6O'];
			totalEdadS = totalEdadT + totalEdadO;
 */

			//console.log(arrays, ' arrays prueba 1');

			/* 	
									['total', '302','123','1232'],
									['total', '302','123','1232']
			'numMascT',
				'numFemT',
				'numMascO',
			'numFemO',
						var contenido = '';
						$.each(jsonInforme, function (KEY, VALOR) {
							contenido += 'Nombre del defensor: ' + VALOR.Defensor + '\n';
							contenido += 'Nombre del usuario de servicio: ' + VALOR.Usuario + '\n';
							contenido += 'Fecha de registro: ' + VALOR.fecha_registro + '\n';
							contenido += 'Observaciones: ' + VALOR.observacion + '\n\n';
						}); 
			*/
			var fecha = new Date();
			var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
			var fechaF = fecha.toLocaleDateString("es-ES", options);

			var primerM = fechaF.charAt(0).toUpperCase();
			var siguiente = fechaF.slice(1).toLowerCase();
			var dd = {
				watermark: { text: 'www oaxaca gob mx', color: 'gray', opacity: 0.3, bold: true, italics: false },
				pageSize: 'A4',
				pageOrientation: 'portrait',
				header: {
					margin: [105, 20, 100, 0],
					columns: [
						{
							// usually you would use a dataUri instead of the name for client-side printing
							// sampleImage.jpg however works inside playground so you can play with it
							image: 'data:image/png;base64,' + base64, width: 400, height: 60
						}
					]
				},
				footer: function (currentPage, pageCount) {
					return {
						table: {
							widths: ['*', 00],
							body: [
								[
									{ text: 'Pág. ' + currentPage + ' de ' + pageCount + '   ', alignment: 'center', bold: true, color: 'gray' }
								]
							]
						},
						layout: 'noBorders',
					};
				},
				// [left, top, right, bottom] or [horizontal, vertical] or just a number for equal margins
				pageMargins: [80, 60, 40, 60],
				content: [
					{
						stack: [
							'“2018, AÑO DE LA ERRADICACIÓN DEL TRABAJO INFANTIL”',
							{
								text: 'Reyes Mantecón, San Bartolo Coyotepec, Oax; ' + primerM + siguiente + '.\n' +
									'Periodo de ' + fechaI + ' a ' + fechaFi, style: 'subheader'
							},
						],
						style: 'header'
					},
					{ text: '1.- INFORME GENERAL DE EXPEDIENTES', style: 'subheader2' },
					{ text: 'Con el objetivo de contribuir a una justicia pronta, expedita e imparcial, durante el periodo que comprende del ' + fecha1.getUTCDate() + ' de ' + meses[fecha1.getUTCMonth()] + ' al ' + fecha2.getUTCDate() + ' de ' + meses[fecha2.getUTCMonth()] + ' del presente año, la Defensoría Pública brindó N servicios gratuitos de asesorías jurídicas generales, lo anterior se detalla de la siguiente manera:', style: 'textoJustificado' },// actividades['asesorias'] 
					{
						style: 'tableExample',
						color: 'black',
						table: {
							headerRows: 1,
							// keepWithHeaderRows: 1,
							body: [
								[
									{ text: 'Sistema de justicia', style: 'tableHeader', alignment: 'center' },
									{ text: 'Tradicional', style: 'tableHeader', alignment: 'center' },
									{ text: 'Acusatorio y oral', style: 'tableHeader', alignment: 'center' },
								],
								['Usuarios atendidos', '',''],//asesoriasTO['asesTradicional'], asesoriasTO['asesOral']],
							]
						}
					},
					{ text: 'Del total general de usuarios atendidos, a continuación se desglosan los atributos de los beneficiarios:', style: 'textoJustificado' },
					{
						style: 'tableExample',
						color: 'black',
						table: {
							widths: [200, 'auto', 'auto', 'auto'],
							headerRows: 2,
							// keepWithHeaderRows: 1,
							body: [
								[
									{ text: 'Sexo', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
									{ text: 'Sistema de justicia', colSpan: 3, style: 'tableHeader', alignment: 'center' },
									{}, {}
								],
								[
									{},
									{ text: 'Total', style: 'tableHeader', alignment: 'center' },
									{ text: 'Tradicional', style: 'tableHeader', alignment: 'center' },
									{ text: 'Acusatorío y oral', style: 'tableHeader', alignment: 'center' }
								],
								['Hombre', '','',''],
								['Mujer',  '','',''],
								['Total', '','','']
							]
						}
					},
					{
						style: 'tableExample',
						color: 'black',
						table: {
							widths: [200, 'auto', 'auto', 'auto'],
							headerRows: 2,
							// keepWithHeaderRows: 1,
							body: [
								[
									{ text: 'Género', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
									{ text: 'Sistema de justicia', colSpan: 3, style: 'tableHeader', alignment: 'center' },
									{}, {}
								],
								[
									{},
									{ text: 'Total', style: 'tableHeader', alignment: 'center' },
									{ text: 'Tradicional', style: 'tableHeader', alignment: 'center' },
									{ text: 'Acusatorío y oral', style: 'tableHeader', alignment: 'center' }
								],
								['Lésbico',  '','',''],
								['Gay',  '','',''],
								['Bisexual',  '','',''],
								['Transexual',  '','',''],
								['Transgénero',  '','',''],//totalTransgenero, generos['numTransgeneroT'], generos['numTransgeneroO']],
								['Travestí', '','',''],// totalTravesti, generos['numTravestiT'], generos['numTravestiO']],
								['Intersexual',  '','',''],//totalIntersexual, generos['numIntersexualT'], generos['numIntersexualO']],
								['Total', '','',''] //totalG, totalGenerosT, totalGenerosO]
							]
						}
					},
					{ text: '\n ', style: 'saltoLinea' },
					{
						style: 'tableExample',
						color: 'black',
						table: {
							widths: [200, 'auto', 'auto', 'auto'],
							headerRows: 2,
							// keepWithHeaderRows: 1,
							body: [
								[
									{ text: 'Edad', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
									{ text: 'Sistema de justicia', colSpan: 3, style: 'tableHeader', alignment: 'center' },
									{}, {}
								],
								[
									{},
									{ text: 'Total', style: 'tableHeader', alignment: 'center' },
									{ text: 'Tradicional', style: 'tableHeader', alignment: 'center' },
									{ text: 'Acusatorío y oral', style: 'tableHeader', alignment: 'center' }
								],
								['0-7 Años',	 '','',''],//totalEdad1, edades['edades1T'], edades['edades1O']],
								['8-12 Años',	'','',''],//totalEdad2, edades['edades2T'], edades['edades2O']],
								['13-18 Años',	'','',''],//totalEdad3, edades['edades3T'], edades['edades3O']],
								['19-25 Años',	'','',''],//totalEdad4, edades['edades4T'], edades['edades4O']],
								['26-30 Años',	'','',''],//totalEdad5, edades['edades5T'], edades['edades5O']],
								['31-90 Años',	'','',''],//totalEdad6, edades['edades6T'], edades['edades6O']],
								['Total', 		'','','']//totalEdadS, totalEdadT,totalEdadO]
							]
						}
					},
					{
						style: 'tableExample',
						color: 'black',
						table: {//etnias
							widths: [200, 'auto', 'auto', 'auto'],
							headerRows: 2,
							// keepWithHeaderRows: 1,
							body: //etniasR
							[
								[
									{ text: 'Etnias', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
									{ text: 'Sistema de justicia', colSpan: 3, style: 'tableHeader', alignment: 'center' },
									{}, {}
								],
								[
									{},
									{ text: 'Total', style: 'tableHeader', alignment: 'center' },
									{ text: 'Tradicional', style: 'tableHeader', alignment: 'center' },
									{ text: 'Acusatorío y oral', style: 'tableHeader', alignment: 'center' }
								],
								['Etnia 1','','',''], //totalSen,  discapacidades['numSensorialesT'],  discapacidades['numSensorialesO']],
								['Etnia 2', '','',''],//totalMot, discapacidades['numMotricesT'],  discapacidades['numMotricesO']],
								['Etnia 3', '','',''],//totalMen,  discapacidades['numMentalesT'],  discapacidades['numMentalesO']],
								['Etnia 4','','',''],// totalMul,  discapacidades['numMultiplesT'],  discapacidades['numMultiplesO']],
								['Total','','','']// totalDiscapacidad, totalDisT, totalDisO]
							]
						}
					},
					{ text: '\n\n', style: 'saltoLinea' }, { text: '\n\n', style: 'saltoLinea' },
					{
						style: 'tableExample',
						color: 'black',
						table: {
							widths: [200, 'auto', 'auto', 'auto'],
							headerRows: 2,
							// keepWithHeaderRows: 1,
							body: //idiomasR
							[
								[
									{ text: 'Idioma o Lengua', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
									{ text: 'Sistema de justicia', colSpan: 3, style: 'tableHeader', alignment: 'center' },
									{}, {}
								],
								[
									{},
									{ text: 'Total', style: 'tableHeader', alignment: 'center' },
									{ text: 'Tradicional', style: 'tableHeader', alignment: 'center' },
									{ text: 'Acusatorío y oral', style: 'tableHeader', alignment: 'center' }
								],
								['Idioma 1','','',''], //totalSen,  discapacidades['numSensorialesT'],  discapacidades['numSensorialesO']],
								['Idioma 2', '','',''],//totalMot, discapacidades['numMotricesT'],  discapacidades['numMotricesO']],
								['Idioma 3', '','',''],//totalMen,  discapacidades['numMentalesT'],  discapacidades['numMentalesO']],
								['Idioma 4','','',''],// totalMul,  discapacidades['numMultiplesT'],  discapacidades['numMultiplesO']],
								['Total','','','']// totalDiscapacidad, totalDisT, totalDisO]
							]
						}
					},		
					{
						style: 'tableExample',
						color: 'black',
						table: {
							widths: ['auto', 'auto', 'auto', 'auto'],
							headerRows: 2,
							// keepWithHeaderRows: 1,
							body: [
								[
									{ text: 'Discapacidades', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
									{ text: 'Sistema de justicia', colSpan: 3, style: 'tableHeader', alignment: 'center' },
									{}, {}
								],
								[
									{},
									{ text: 'Total', style: 'tableHeader', alignment: 'center' },
									{ text: 'Tradicional', style: 'tableHeader', alignment: 'center' },
									{ text: 'Acusatorío y oral', style: 'tableHeader', alignment: 'center' }
								],
								['Sensoriales y de la comunicación','','',''], //totalSen,  discapacidades['numSensorialesT'],  discapacidades['numSensorialesO']],
								['Motrices', '','',''],//totalMot, discapacidades['numMotricesT'],  discapacidades['numMotricesO']],
								['Mentales', '','',''],//totalMen,  discapacidades['numMentalesT'],  discapacidades['numMentalesO']],
								['Multiples','','',''],// totalMul,  discapacidades['numMultiplesT'],  discapacidades['numMultiplesO']],
								['Total','','','']// totalDiscapacidad, totalDisT, totalDisO]
							]
						}
					},
					{ text: '\n ', style: 'saltoLinea' },
					{ text: '* Mostrar listado de los 10 defensores públicos que reportan un alto número de asesorías jurídicas brindadas en el periodo establecido en la búsqueda, así como los 10 defensores que reportan los números más bajos en  asesorías jurídicas, esto también por sistema. ', style: 'textoJustificado' },
					{ text: '10 DEFENSORES CON ALTO NÚMERO DE ASESORÍAS JURÍDICAS' },
					{
						style: 'tableExample',
						color: 'black',
						table: {
							widths: ['auto', 'auto', 'auto', 'auto', 'auto'],
							headerRows: 2,
							// keepWithHeaderRows: 1,
							body: [
								[
									{ text: 'Defensor público', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
									{ text: 'Asesorías brindadas', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
									{ text: 'Lugar de adscripción', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
									{ text: 'Sistema de justicia', colSpan: 2, style: 'tableHeader', alignment: 'center' },
									{}
								],
								[
									{},
									{},
									{},
									{ text: 'Tradicional', style: 'tableHeader', alignment: 'center' },
									{ text: 'Acusatorío y oral', style: 'tableHeader', alignment: 'center' }
								],
								['1', ' ', ' ', ' ', ' '],
								['2', ' ', ' ', ' ', ' '],
								['3', ' ', ' ', ' ', ''],
								['4', ' ', ' ', ' ', ''],
								['5', ' ', ' ', ' ', ''],
								['6', ' ', ' ', ' ', ''],
								['7', ' ', ' ', ' ', ''],
								['8', ' ', ' ', ' ', ''],
								['9', ' ', ' ', ' ', ''],
								['10', ' ', ' ', ' ', '']
							]
						}
					},
					{ text: '\n ', style: 'saltoLinea' },
					{ text: '10 DEFENSORES CON UN BAJO NÚMERO DE ASESORÍAS JURÍDICAS' },
					{
						style: 'tableExample',
						color: 'black',
						table: {
							widths: ['auto', 'auto', 'auto', 'auto', 'auto'],
							headerRows: 2,
							// keepWithHeaderRows: 1,
							body: [
								[
									{ text: 'Defensor público', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
									{ text: 'Asesorías brindadas', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
									{ text: 'Lugar de adscripción', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
									{ text: 'Sistema de justicia', colSpan: 2, style: 'tableHeader', alignment: 'center' },
									{}
								],
								[
									{},
									{},
									{},
									{ text: 'Tradicional', style: 'tableHeader', alignment: 'center' },
									{ text: 'Acusatorío y oral', style: 'tableHeader', alignment: 'center' }
								],
								['1', ' ', ' ', ' ', ' '],
								['2', ' ', ' ', ' ', ' '],
								['3', ' ', ' ', ' ', ''],
								['4', ' ', ' ', ' ', ''],
								['5', ' ', ' ', ' ', ''],
								['6', ' ', ' ', ' ', ''],
								['7', ' ', ' ', ' ', ''],
								['8', ' ', ' ', ' ', ''],
								['9', ' ', ' ', ' ', ''],
								['10', ' ', ' ', ' ', '']
							]
						}
					},
			
					{ text: '2.- AUDIENCIAS', style: 'subheader2' },
					{
						text: 'Durante el periodo que comprende del ___ de _______ al ____ de ________ del 			presente año, los Defensores Públicos asistieron a _______ audiencias celebradas.', style: 'textoJustificado'
					},
					{ text: 'Por sistema__________ Sistema Tradicional: materia penal _____; materia civil ________; materia familiar _______; materia administrativa _______; materia agraria ________; materia ejecución de sanciones ________; tribunal de alzada _______. Sistema Acusatorio y oral: materia penal adultos __________; materia penal adolescentes ________; materia ejecución de sanciones ________.', style: 'textoJustificado' },
					{ text: '* Mostrar listado de los 10 defensores públicos que reportan un alto número de asistencia a audiencias en el periodo establecido en la búsqueda, así como los 10 defensores que reportan los números más bajos de asistencia en audiencias, esto también por sistema.', style: 'textoJustificado' },
					{ text: '\n ', style: 'saltoLinea' },
					{ text: '10 DEFENSORES CON ALTO NÚMERO DE AUDIENCIAS' },
					{
						style: 'tableExample',
						color: 'black',
						table: {
							widths: ['auto', 'auto', 'auto', 'auto', 'auto'],
							headerRows: 2,
							// keepWithHeaderRows: 1,
							body: [
								[
									{ text: 'Defensor público', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
									{ text: 'Asistencia \nde audiencias', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
									{ text: 'Lugar de adscripción', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
									{ text: 'Sistema de justicia', colSpan: 2, style: 'tableHeader', alignment: 'center' },
									{}
								],
								[
									{},
									{},
									{},
									{ text: 'Tradicional', style: 'tableHeader', alignment: 'center' },
									{ text: 'Acusatorío y oral', style: 'tableHeader', alignment: 'center' }
								],
								['1', ' ', ' ', ' ', ''],
								['2', ' ', ' ', ' ', ''],
								['3', ' ', ' ', ' ', ''],
								['4', ' ', ' ', ' ', ''],
								['5', ' ', ' ', ' ', ''],
								['6', ' ', ' ', ' ', ''],
								['7', ' ', ' ', ' ', ''],
								['8', ' ', ' ', ' ', ''],
								['9', ' ', ' ', ' ', ''],
								['10', ' ', ' ', ' ', '']
							]
						}
					},
			
					{ text: '10 DEFENSORES CON UN BAJO NÚMERO DE AUDIENCIAS' },
					{
						style: 'tableExample',
						color: 'black',
						table: {
							widths: ['auto', 'auto', 'auto', 'auto', 'auto'],
							headerRows: 2,
							// keepWithHeaderRows: 1,
							body: [
								[
									{ text: 'Defensor público', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
									{ text: 'Asistencia \nde audiencias', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
									{ text: 'Lugar de adscripción', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
									{ text: 'Sistema de justicia', colSpan: 2, style: 'tableHeader', alignment: 'center' },
									{}
								],
								[
									{},
									{},
									{},
									{ text: 'Tradicional', style: 'tableHeader', alignment: 'center' },
									{ text: 'Acusatorío y oral', style: 'tableHeader', alignment: 'center' }
								],
								['1', ' ', ' ', ' ', ' '],
								['2', ' ', ' ', ' ', ' '],
								['3', ' ', ' ', ' ', ''],
								['4', ' ', ' ', ' ', ''],
								['5', ' ', ' ', ' ', ''],
								['6', ' ', ' ', ' ', ''],
								['7', ' ', ' ', ' ', ''],
								['8', ' ', ' ', ' ', ''],
								['9', ' ', ' ', ' ', ''],
								['10', ' ', ' ', ' ', '']
							]
						}
					},
					{ text: '\n ', style: 'saltoLinea' },
					{ text: '3.- VISITAS CARCELARÍAS', style: 'subheader2' },
					{
						text: 'Durante el periodo que comprende del ___ de _______ al ____ de ________ del presente año, los Defensores Públicos realizaron ___________ visitas carcelarias a sus internos.', style: 'textoJustificado'
					},
					{ text: 'Por sistema__________ Sistema Tradicional: materia penal _____; materia ejecución de sanciones ________ Sistema Acusatorio y oral: materia penal adultos __________; materia penal adolescentes ________; materia ejecución de sanciones ________.', style: 'textoJustificado' },
					{ text: '* Mostrar listado de los 10 defensores públicos que reportan un alto número de visitas carcelarias  en el periodo establecido en la búsqueda, así como los 10 defensores que reportan los números más bajos en visitas carcelarias , esto también por sistema.', style: 'textoJustificado' },
					{ text: '10 DEFENSORES CON ALTO NÚMERO DE VISITAS CARCELARÍAS' },
					{
						style: 'tableExample',
						color: 'black',
						table: {
							widths: ['auto', 'auto', 'auto', 'auto', 'auto'],
							headerRows: 2,
							// keepWithHeaderRows: 1,
							body: [
								[
									{ text: 'Defensor público', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
									{ text: 'Visitas \n Carcelarías', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
									{ text: 'Lugar de adscripción', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
									{ text: 'Sistema de justicia', colSpan: 2, style: 'tableHeader', alignment: 'center' },
									{}
								],
								[
									{},
									{},
									{},
									{ text: 'Tradicional', style: 'tableHeader', alignment: 'center' },
									{ text: 'Acusatorío y oral', style: 'tableHeader', alignment: 'center' }
								],
								['1', ' ', ' ', ' ', ' '],
								['2', ' ', ' ', ' ', ' '],
								['3', ' ', ' ', ' ', ''],
								['4', ' ', ' ', ' ', ''],
								['5', ' ', ' ', ' ', ''],
								['6', ' ', ' ', ' ', ''],
								['7', ' ', ' ', ' ', ''],
								['8', ' ', ' ', ' ', ''],
								['9', ' ', ' ', ' ', ''],
								['10', ' ', ' ', ' ', '']
							]
						}
					},
					{ text: '\n\n\n ', style: 'saltoLinea' },
					{ text: '10 DEFENSORES CON UN BAJO NÚMERO DE VISITAS CARCELARÍAS' },
					{
						style: 'tableExample',
						color: 'black',
						table: {
							widths: ['auto', 'auto', 'auto', 'auto', 'auto'],
							headerRows: 2,
							// keepWithHeaderRows: 1,
							body: [
								[
									{ text: 'Defensor público', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
									{ text: 'Visitas \n Carcelarías', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
									{ text: 'Lugar de adscripción', rowSpan: 2, style: 'tableHeader', alignment: 'center' },
									{ text: 'Sistema de justicia', colSpan: 2, style: 'tableHeader', alignment: 'center' },
									{}
								],
								[
									{},
									{},
									{},
									{ text: 'Tradicional', style: 'tableHeader', alignment: 'center' },
									{ text: 'Acusatorío y oral', style: 'tableHeader', alignment: 'center' }
								],
								['1', ' ', ' ', ' ', ' '],
								['2', ' ', ' ', ' ', ' '],
								['3', ' ', ' ', ' ', ''],
								['4', ' ', ' ', ' ', ''],
								['5', ' ', ' ', ' ', ''],
								['6', ' ', ' ', ' ', ''],
								['7', ' ', ' ', ' ', ''],
								['8', ' ', ' ', ' ', ''],
								['9', ' ', ' ', ' ', ''],
								['10', ' ', ' ', ' ', '']
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
									{ text: 'C.c.p.-', style: ['quote', 'small'] },
									{
										text: 'Mtro. Jesús Gerardo Herrera Pérez.- Director de la Defensoría 		Pública del Estado de Oaxaca.- 		Para su conocimiento e intervención.- 	Presente.-C.P Pablo R. López Santos.- Secretario Técnico.- Para 	mismo 	fin.- Presente	Exp. y minutario.', style: ['quote', 'small']
									}
								]
							]
						}, layout: 'noBorders'
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
						alignment: 'right',
						margin: [0, 10, 0, 0]
					},
					textoJustificado: {
						fontSize: 11,
						alignment: 'justify',
						margin: [0, 0, 15, 15],
					},
					subheader2: {
						fontSize: 11,
						alignment: 'left',
						margin: [0, 0, 15, 15],
						bold: 'true'
					},
					tableExample: {
						margin: [0, 5, 0, 15]
					},
					tableHeader: {
						bold: true,
						fontSize: 13,
						color: 'black'
					},
					saltoLinea: {
						margin: [0, 200, 0, 0]
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
			//console.log(fecha1, ' fecha actual ');

			// print the PDF
			//pdfMake.createPdf(docDefinition).print();

			// download the PDF
			//pdfMake.createPdf(docDefinition).download('optionalName.pdf');
			pdfMake.createPdf(dd).open();
		}
	});
	console.timeEnd('Test performance');
};
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
			//inputProject = $('#project').val();//ajax con fechas y input con defensor unico
			inputProject = $('#idDefensor').val();
			console.log('PETICION AJAX  PERIODO + DEFENSOR');
			console.log($('#idDefensor').val(), 'id del defensor');
			$.ajax({
				url: "../../controlador/personal_campo/controladorInformeAct.php",
				type: "POST",
				data: {"fechaI":fechaI, "fechaF":fechaFi, "defensor":inputProject,
					   "radio1":r1, "check":checkDef},
				success: function (data) {			
					console.log(data, 'resultado R1 con un defensor');
					var jsonInforme = jQuery.parseJSON(data);					
					console.log(jsonInforme,' valor jsonInfr');
					var pdfAct;
					  pdfAct = informeByDefPeriodo(jsonInforme);					  
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
					console.log(data, ' resultado R1 vario defensores');		
					var jsonInforme = jQuery.parseJSON(data);
					console.log('solopor periodo ', jsonInforme);
					var pdfAct = funcionGlobalInformeAct(jsonInforme);					  
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
					console.log(data, ' resultado r2 por defensor');
					var jsonInforme = jQuery.parseJSON(data);
					console.log('completo by defensor ', jsonInforme);
					var pdfAct= informeByDefCompleto(jsonInforme)
					  
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
					console.log(data, ' resultado r2 varios defensores');		
					var jsonInforme = jQuery.parseJSON(data);
					console.log('completo FULL ', jsonInforme);
					var pdfAct = informeCompleto(jsonInforme)					  
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
					var pdfAct= informeByDefParcialPeriodo(jsonInforme,selectAtributos);					  
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
					var pdfAct= funcionGlobalInformeAct(jsonInforme);					  
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
					console.log(data, 'resultado r4 por defensor');
					var jsonInforme = jQuery.parseJSON(data);
					console.log('completo by defensor ', jsonInforme);
					var pdfAct= informeByDefCompletoParcial(jsonInforme)					  
					  //print the PDF
					  //pdfMake.createPdf(docDefinition).print();
					  //download the PDF
					  //pdfMake.createPdf(docDefinition).download('optionalName.pdf');	  
						pdfMake.createPdf(pdfAct).open();
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
					console.log(data, ' resultado r4 varios defensores');		
					var jsonInforme = jQuery.parseJSON(data);
					console.log('completo FULL ', jsonInforme);

					var pdfAct= informeCompletoParcial(jsonInforme)
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
    $.ajax({
      type: 'GET',
      url: '../../controlador/defensor/controladorListaDef.php?term=busqueda',
      success: function (data) {		 		
		 functionInputDefensores(data);
      },
      error: function () {
		  alert('Error peticion Ajax ');
      }
      });
      
}
function functionInputDefensores(dataDefe){
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
	var desc = $('#botonDesc').get(0);	
	var rParcialC = $('#inputRadio4').get(0).checked;
	var rParcialP = $('#inputRadio3').get(0).checked;
	var inicio = $('#inputInicio')[0].value;
	var final = $('#inputFinal')[0].value;
	var selectSistema  = $('#selectSistema').val();
	var inputProject = $('#project').val();
	if(val){
		$('#idCheckDefensor').removeAttr('style'); //entonces muestra su input
		dataDefensor();
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
	//var rParcialC = $('#inputRadio4').get(0).checked;
	//var rParcialP = $('#inputRadio3').get(0).checked;
	var inicio = $('#inputInicio')[0].value;
	var final = $('#inputFinal')[0].value;
	var inputProject = $('#project').val();
	if(val){
		$('#idCheckDefensor').removeAttr('style'); //entonces muestra su input
		dataDefensor();
	}else{
		$("#idCheckDefensor").attr('style','display:none');
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
function myFunctionSistemaParcial(val){// aqui tambien debe checar por radio en que se encuentra
	var inicio = $('#inputInicio').val();
	var final = $('#inputFinal').val();
	var check = $('#checkId').get(0).checked;
	var rParcialC = $('#inputRadio4').get(0).checked;
	var rParcialP = $('#inputRadio3').get(0).checked;
	var selectProject = $('#project').val();
	var selectSistema = $('#selectSistema').get(0); 
	var desc = $('#botonDesc').get(0);   
	console.log(check, "valor seleccionadpo");
	if(rParcialP){//esta activado por periodo
		if(check){
			if(	selectProject != '' && myFunctionDate('') != false && val !=''){
				desc.disabled = false;
				return true;
			}
			desc.disabled = true;
			return false;
		}else{
			if( myFunctionDate('') != false && val !=''){
				desc.disabled = false;
				return true;
			}
			desc.disabled = true;
			return false;
		}
	} 
	if(rParcialC){//esta activado por periodo
		if(check){
			if(	selectProject != ''  && val !=''){
				desc.disabled = false;
				return true;
			}
			desc.disabled = true;
			return false;
		}else{
			if(val !=''){
				desc.disabled = false;
				return true;
			}
			desc.disabled = true;
			return false;
		}
	} 
	desc.disabled = true;
	return false;
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

