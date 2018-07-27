
function mayusculas(e, elemento) {
  
    tecla=(document.all) ? e.keyCode : e.which; 
     elemento.value = elemento.value.toUpperCase();
      // console.log(elemento.value);
       
    }

  function fechaTermino(){
      var date= Date();
      console.log(fecha,"fecha");
      
    document.getElementById('fecha_termino').value
    }
function registroEscolaridad(){
   

/*     var isFamiliar=$("#isFamiliar").prop('checked')
    var tipoContraparte=(isFamiliar===true)?"FAMILIAR":"NINGUNO";  
 */  
var person=document.getElementById('id_personal').value;
console.log(person," mostrano al personal");

 var sendInfo = {
    "id_personal"               :document.getElementById('id_personal').value,
    "perfil"                    :document.getElementById('perfil').value,
    "grado_escolaridad"         :document.getElementById('grado_estudio').value,
    "fecha_termino"             :document.getElementById('fecha_termino').value,
    "instituto"                 :document.getElementById('instituto').value,
    "documento_provatorio"      :document.getElementById('documento_provatorio').value,
    //"nombre_estudio"            :"",
    "descripcion_perfil_egreso" :document.getElementById('descripcion_perfil').value,
   // "cedula_profesional"        :"",
    "especialidad"              :document.getElementById('especialidad').value

    
};
var correcto=true;

console.log("datos a enviar ",sendInfo);

Object.entries(sendInfo).forEach(([key, value]) => {//recorro el arreglo y verifico si hay alguno que este vacio
  //  console.log("FFEE",  ((`${value}`)==="")); // "a 5", "b 7", "c 9"
    if((`${value}`)===""){
        correcto=false;
       // console.log("dentro",  ((`${value}`)==="")); // "a 5", "b 7", "c 9"
        $("#enviarFormEstudio").attr("type","submit");
        return false
    }else
    $("enviarFormEstudio").attr("type","button");
       
    return true;
 });
var formData = new FormData(document.getElementById("myform"));
  //          formData.append("dato", "valor");
if(correcto===true)
 $.ajax({
    type: "POST",
    url: "../../controlador/defensor/registrarEstudio.php",
    dataType: "html",
    data: formData,
                cache: false,
                contentType: false,
	     processData: false,
    success: function (data) {
        console.log(data);
        var json=jQuery.parseJSON(data)
        console.log(data);
            var alert="";

              if(json['tipo']==="exito")
                 alert="alert alert-success";

              //$alert='alert alert-danger';
               if(json['tipo']==="error")
                 alert="alert alert-danger";

                if(json['tipo']==="juzgado")
                  alert="alert alert-danger";
                  
                 $("#contenedorMensaje").attr("class",""+alert);
        

                $("#contenedorMensaje").append('<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">'+
                '<div class="modal-dialog modal-dialog-centered" role="document">'+
                    '<div class="modal-content">'+
                    '<strong align="center" id="id_Mensaje" class="alert-dismissible fade in '+alert+'"></strong>'+
                    
                    '<div class="modal-footer">'+
                    ' <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>'+
                    '</div></div> </div></div>');
                    $("#id_Mensaje").text(json['mensaje']);
                    console.log(json['mensaje']," fue esto");
                    $('#exampleModalLong').modal('show');
                    console.log("ffef en always ",json['tipo']);
       
                //if(json['tipo']==="exito")
                //  $("#registroContraparte").children().remove();  
      
    },

  // data: sendInfo
    data: formData
});
/* $.ajax({
    url: "../../controlador/expediente/registrarContraparte.php",
    type: "POST",
    data: {id_contraparte:"fff"},
     beforeSend: function(xhrObj){
     //   xhrObj.setRequestHeader("Content-Type","application/json");
     ///   xhrObj.setRequestHeader("Accept","application/json");
        //xhrObj.setRequestHeader("X-Mashape-Key","p1y5uv5OzAmshsT2As9lNDKQnONZp15VuBJjsnBGrbwX8XO0qY");

}, 
dataType: "json",
    success: function (data) {
         console.log(data)
    /* var json=jQuery.parseJSON(data)
     $.each(json,function(key, valor) {
        localizarPorGeocoder(valor.juzgado);
            console.log(valor);
            }); */  
        
           /*  }
        });//FINAL DE AJAX */ 
}