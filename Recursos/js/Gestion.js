/**
 * 
 */
 $(document).ready(function () {
///	alert("fdsijfdso");
    //  $('#menuContainer').load('css/adm.html');
   var defen=document.getElementById('defensores');
       defen.addEventListener('click',defensores,false);
  	  function defensores(){
  		$('#menuContainer').load("/defensores");
  		
  	}
	 
	
	var id=document.getElementById('verusuarios');
    	id.addEventListener('click',cli,false);
	                    
	  function cli(){
	    $('#menuContainer').load("/usuarios");
		
	}
	var asignar=document.getElementById('asignarDefensor');
		asignar.addEventListener('click',asinar,false);
    function asinar(){
		    $('#menuContainer').load("/asignardefensor");
		}
		 
	var registrar=document.getElementById('registrar');
    	 registrar.addEventListener('click',registrarUsuario,false);
	function registrarUsuario(){
			    $('#menuContainer').load("usuarios/registrar.html");
			}
	var buscar=document.getElementById('buscar');
   	    buscar.addEventListener('click',buscarUsuario,false);
    function buscarUsuario(){
		    $('#menuContainer').load("usuarios/buscar.html");
			}
    });
 
 