   
   

function registrarContraparte(){
   

    var isFamiliar=$("#isFamiliar").prop('checked')
    var tipoContraparte=(isFamiliar===true)?"FAMILIAR":"NINGUNO";  
   var sendInfo = {
    id_contraparte   : document.getElementById('id_contraparte').value,
    nombre           : document.getElementById('nombre').value,
    apellido_paterno  : document.getElementById('aPaterno').value,
    apellido_materno : document.getElementById('aMaterno').value,
    telefono         : document.getElementById('telefono').value,
    email            : document.getElementById('email').value,
    municipio            : document.getElementById('municipio').value,
    colonia            : document.getElementById('colonia').value,
    calle            : document.getElementById('calle').value,
    numero            : document.getElementById('numero').value,
    curp             : document.getElementById('curp').value,
    estado           : document.getElementById('entidad').value,
    fechaNacimiento  : document.getElementById('fechaNacimiento').value,
    etnia            : document.getElementById('etnia').value,
    idioma           : document.getElementById('idioma').value,
    genero           : document.getElementById('genero').value,
    sexo             : document.getElementById('sexo').value,
    discapacidad     : document.getElementById('discapacidad').value,
    parentesco       : document.getElementById('parentesco').value,
    id_expediente    : document.getElementById('id_expediente_contraparte').value,
    tipo_contraparte  : tipoContraparte
};
var correcto=true;

console.log("datos a enviar ",sendInfo);

Object.entries(sendInfo).forEach(([key, value]) => {//recorro el arreglo y verifico si hay alguno que este vacio
    console.log("FFEE",  ((`${value}`)==="")); // "a 5", "b 7", "c 9"
    if((`${value}`)===""){
        correcto=false;
        console.log("dentro",  ((`${value}`)==="")); // "a 5", "b 7", "c 9"
        $("#enviarForm").attr("type","submit");
        return false
    }else
    $("enviarForm").attr("disabled","button");
       
    return true;
 });

if(correcto===true)

 $.ajax({
    type: "POST",
    url: "../../controlador/expediente/registrarContraparte.php",
    dataType: "html",
    success: function (data) {
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
       
                if(json['tipo']==="exito")
                  $("#registroContraparte").children().remove();  
      
    },

    data: sendInfo
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