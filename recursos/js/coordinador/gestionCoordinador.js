$(document).ready(function () {
	var informeA=document.getElementById('registrarExpediente');
		informeA.addEventListener('click', registroExpediente, false);
		function registroExpediente() {
            
			 $('#menuContainer').load("registroUsuarioServicio.php");
		};

        var asignarCaso=document.getElementById('asignarCaso');
		asignarCaso.addEventListener('click', asignarCasodefensor, false);
		function asignarCasodefensor() {
           
			 $('#menuContainer').load("asignarDefensor.php");
		};
		var actividad=document.getElementById('registrarActividad');
		actividad.addEventListener('click', registrarActividad, false);
		function registrarActividad() {
           
			 $('#menuContainer').load("registrarActividad.php");
		};
		
		var juzgadoRegistro=document.getElementById('registrarJuzgadoMenu');
		juzgadoRegistro.addEventListener('click', function () {
           
			$('#menuContainer').load("coordinadorRegistrarJuzgado.php");
	   }, false);
		
});

