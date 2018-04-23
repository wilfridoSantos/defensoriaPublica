 $(document).ready(function () {
	
		  
		      
	

	var registroJuzgado=document.getElementById('crea_juzgado');
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
	
			
});

