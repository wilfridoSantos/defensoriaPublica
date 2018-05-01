$(document).ready(function () {



	//var botonVer = document.getElementsByClassName('boton');

	$('#tebody').on('click', '.boton', function (evst) {
		//		  var target= $(event.target);
		//  var target= $(this.);
		var idDef = $(this).closest('tr').find('#idDefensor').text()
		//console.log(idDef);
		verInfo(idDef);
	});
	function verInfo(idDef) {
		$.ajax({
			url: "../../controlador/defensor/controlDefensor.php",
			type: "post",
			data: "id_defensor=" + idDef,
			beforeSend: function () {
				$('#menuContainer').load('verInfoDefensor.php');
			},
			success: function (data) {

				var jsonInfoDef = jQuery.parseJSON(data);
				console.log(jsonInfoDef.id_defensor, 'entro   ');
				
				$.each(jsonInfoDef, function (KEY, VALOR) {
					console.log(VALOR.id_defensor , " ID defensor");

				$('#verInfoDef').append(

					'<div class="row"> '+
					'<div  class="col-md-12 col-sm-12 col-xs-12  profile_details">'+
					'<div class="col-md-10 col-sm-10 col-xs-12 well profile_view" class="col-xl-12">'+
					  '<div class="col-sm-12">'+
						'<div class="left col-xs-7">'+
						  '<h2><span class="glyphicon glyphicon-user"></span>'+VALOR.nombre+' '+VALOR.ap_paterno+' '+VALOR.ap_materno+'</h2>'+
						  
						  '<p><span class="glyphicon glyphicon-lock"></span><strong>'+VALOR.perfil+'</strong></p>'+
						  '<hr/>'+
						  '<ul class="list-unstyled">'+
							'<li><span class="glyphicon glyphicon-info-sign"></span> Direccion: '+ VALOR.calle+', '+ VALOR.numero_ext+', '+ VALOR.numero_int+', '+' </li>'+					
							'<li><span class="glyphicon glyphicon-info-sign"></span> Curp #:'+VALOR.curp+' </li>'+							
							'<li><span class="glyphicon glyphicon-info-sign"></span> Nup #:'+VALOR.nup+' </li>'+
							'<li><span class="glyphicon glyphicon-info-sign"></span> Nue #:'+VALOR.nue+' </li>'+
							'<li><span class="glyphicon glyphicon-info-sign"></span> Juzgado #:'+VALOR.juzgado+' </li>'+
							'<li><span class="glyphicon glyphicon-info-sign"></span> Cedula Profesional #:'+VALOR.cedula_profesional+' </li>'+
							'<li><span class="glyphicon glyphicon-envelope"></span> E-Mail #:'+VALOR.corre_electronico+' </li>'+
						  '</ul>'+
						'</div>'+
						'<div class="right col-xs-5 ">'+
						  '<p align="right"><img src="../../recursos/images/img.jpg" alt="" class="img-circle img-responsive">'+ VALOR.perfil+'</p>'+
						'</div>'+
					  '</div>'+
					  '</div>'+
					'</div>'+
				  '</div>'+
				'</div>');
				});	
			}
		});
	}


	$('#tebody').on('click', '.botonUp', function (evst) {
		//		  var target= $(event.target);
		//  var target= $(this.);
		var id_def = $(this).closest('tr').find('#idDefensor').text()

		updateDefensor(id_def);
	});
	function updateDefensor(id_def) {
		$.ajax({
			url: "../../controlador/defensor/updateDefensor.php",
			type: "post",
			data: "id_defensor=" + id_def,
			beforeSend: function () {
				$('#menuContainer').load('updateDef.php');
			},
			success: function (data) {
				var jsonUpdateDef = jQuery.parseJSON(data);
				console.log(jsonUpdateDef);

				//var jsonExpediente = jQuery.parseJSON(data);
				//console.log(jsonExpediente.id_defensor , 'wiiiiii');
				
				$.each(jsonUpdateDef, function (KEY, VALOR) {
					//console.log(VALOR.id_defensor , " ID defensor");

					$('#updateDefensor').append(
						'<form  class="form-horizontal form-label-left" action ="../../controlador/defensor/controlActualizarDef.php"  method="post">' +
						'<div class="form-group">' +
						'<label class="control-label col-md-3 col-sm-3 col-xs-4"><span class="required"></span></label>' +
						'<div class="col-md-6 col-sm-6 col-xs-12  form-group has-feedback">' +
						'<input type="text" class="form-control" id="id_defensor" placeholder="ID Defensor" name="id_defensor"' +
						'value="' + VALOR.id_defensor + '" readonly>' +
						'</div>' +
						'</div>' +
						'<div class="form-group">' +
						'<label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre<span class="required">*</span></label>' +
						'<div class="col-md-6 col-sm-6 col-xs-12  form-group has-feedback">' +
						'<input type="text" required pattern= "[A-Za-z]+" title = "Se aceptan solo letras" class="form-control text-uppercase" id="nombre" placeholder="Nombre" name="nombre"' +
						'value="' + VALOR.nombre + '" >' +
						'</div>' +
						'</div>' +
						'<div class="form-group">' +
						'<label class="control-label col-md-3 col-sm-3 col-xs-12">Apellido Paterno<span class="required">*</span></label>' +
						'<div class="col-md-6 col-sm-6 col-xs-12  form-group has-feedback">' +
						'<input type="text" class="form-control" id="ap_paterno" placeholder="apellido Paterno" name="ap_paterno"' +
						'value="' + VALOR.ap_paterno + '">' +
						'</div>' +
						'</div>' +
						'<div class="form-group">' +
						'<label class="control-label col-md-3 col-sm-3 col-xs-4">Apellido Materno<span class="required">*</span></label>' +
						'<div class="col-md-6 col-sm-6 col-xs-4 form-group has-feedback">' +
						'<input type="text" class="form-control" id="ap_materno" placeholder="apellido materno" name="ap_materno"' +
						'value="' + VALOR.ap_materno + '">' +
						'</div>' +
						'</div>' +
						'<div class="form-group">' +
						'<label class="control-label col-md-3 col-sm-3 col-xs-4">Curp<span class="required">*</span></label>' +
						'<div class="col-md-6 col-sm-6 col-xs-4 form-group has-feedback">' +
						'<input type="text" class="form-control" id="curp" placeholder="curp" name="curp"' +
						'value="' + VALOR.curp + '">' +
						'</div>' +
						'</div>' +
						'<div class="form-group">' +
						'<label class="control-label col-md-3 col-sm-3 col-xs-4">Calle<span class="required">*</span></label>' +
						'<div class="col-md-6 col-sm-6 col-xs-4 form-group has-feedback">' +
						'<input type="text" class="form-control" id="calle" placeholder="Calle" name="calle"' +
						'value="' + VALOR.calle + '">' +
						'</div>' +
						'</div>' +
						'<div class="form-group">' +
						'<label class="control-label col-md-3 col-sm-3 col-xs-4">Numero Exterior<span class="required">*</span></label>' +
						'<div class="col-md-6 col-sm-6 col-xs-4 form-group has-feedback">' +
						'<input type="text"  title=""class="form-control" id="numero_ext" placeholder="Numero Exterior" name="numero_ext"' +
						'value="' + VALOR.numero_ext + '">' +
						'</div>' +
						'</div>' +
						'<div class="form-group">' +
						'<label class="control-label col-md-3 col-sm-3 col-xs-4">Numero Interior<span class="required">*</span></label>' +
						'<div class="col-md-6 col-sm-6 col-xs-4 form-group has-feedback">' +
						'<input type="text" class="form-control" id="numero_int" placeholder="Numero Interior" name="numero_int"' +
						'value="' + VALOR.numero_int + '">' +
						'</div>' +
						'</div>' +
						'<div class="form-group">' +
						'<label class="control-label col-md-3 col-sm-3 col-xs-4">Colonia<span class="required">*</span></label>' +
						'<div class="col-md-6 col-sm-6 col-xs-4 form-group has-feedback">' +
						'<input type="text" class="form-control" id="colonia" placeholder="colonia" name="colonia"' +
						'value="' + VALOR.colonia + '">' +
						'</div>' +
						'</div>' +
						'<div class="form-group">' +
						'<label class="control-label col-md-3 col-sm-3 col-xs-4">Municipio<span class="required">*</span></label>' +
						'<div class="col-md-6 col-sm-6 col-xs-4 form-group has-feedback">' +
						'<input type="text" class="form-control" id="municipio" placeholder="Municipio" name="municipio"' +
						'value="' + VALOR.municipio + '">' +
						'</div>' +
						'</div>' +
						'<div class="form-group">' +
						'<label class="control-label col-md-3 col-sm-3 col-xs-12">Numero Nup<span class="required">*</span></label>' +
						'<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">' +
						'<input type="text" class="form-control" id="nup" placeholder="nup" name="nup"' +
						' value="' + VALOR.nup + '">' +
						'</div>' +
						'</div>' +
						'<div class="form-group">' +
						'<label class="control-label col-md-3 col-sm-3 col-xs-4">Numero Nue<span class="required">*</span></label>' +
						'<div class="col-md-6 col-sm-6 col-xs-4 form-group has-feedback">' +
						'<input type="text" class="form-control" id="nue" placeholder="nue" name="nue"' +
						'value="' + VALOR.nue + '">' +
						'</div>' +
						'</div>' +
						'<div class="form-group">' +
						'<label class="control-label col-md-3 col-sm-3 col-xs-12">Genero<span class="required">*</span></label>' +
						'<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">' +
						'<input type="text" class="form-control" id="genero" placeholder="genero" name="genero"' +
						'value="' + VALOR.genero + '">' +
						'</div>' +
						'</div>' +
						'<div class="form-group">' +
						'<label class="control-label col-md-3 col-sm-3 col-xs-12">Telefono<span class="required">*</span></label>' +
						'<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">' +
						'<input type="text" class="form-control" id="telefono" placeholder="Numero Telefonico" name="telefono"' +
						'value="' + VALOR.telefono + '">' +
						'</div>' +
						'</div>' +
						'<div class="form-group">' +
						'<label class="control-label col-md-3 col-sm-3 col-xs-12">E-Mail<span class="required">*</span></label>' +
						'<div class="col-md-6 col-sm-6 col-xs-12  form-group has-feedback">' +
						'<input type="text" class="form-control" id="corre_electronico" placeholder="Correo Electronico" name="corre_electronico"' +
						'value="' + VALOR.corre_electronico + '">' +
						'</div>' +
						'</div>' +
						'<div class="form-group">' +
						'<label class="control-label col-md-3 col-sm-3 col-xs-12">No Cedula<span class="required">*</span></label>' +
						'<div class="col-md-6 col-sm-6 col-xs-12">' +
						'<input type="text" class="form-control"  id="cedula_profesional"  placeholder="numero cedula" name="cedula_profesional"' +
						'value="' + VALOR.cedula_profesional + '">' +
						'</div>' +
						'</div>' +
						'<div class="form-group">' +
						'<label class="control-label col-md-3 col-sm-3 col-xs-12">Juzgado <span class="required">*</span>' +
						'</label>' +
						'<div class="col-md-6 col-sm-6 col-xs-12">' +
						'<input class="date-picker form-control col-md-7 col-xs-4" required="required"  id="juzgado"  placeholder="Juzgado" name="juzgado" type="text"' +
						'value="' + VALOR.juzgado + '">' +
						'</div>' +
						'</div>		  ' +
						'<div class="ln_solid"></div>								' +
						'<div class="form-group">' +
						'<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">' +
						'<!-- <input type="submit"name="cancelar" class="btn btn-primary" value="Cancelar"></button>-->' +
						'<input class="btn btn-primary" type="submit" name="update" ' +
						'value="Actualizar Datos"></input>									 ' +
						'<!--   <button type="submit" class="btn btn-success">Submit</button> -->' +
						'</div>' +
						'</div>' +
						'</form>'
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

