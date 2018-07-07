function mayusculas(e, elemento) {
  
  tecla=(document.all) ? e.keyCode : e.which; 
   elemento.value = elemento.value.toUpperCase();
     console.log(elemento.value);
     
  }
  

  function replazarParametro(e,t){res=e;
      for(var n=0;n<t.length;n++){
          res=res.replace(/\{\{(.*?)\}\}/g,function(e,r){
                                           //  console.log(t);
                                             //console.log(r);
                                             //console.log(n);
                                            return t[n][r]})
        }
return res}

function buscarXPrimerCampo() {
  // Declare variables
  var input, filter, table, tr, td, i;
  input = document.getElementById("columna1");
  filter = input.value.toUpperCase();
  table = document.getElementById("example");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
        //console.log('huuuuuuuuu hkajsdkasjhd');
      } else {
        tr[i].style.display = "none";
        //console.log('dosssssssss ');
      }
    }
  }
}


// estos son datos de tipo variables globales
var Global_usuarios_servicios;
var Global_user_basic;

var Global_defensores;
var Global_usuarios_Contraparte;
$(document).ready(function () {

 


      function data(){

    $.ajax({
        type: 'GET',
        url: '../../controlador/usuario_servicio/listaUsuario.php?term=busqueda',
        success: function (data) {
            Global_usuarios_servicios = data;//parsedData[0].NUMERO;
      //        Global_usuarios_servicios= data;//parsedData[0].NUMERO;
        },
        error: function () {
           // alert('Error peticion Ajax ');
        }
        });
    }

  data();// llamao a la funcion para almacenar estos datos



    function userBAsico(){
          var user=document.getElementById('id_personalUser');
        $.ajax({
          type: 'GET',
          url: '../../controlador/datos_basicos.php?personal='+user.value,
          success: function (data) {
            Global_user_basic = data;//parsedData[0].NUMERO;
        //        Global_usuarios_servicios= data;//parsedData[0].NUMERO;
          },
          error: function () {
                console.log("Error de ajax");
                
              //alert('Error peticion Ajax ');
          }
          });
    }

    userBAsico();// llamao a la funcion para almacenar estos datos

 

function dataDefensor(){

  $.ajax({
    type: 'GET',
    url: '../../controlador/defensor/controladorListaDef.php?term=busqueda',
    success: function (data) {
      //console.log('data en herramientas js ', data );
        Global_defensores = data;//parsedData[0].NUMERO;
  //        Global_usuarios_servicios= data;//parsedData[0].NUMERO;
    },
    error: function () {
       // alert('Error peticion Ajax ');
    }
    });
  }
  dataDefensor();

    function pedirContraparte(){

        $.ajax({
          type: 'GET',
          url: '../../controlador/defensor/controladorListaDef.php?term=busqueda',
          success: function (data) {
            Global_usuarios_Contraparte = data;//parsedData[0].NUMERO;
        //        Global_usuarios_servicios= data;//parsedData[0].NUMERO;
          },
          error: function () {
            //  alert('Error peticion Ajax ');
          }
          });
    }

    pedirContraparte();// llamao a la funcion para almacenar estos datos
   
    

    
    
    $('#tablaAsinacionExpedienteusuario').on('click', '.eliminar', function (evst) {
      //		  var target= $(event.target);
        var target= $(this);
        //console.log(target);
        var eliminar = $(this).closest('tr');
        var id_usuarioEliminar = $(this).closest('tr')[0].children[0].getAttribute("id_usuario_eliminar");;
         //console.log("id",id_usuarioEliminar);
         
        var usuarios=$("#usuarios").val().split(",");
        //console.log(usuarios);
        usuarios.splice(usuarios.indexOf(id_usuarioEliminar),1);
        $("#usuarios").val(usuarios.toString());
        $(eliminar).remove();
        $("#project").attr('disabled', false);
        $("#project").val("");
  });
});


function consumirCodigoPostal(elemento){
  if(elemento.value){
  $.ajax({
    type: 'GET',
    url: 'https://api-codigos-postales.herokuapp.com/v2/codigo_postal/'+elemento.value,
    success: function (data) {
      console.log($("#municipio"));
      
     $("#municipio").val(data.municipio);
     $("#colonia").val(data.colonias[0]);

    },
    error: function () {
      //  alert('Error peticion Ajax ');
    }
    });
  } $("#municipio").val("");
  $("#colonia").val(" ");
}

var consumirPagina=function(url){
  return $.get(url) 
}

function createXMLHttpRequest(){
	var xmlHttp=null;
	if (window.ActiveXObject) 
		xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
	else if (window.XMLHttpRequest) 
		xmlHttp = new XMLHttpRequest();
	return xmlHttp;
}