 $(document).ready(function () {
	var informeA=document.getElementById('informeAnual');
		informeA.addEventListener('click',informeAnual,false);
	 	function informeAnual(){
			$('#menuContainer').load("usuarios/");
		   };
//========================================================================		   
	var registrar=document.getElementById('registrarDefensor');
			registrar.addEventListener('click',regDefensores,false);
			function regDefensores(){
				$('#menuContainer').load("usuarios/registrar.html");
			};
});
