$(document).ready(function () {
	var informeA=document.getElementById('registrarExpediente');
		informeA.addEventListener('click', registroExpediente, false);
		function registroExpediente() {
            
			 $('#menuContainer').load("registroUsuarioServicio.php");
		};

          
});

