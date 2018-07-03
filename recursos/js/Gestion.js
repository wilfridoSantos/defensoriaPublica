     var registrar=document.getElementById('registrarDefensor');
			registrar.addEventListener('click',regDefensores,false);
			function regDefensores(){
				$('#menuContainer').load("../usuarios/registrar.php");
			};
			
	var informeGActivi=document.getElementById('informeGAct');
		informeGActivi.addEventListener('click', informeActividades, false);
		function informeActividades() {
				$('#menuContainer').load("informeGActividades.php");
		};
		var informeGExped=document.getElementById('informeGExp');
		informeGExped.addEventListener('click', informeGExpedientes, false);
		function informeGExpedientes() {
				$('#menuContainer').load("informeGExpedientes.php");
		};
		var informePActivi=document.getElementById('informePAct');
		informePActivi.addEventListener('click', informePActividades, false);
		function informePActividades() {
				$('#menuContainer').load("informePActividades.php");
		};
		var informePExped=document.getElementById('informePExp');
		informePExped.addEventListener('click', informePExpedientes, false);
		function informePExpedientes() {
				$('#menuContainer').load("informePExpedientes.php");
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

				
