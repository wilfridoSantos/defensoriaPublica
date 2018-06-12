
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
});