
    var varUsuario=[];
    var datos = jQuery.parseJSON(window.Global_usuarios_servicios);
    $.each(datos, function (KEY, VALOR) {
                var temp={};
                  temp['label']=VALOR.nombre;
                  temp['apellidos']=VALOR.ap_paterno+" "+VALOR.ap_materno;
                  temp['desc']=VALOR.colonia+", "+VALOR.municipio;
                  temp['id_usuario']=VALOR.id_usuario_servicio;
                  temp['curp']=VALOR.curp;
                  // console.log(VALOR);
                   varUsuario.push(temp);
                });
 $( function() {
      
  
    $( "#project" ).autocomplete({
      minLength: 0,
      source: varUsuario,
      focus: function( event, ui ) {
        $( "#project" ).val(ui.item.label+" "+ ui.item.apellidos );
       
      // console.log(ui);
        return false;
      },
      select: function( event, ui ) {
        var usuario=ui.item.label+" "+ui.item.apellidos;
        $( "#project" ).val(ui.item.label+" "+ ui.item.apellidos );
      
        $( "#curp" ).val(ui.item.curp );
        $( "#curpMostrado" ).val(ui.item.curp );
        return false;
      }
    })
    .autocomplete( "instance" )._renderItem = function( ul, item ) {
      return $( "<li>" )
        .append( "<div>" + item.label +" "+item.apellidos+ "<br>" + item.desc + "</div>" )
        .appendTo( ul );
    };
  } );
   


function validarFecha(e, elemento) {
 var fechas= document.getElementById("fecha_registro").value;
  
  //console.log(fechas);
  var ano=fechas.split('-')[0];
  var mes=fechas.split('-')[1];
  var dia=fechas.split('-')[2];
  
  
 //   alert("fff");
 var date = new Date()
//   var error=elemento.parentElement.children[1];
 var error=elemento.parentElement;

 // removeChild
 
var ul=document.createElement('li');
 //  ul.setAttribute("class", "errors");
      if(ano == "" || ano.length < 4 || ano.search(/\d{4}/) != 0)
      {
    $(".errors").remove();
    ul.setAttribute("class", "errors");
        ul.innerText="solo 4 digito";
         error.appendChild(ul);
  
          return false;
      }   
  
 if(ano <date.getFullYear() || ano > date.getFullYear())
  { 
    console.log(" año invalida");
   $(".errors").remove();
    ul.setAttribute("class", "errors");

    ul.innerText="año invalida";
    error.appendChild(ul);
          return false;
  } 
  else{
    $(".errors").remove();
  }  
 

  if(mes < date.getMonth()+1 || mes > date.getMonth()+1)
  { 
    console.log("mes invalida");
   $(".errors").remove();
    ul.setAttribute("class", "errors");

    ul.innerText="Mes invalida";
    error.appendChild(ul);
          return false;
  } 
  else{
    $(".errors").remove();
  } 

  if(dia < date.getDate()-5 || dia > date.getDate())
  { 
    console.log("fecha invalida");
   $(".errors").remove();
    ul.setAttribute("class", "errors");

    ul.innerText="Dia invalida";
    error.appendChild(ul);
          return false;
  } 
  else{
    $(".errors").remove();
  } 
      
  
  
  intMes  = parseInt(dia);
  intDia  = parseInt(mes);
  intano=parseInt(ano);

  
   console.log( date.getYear());
}