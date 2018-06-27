$(document).ready(function () {


	

// MOSTRAR VISTA DE CREAR CONTRAPARTE DE LA PARTE DEL EXPEDIENTE
	var creaExpediente=document.getElementById("agregarContraparte");
	   creaExpediente.addEventListener('click',function (curpUser) {
		$("#rrellenarPregunta").empty();
		$("#respuestaPregunta").empty();

		$('#registroContraparte').load("registrar_contraparte.php?id_expediente="+document.getElementById("numExpedienteGlobal").value);
		//console.log("valor del ex ",document.getElementById("numExpedienteGlobal").value);
		//console.log($('#id_expediente_contraparte'));
		
		$('#id_expediente').val(document.getElementById("numExpedienteGlobal").value);
		
	  
	},false);


	var creaExpediente=document.getElementById("respuestasContestadas");

	   creaExpediente.addEventListener('click',function (curpUser) {
		   $("#respuestasContestadas").hide();
		   $("#idSeguimiento").show();
		   $("#preguntas").empty();
		   $("#rrellenarPregunta").empty();
		   $("#registroContraparte").empty();
		$('#preguntas').load("materia/actualizarSeguimiento.php"); //tiene que desaparecer las preguntas
			},false);

   var creaExpediente=document.getElementById("idSeguimiento");
	
	   creaExpediente.addEventListener('click',function (curpUser) {
		$("#respuestasContestadas").show();
		$("#idSeguimiento").hide();
		$("#preguntas").empty();
		$("#registroContraparte").empty();
		iniciarPregunta();
		//$('#preguntas').load("materia/ejecucionSanciones.php"); //tiene que desaparecer las preguntas
	        },false);
	
});