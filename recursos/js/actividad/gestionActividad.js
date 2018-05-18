function getJuzgado(id_personal) {	
    console.log( $("#personal").value(),"valor personal en ajax")
    $.ajax({
        url: "../../controlador/defensor/controlDefensor.php",
        type: "GET",
        data: "id_personal="+$("#personal").value,
        beforeSend: function () {

    //	$('#menuContainer').load('listarDefensores.php');
        },
        success: function (data) {
            //console.log('Success!! Eliminado defensor id = '+idDef);
  //  console.log(data);
       // var json=jQuery.parseJSON(data)
         console.log(data);
         
           /*  $.each(json,function(key, valor) {
            console.log(valor);
                }); */
            
                }
            });
    }
  function localizar() {
    var geocoder = new google.maps.Geocoder();

   /*  var map = new google.maps.Map(document.getElementById(elemento), {
      zoom: 16,
      scrollwheel: true,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }); */
    
    geocoder.geocode({'address': "instituto tecnologico de oaxaca"}, function(results, status) {
        if (status === 'OK') {
            var resultados = results[0].geometry.location,
                resultados_lat = resultados.lat(),
                resultados_long = resultados.lng();
            console.log(resultados_lat);
            
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
            localizar();
      //  }
   // });
});