$(document).ready(function () {

	
	

// MOSTRAR VISTA DE CREAR CONTRAPARTE DE LA PARTE DEL EXPEDIENTE
	var creaExpediente=document.getElementById("agregarContraparte");
	   creaExpediente.addEventListener('click',function (curpUser) {
				$("[class='active botonContraparte']").removeClass( "active botonContraparte" );
				$(this).addClass( "active botonContraparte" );

				$("#rrellenarPregunta").empty();
				$("#respuestaPregunta").empty();
			
				$("#preguntas").empty();
				$('#registroContraparte').load("registrar_contraparte.php?id_expediente="+document.getElementById("numExpedienteGlobal").value);
				$('#id_expediente').val(document.getElementById("numExpedienteGlobal").value);
		
	  
	},false);


	var creaExpediente=document.getElementById("respuestasContestadas");
		creaExpediente.addEventListener('click',function (curpUser) {
				var botones= document.getElementsByClassName('botonContraparte');	
				//$(".botonContraparte");
				$("[class='active botonContraparte']").removeClass( "active botonContraparte" );
				$(this).addClass( "active botonContraparte" );

				$("#preguntas").empty();
				$("#preguntasAmparo").hide();
				$("#rrellenarPregunta").empty();
				$("#registroContraparte").empty();
				$('#preguntas').show();
				$('#preguntas').load("materia/actualizarSeguimiento.php"); //tiene que desaparecer las preguntas
		},false);

   var creaExpediente=document.getElementById("idSeguimiento");
	
	   creaExpediente.addEventListener('click',function (curpUser) {
				$("[class='active botonContraparte']").removeClass( "active botonContraparte" );
				$(this).addClass( "active botonContraparte" );
				$("#preguntas").show();//muestra las preguntas
				$("#registroContraparte").empty();
				$("#preguntasAmparo").hide();//oculta las preguntas de amparo
				$("#rrellenarPregunta").hide();//oculta el formulario de las preguntas
				
				iniciarPregunta();
		//$('#preguntas').load("materia/ejecucionSanciones.php"); //tiene que desaparecer las preguntas
			},false);
			
			
	var registroAmparo=document.getElementById("registroAmparo");
	   registroAmparo.addEventListener('click',function (curpUser) {
				$("[class='active botonContraparte']").removeClass( "active botonContraparte" );
				$(this).addClass( "active botonContraparte" );
			
		        $("#rrellenarPregunta").hide();//oculta el formulario de las preguntas
				$("#registroContraparte").empty();//LIMPIAR EL FORMULARIO DE CONTRAPARTE
				registrarAmparo();
			 	 },false);
	
});