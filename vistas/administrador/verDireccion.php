<!DOCTYPE html>
 
<html lang="es">
<head>
 
 
    <meta charset="utf-8">
 
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Google Maps Localizador</title>
 
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBzTOTwZBuaUzajwK5B3K-DGIOGpTu3FdU&sensor=false"></script>
      <link href="../../recursos/css/style.css" rel="stylesheet"/>

 
</head>
<body>
 
<strong>Museo del Prado </strong>/ Latitud: 40.413740 / Longitud: -3.6921 / Zoom: 18
<div id="mapa" ></div>
 <script>
     function initialize() {
   var mapa = document.getElementById('mapa');

   //console.log(lat, long);
   //console.log(typeOf lat);

   var mapOptions = {
     center: new google.maps.LatLng(40.413740,-3.6921),

     zoom: 18,
     mapTypeId: google.maps.MapTypeId.ROADMAP

   }
   var mapa = new google.maps.Map(mapa, mapOptions)
   console.log(mapa, ' VALOR DEL MAPA');

 }
 google.maps.event.addDomListener(window, 'load', initialize);

</script>
 
</body>
</html>