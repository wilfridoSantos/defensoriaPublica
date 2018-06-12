     var registrar=document.getElementById('registrarDefensor');
			registrar.addEventListener('click',regDefensores,false);
			function regDefensores(){
				$('#menuContainer').load("../usuarios/registrar.php");
			};
			
	var informeAct=document.getElementById('informeActividades');
		informeAct.addEventListener('click', informeActividades, false);
		function informeActividades() {
				$('#menuContainer').load("informeActividades.php");
		};

		
		var listarDef = document.getElementById('listarDefensores');
		listarDef.addEventListener('click', listaDefensores, false);
		function listaDefensores() {
			$('#menuContainer').load("listarDefensores.php");
		};
	
		var listarExp = document.getElementById('listarExpedientes');
		listarExp.addEventListener('click', listarExpedientes, false);
		function listarExpedientes() {
			$('#menuContainer').load("listarExpedientes.php");
		};	

		var juzgadoRegistro=document.getElementById('registrarJuzgadoMenu');
		juzgadoRegistro.addEventListener('click', function () {
           
			$('#menuContainer').load("coordinadorRegistrarJuzgado.php");
	   }, false);
	/* var asignar=document.getElementById('cambiarAdscripcion');
	asignar.addEventListener('click',asinar,false);
	 function asinar(){
		$('#menuContainer').load("../administrador/cambiarAdscripcion.php");
	} */

				
