
$(document).ready(function () {
function checkNotificacion(){
	$.ajax({
		url: "../../controlador/expediente/checarNotificaciones.php",
		type: "get",
		
		success: function (data) {
	//console.log(data, ' valor data');
			if (data != 0) {
				//alert(' Tienes '+data+' expedientes por asignar defensor!!');
<<<<<<< HEAD
				$.notify(' <a id="linkListar"> Tienes</a>'+data+' Expedientes por asignar defensor!!'); 
				var link=document.getElementById("linkListar");
					link.addEventListener("click",function(){
							$("#menuContainer").load("listarExpedientes.php");
					},false);
=======
				$.notify(' Tienes '+data+' Expedientes por asignar defensor!!'); 
>>>>>>> 463deed2d4cb356adb1227d4525a885ff5f87be2
			} else {
				
			}
		}
	});
}

<<<<<<< HEAD
  
=======
>>>>>>> 463deed2d4cb356adb1227d4525a885ff5f87be2
setInterval(checkNotificacion, 10000);
});