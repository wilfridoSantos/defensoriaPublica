function getJuzgado() {	

    $.ajax({
        url: "../../controlador/defensor/controlDefensor.php",
        type: "GET",
        data: "id_personalPorJuzgado="+$("#id_personal").val(),
        beforeSend: function(xhrObj){
            xhrObj.setRequestHeader("Content-Type","application/json");
            xhrObj.setRequestHeader("Accept","application/json");
            //xhrObj.setRequestHeader("X-Mashape-Key","p1y5uv5OzAmshsT2As9lNDKQnONZp15VuBJjsnBGrbwX8XO0qY");

    },
        success: function (data) {
      console.log(data)
        var json=jQuery.parseJSON(data)
         $.each(json,function(key, valor) {
            localizarPorGeocoder(valor.juzgado);
                console.log(valor);
                });  
            
                }
            });
    }
  function localizarPorGeocoder(cadena) {   
    var geocoder = new google.maps.Geocoder();

   /*  var map = new google.maps.Map(document.getElementById(elemento), {
      zoom: 16,
      scrollwheel: true,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }); */
    console.log(cadena);
    
    geocoder.geocode({'address': cadena}, function(results, status) {
        if (status === 'OK') {
            var resultados = results[0].geometry.location,
                resultados_lat = resultados.lat(),
                resultados_long = resultados.lng();
            console.log(resultados_lat);
            console.log(resultados_long);
            
            /* map.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location
            }); */
        } else {
            var mensajeError = "";
            if (status === "ZERO_RESULTS") {
                mensajeError = "No hubo resultados para la dirección ingresada.";
            } else if (status === "OVER_QUERY_LIMIT" || status === "REQUEST_DENIED" || status === "UNKNOWN_ERROR") {
                mensajeError = "Error general del mapa.";
            } else if (status === "INVALID_REQUEST") {
                mensajeError = "Error de la web. Contacte con Name Agency.";
            }
            alert(mensajeError);
        }
    });
}

$.getScript("https://maps.googleapis.com/maps/api/js?key=AIzaSyDidf3W8T4sLPLH1shON1Wue4_FcSXLm3Q", function() {
   // $("#buscar").click(function() {
        var direccion = $("#").val();
       // if (direccion !== "") {
            //localizar();
            getJuzgado();
      //  }
   // });
});

function miUbicacion() {
    console.log("mi ubicacion");
    
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
          var pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
          };
         
         $("#ubicacion").val(pos.lat+","+pos.lng);
        // $("#ubicacion").val("ho a  todos buu");
         //console.log(pos.lat,pos.lng);
         console.log($("#ubicacion").val());
         
        }, function() {
            switch(error.code) {
                case error.PERMISSION_DENIED:
                     alert("necesitas conceder permiso de ubicación");
                    break;
              
            }
        });
    }
}

function verificacionActividad(evento,elemento) {
 //alert("hola juan");
  var actividadSeleccion=document.getElementById("miactividad");
//    var seleccionado=    actividadSeleccion.options[elemento.selectedIndex].value;
    var seleccionado=    actividadSeleccion.options[actividadSeleccion.selectedIndex].value;
    console.log(seleccionado);
    //console.log(actividadSeleccion);
    if(seleccionado==="asesoria"||seleccionado==="audiencia")
    {  miUbicacion();
        console.log("dentro de la condicion asesoria.audiencia");
        $('#mycomprobante').hide()
    }
    if(seleccionado==="visita")
    {  //miUbicacion();
        console.log("dentro de la condicion visita");
        $("#ubicacion").val("");
        $('#mycomprobante').show()
    }

    
}


