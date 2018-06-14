
$(document).ready(function () {
function checkNotificacion(){
	$.ajax({
		url: "../../controlador/expediente/checarNotificaciones.php",
		type: "get",
		
		success: function (data) {
	//console.log(data, ' valor data');
			if (data != 0) {
				//alert(' Tienes '+data+' expedientes por asignar defensor!!');
				$.notify(' Tienes '+data+' Expedientes por asignar defensor!!'); 
			} else {
				
			}
		}
	});
}

setInterval(checkNotificacion, 10000);
});