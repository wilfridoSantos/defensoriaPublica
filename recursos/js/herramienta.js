function mayusculas(e, elemento) {
  
  tecla=(document.all) ? e.keyCode : e.which; 
   elemento.value = elemento.value.toUpperCase();
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
$(document).ready(function () {

  function data(){

$.ajax({
  type: 'GET',
  url: '../../controlador/defensor/controladorListaDef.php?term=busqueda',
  success: function (data) {
      Global_usuarios_servicios = data;//parsedData[0].NUMERO;
//        Global_usuarios_servicios= data;//parsedData[0].NUMERO;
  },
  error: function () {
      alert('Error peticion Ajax ');
  }
  });
}

data();// llamao a la funcion para almacenar estos datos

});
