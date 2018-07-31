
$(document).ready(function () {
function checkNotificacion(){
	$.ajax({
		url: "../../controlador/expediente/checarNotificaciones.php",
		type: "get",
		
		success: function (data) {
	//console.log(data, ' valor data');
			if (data != 0) {
				//alert(' Tienes '+data+' expedientes por asignar defensor!!');
				$.notify(' <a id="linkListar"> Tienes</a>'+data+' Expedientes por asignar defensor!!'); 
				var link=document.getElementById("linkListar");
					link.addEventListener("click",function(){
							$("#menuContainer").load("listarExpedientes.php");
					},false);
			} else {
				
			}
		}
	});
}

setInterval(checkNotificacion, 10000);

var expedientesSinAtencion;
function getExpedienteSinAtender(){
	$.ajax({
		url: "../../controlador/coordinador/notificacionExpedienteSinAtencion.php",
		type: "get",
		
		success: function (data) {
	//console.log(data, ' valor data');
			if (data != 0) {
				//alert(' Tienes '+data+' expedientes por asignar defensor!!');
				//console.log('notiicacion exp ',data);
				expedientesSinAtencion=data;
				document.getElementById('cantidadExpediente').outerText=data.length;
			//	data.forEach(element => 
			   for (let index = 0; index < 3; index++) {
				var element=data[index];
				   if(element!==undefined){
					$('#menu1').append("<li>  <a>"+
					   "<span >"+element.num_expediente+"</span>"+
					   //"<span class='time'>3 mins ago</span>"+
					   "</span>"+
					   "<span class='message'>"+
						element.nombre+" "+element.ap_paterno+" "+element.ap_materno+
						"</span>"+
						" </a>"+
						"</li>")
					}
			   
				};//);
				
				$('#menu1').append("<li> <div class='text-center'> <a>"+
					   "<strong id='notificacionExpSinAtencion'>Ver todas las notificaciones</strong>"+
					   //"<span class='time'>3 mins ago</span>"+
					   "<i class='fa fa-angle-right'></i>"+
					   " </a>"+
						"</div></li>");
					
				/* $.notify(' <a id="linkListar"> Existen  '+data.length+' Expedientes sin continuidad por 2 meses !!</a>'); 
				var link=document.getElementById("linkListar");
					link.addEventListener("click",function(){
							$("#menuContainer").load("listarExpedientes.php");
					},false); */
				var noti=document.getElementById('notificacionExpSinAtencion');
				noti.addEventListener('click',function todasNotificacionExpediente() {
						console.log("en notificacion de todas");
					
						$("#exampleModalLong").modal('show');
						$('#notificacionsSinAtencion').append("<address id='address'><address>");
						expedientesSinAtencion.forEach(element => {
							var telefono=element.telefono.replace(/[()]/g,'');
							$('#address').append("<p>"+element.num_expediente+", "+element.nombre+" "+element.ap_paterno+" "+element.ap_materno+", "+ telefono+"</p><hr>");
						});
					},false);

			} 
		}
	});
}
getExpedienteSinAtender();

function notificacionExpedienteSinAtender() {
	$.notify(' <a id="linkListar"> Existen  '+expedientesSinAtencion.length+' Expedientes sin continuidad por 2 meses !!</a>'); 
				var link=document.getElementById("linkListar");
					link.addEventListener("click",function(){
							$("#menuContainer").load("listarExpedientes.php");
					},false);
}
//setInterval(notificacionExpedienteSinAtender, 10000);
// SE QUITO UN RATO LA NOTIFICACION
});