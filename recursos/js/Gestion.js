$(document).ready(function () {
	var informeA=document.getElementById('informeAnual');

		informeA.addEventListener('click',informeAnual,false);
	 	function informeAnual(){
			$('#menuContainer').load("../usuarios/informeAnual.html");

		   };    
		      
	var informeM=document.getElementById('informeMensual');
		informeM.addEventListener('click', informeMensual, false);
		function informeMensual() {
				$('#menuContainer').load("informeMensual.html");
		};

	var informeE=document.getElementById('informeEspecifico');
		informeE.addEventListener('click', informeEspecifico, false);
		function informeEspecifico() {
				$('#menuContainer').load("informeEspecifico.html");
		};

	var tarjetaI=document.getElementById('tarjetaInformativa');
		tarjetaI.addEventListener('click', tarjetaInformativa, false);
		function tarjetaInformativa() {
			$('#menuContainer').load("tarjetaInformativa.html");
		};
		
	var listarDef=document.getElementById('listarDefensores');
		listarDef.addEventListener('click', listaDefensores, false);
		function listaDefensores() {//usar THIS
			//console.log("ACCESO A FUNCION listaDefensor ahdka");
			//alert('entro');
			$('#menuContainer').load("listarDefensores.php");
		//window.location="../../controlador/defensor/controladorListaDef.php"
		/* $.ajax({
            url: "../../controlador/defensor/controladorListaDef.php",
			type: "post",
			dataType: 'json',
			data: JSON.stringify({foo:'bar'}),
            beforeSend: function() {
                $('body').addClass('loading');
            },
            success: function(data) {
				console.log('SUCCESS!!!');
                $('#menuContainer').load(data);
                $('body').removeClass('loading');
            }
        }); */
	};

	var listarAudiencia=document.getElementById('listarAudiencias');
	listarAudiencia.addEventListener('click', listarAudiencias, false);
	function listarAudiencias() {
		$('#menuContainer').load("listarAudiencias.php");
		//window.location="../../controlador/defensor/controladorListaDef.php"
	};
	var listarVisitas=document.getElementById('listarVisitas');
	listarVisitas.addEventListener('click', listarVisitas, false);
	function listarVisitas() {
		$('#menuContainer').load("listarVisitas.php");
		//window.location="../../controlador/defensor/controladorListaDef.php"
	};

	var registrar = document.getElementById('registrarDefensores');
	registrar.addEventListener('click', regDefensores, false);
	function regDefensores() {
		//alert('sfafa');
		$('#menuContainer').load("registrar.html");
	};

});

