$(document).ready(function () {

// MOSTRAR VISTA DE CREAR CONTRAPARTE DE LA PARTE DEL EXPEDIENTE
	var creaExpediente=document.getElementById("agregarContraparte");
	   creaExpediente.addEventListener('click',function (curpUser) {
		$('#registroContraparte').load("registrar_contraparte.php?id_expediente="+document.getElementById("numExpedienteGlobal").value);
		console.log("valor del ex ",document.getElementById("numExpedienteGlobal").value);
		console.log($('#id_expediente_contraparte'));
		
		$('#id_expediente').val(document.getElementById("numExpedienteGlobal").value);
		
	  
	},false);
});