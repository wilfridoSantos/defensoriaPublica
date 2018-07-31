
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
						var elem=$("#rowContenidoExp");
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
							'			  	</div>';//</td>' +
							//'				<td id="">CERO PREGUNTAS POR AHORA<td></tr>';   
				



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
		verInfoDefensor(idDef);
	});
	function verInfoDefensor(idDef) {
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
                console.log("datos del defensor ",jsonInfoDef);
                
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
                    $('#verInfoDef').empty();
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
						'<input type="hidden" class="btn btn-succes btn btn-success" onclick="generaInformeByNue()"  value="Generar Informe" id="generarInfoActByNue"/> ' +
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
					console.log('valor idpersonal-> ', VALOR);

					if (VALOR.foto == '' || VALOR.foto == ' ') {
						VALOR.foto = 'default.png';
					}
					if (VALOR.foto == 'default.png') {
						foto = '<input style="padding-left:300px;" class="inputfile" type="file" required id="fileToUpload" name ="fileToUpload">';
					} else {
						foto = '<input style="padding-left:300px;" class="inputfile" type="file" id="fileToUpload" name ="fileToUpload">';
					}
					console.log("tipo de inpu ",foto);
					
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
						'<p align="center"><img src="../../recursos/uploads/' + VALOR.foto + '"  alt="Imagen respons	ive" class="img-circle img-responsive"/></p>' +
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
	console.log(str);
	console.log(filtro2,"segundo filtro");
	
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
						//	console.log(VALOR, ' valor ');
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
							'<td id_expediente="'+VALOR.id_expediente+'" id_personal="'+VALOR.id_personal+'">' + VALOR.num_expediente + '</td>' +
							'<td>' + VALOR.materia + '</td>' +
							'<td>' + VALOR.fecha_registro + '</td>' +
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
		 // console.log("data del defensor en ajax ",data);
		  		 		
		 functionInputDefensores(data);
      },
      error: function () {
		  alert('Error peticion Ajax en data defensor ');
      }
      });
      
}
dataDefensor();
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
   /*  $( function() {
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
	 }); */
	 
	 
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
		//dataDefensor();
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
		$(divEsp[0]).append('<h3>lasjlak</h3>');
//		divEsp[0].textContent = '<h3>lasjlak</h3>';
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
			$('#idPregunta').append("<address> <span>SE TIENE EL "+
				           parseInt(((data.totalRespuestas*100)/data.totalPreguntas))+"% DE AVANCE </span></address>");
				
			$.each(data.respuestas, function (KEY, VALOR) {
				console.log(VALOR, ' datos de data DENTRO   ');
				$('#idPregunta').append(
					'<div class="form-group col-md-12 col-sm-3 col-xs-12">' +
					'<div class="col-md-6 col-sm-3 col-xs-12"> <label style="" for="name">' +
					(KEY + 1) + ' ' + VALOR.pregunta + ' <span class="required">*</span> </label></div>' +

					'<div class="col-md-6 col-sm-3 col-xs-12"><textarea id="name" class="form-control" data-validate-length-range="6" 	data-validate-words="2" name="name" placeholder="Ingresa una respuesta" required="required" type="text">' + VALOR.respuesta + '</textarea></div>' +

					'</div>' +
					'<div class="col-md-6 col-sm-3 col-xs-12">' +
					'<div><label>' +
					//'<input id="checkObservaciones" name="checkObservaciones" onchange="verObservacion(this, ' + KEY + ')" type="checkbox" unchecked data-switchery="true" > Observaciones' +
					'</label></div>' +
					//'<div id="idObs" name="idObs" ><textarea id="txtA" name="txtA" style="display:none;"></textarea></div>' +
					'</div>');
			});
		}
	});
};


