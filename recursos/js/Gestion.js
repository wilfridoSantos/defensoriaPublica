 $(document).ready(function () {
	var informeA=document.getElementById('informeAnual');
		informeA.addEventListener('click',informeAnual,false);
	 	function informeAnual(){
			$('#menuContainer').load("../usuarios/informeAnual.html");
		   };
//========================================================================		   
	var registrar=document.getElementById('registrarDefensor');
			registrar.addEventListener('click',regDefensores,false);
			function regDefensores(){
				$('#menuContainer').load("../usuarios/registrar.html");
			};

	var listar=document.getElementById('listarDefensores');
			listar.addEventListener('click',listDefensores,false);
			function listDefensores(){
				$('#menuContainer').load("../../controlador/defensor/controladorlistarDef.php");
			};
	
			// Datepicker Popups calender to Choose date.
			/*$(function() {
				$("#datepicker").datepicker();
				// Pass the user selected date format.
				$("#format").change(function() {
					$("#datepicker").datepicker("option", "dateFormat", $(this).val());
				});
			});*/
});

