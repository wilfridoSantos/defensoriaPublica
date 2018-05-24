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
		console.log(listarUser);
		listarUser.addEventListener('click', listarUsuario, false);
		function listarUsuario() {
			console.log('entro en la fun listaUser');
			$('#menuContainer').load("listarUsuario.php");
			//window.location="../../controlador/defensor/controladorListaDef.php"
		};
		
});

