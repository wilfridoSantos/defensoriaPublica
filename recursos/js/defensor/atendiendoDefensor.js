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
          console.log(valor);
            });
		
			}
		});
    
    //asignarDefensor
}