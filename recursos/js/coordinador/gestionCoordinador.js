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
  
});

