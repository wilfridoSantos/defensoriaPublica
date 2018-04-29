 $(document).ready(function () {
	
		  
		      
	var botonVer = document.getElementsByClassName('boton');
	
	$('#tebody').on('click','.boton',function(evst){
//		  var target= $(event.target);
		//  var target= $(this.);
		  var cedula = $(this).closest('tr').find('#dataCedula').text() 
		   console.log(cedula);
		   verInfo(cedula);
	});
	//console.log(typeof(botonVer));
//s	console.log(botonVer['info']);
	/* for(var i = 0; i < 5; i++){
		//console.log(botonVer.length);
	  botonVer[i].addEventListener('click', verInfo, false);
	
	} */
	function verInfo(cedula){
		$.ajax({
			url: "../../controlador/defensor/controlDefensor.php",
			type: "post",
			data: "numCedula=" + 4,
			beforeSend: function() {
				$('#menuContainer').load('verInfoDefensor.php');
			},
			success: function(data) {

				var jsonExpediente = jQuery.parseJSON(data);
				console.log(jsonExpediente['id_defensor']);

				$.each(jsonExpediente, function (KEY, VALOR){
					//console.log(VALOR.id_estudios , "BKAJBKjakd");
				
					$('#verExpDefensor').append('<tr> <td>'+VALOR.num_expediente+'</td>'+
					'<td>'+VALOR.fecha_inicio+
					 '</td><td>'+VALOR.fecha_final+
					 '</td><td>'+VALOR.tipo_delito+
					 '</td><td>'+VALOR.nombre_delito+
					 '</td><td>'+((VALOR.estado == true)?'En proceso':'Finalizado')+
					 '</td> </tr> '); 
	
				});
				//$('#menuContainer').html(data);
				//$('body').removeClass('loading');
			}
		}); 
	}

	var registroJuzgado=document.getElementById('crea_juzgado');
		if(registroJuzgado != null){
			registroJuzgado.addEventListener('click',registrarJuzgado,false);
			
			function registrarJuzgado(){
			$.ajax({
				//	 include '../../controlador/defensor/controladorListaDef.php';
					url: "../../controlador/juzgado/registrar_juzgado.php",
					type: "POST",
					data: "",
					
					success: function(data) {
						console.log("FDF",data);
					},
 
  
                error : function(xhr, status) {
                    console.log("FDssF",xhr);
                    console.log("FDsF",status);
                    alert('Disculpe, existió un problema');
                }
 
				});

			};
	
		}
});

