<script src="../../recursos/js/main.js"></script>
<script src="../../recursos/js/coordinador/atendiendoCoordinador.js"></script>
<link href="../../recursos/css/custom.css" rel="stylesheet"/>
<script src="../../recursos/js/jquery-validator.js"></script>
<script src="../../recursos/vendors/jquery/dist/jquery.min.js"></script>
<script src="../../recursos/vendors/pdfmake/build/pdfmake.js"></script>
<script src="../../recursos/vendors/pdfmake/build/pdfmake.min.js"></script>
<script  type="text/javascript" src="../../recursos/vendors/jquery/jquery-ui.js"></script>
 <link rel="stylesheet" href="../../recursos/vendors/jquery/jquery-ui-themes-1.12.1/jquery-ui.css"> 

<div class="x_content">
<center><h3><b>Generar Informe de actividades</b><h3/></center>
<form id="myform" action="#" class="form-horizontal form-label-left" >
  <div align="center">
      <label class="radio-inline" for= "radioInforme">
        <input id="inputR1" type="radio"id="radioInforme"  name="radio" value="option1" checked >
        <b>Informe General</b>
      </label>
      <label class="radio-inline " for= "radioPersonal">
        <input id="inputR2" type="radio" id="radioInforme"  name="radio" value="option2">
        <b>Informe por personal</b>
      </label>
      <label class="radio-inline " for= "radioUnico">
        <input id="inputR3" type="radio" id="radioUnico"  name="radio" value="option3">
        <b>Informe por nue</b>
      </label>
  </div>
    <div class="form-group ">  
      <div id="infoPersonal">
      </div>
    </div>
    <div class="form-group ">
      <label class="control-label col-md-3 col-sm-3 col-xs-4">
        Fecha Inicial
        <span class="required">*</span>
      </label>
    	<div class="col-md-6 col-sm-6 col-xs-4 form-group has-feedback">
        <input type="date" id="inputInicio" name="inputInicio"  onblur="myFunctionDate(this)" onkeyup="myFunctionDate(this)" data-error="ingresa fecha menor a la final" required min="2018-03-25" max="2018-05-25" step="1">
        <div id ="labelInicio" class='block-help with-errors'></div>
      </div>     
    </div>    
    <div class="form-group ">
			<label class="control-label col-md-3 col-sm-3 col-xs-4">
        Fecha Final
        <span class="required">*</span>
      </label>
    	<div class="col-md-6 col-sm-6 col-xs-4 form-group has-feedback">
        <input type="date" id="inputFinal" name="inputFinal"  onblur="myFunctionDate(this)" onkeyup="myFunctionDate(this)" data-error="ingresa fecha menor a la final" required step="1">
        <div id ="labelFinal" class='block-help with-errors'></div>
      </div>           
    </div>
    <div class="center ">
      <input  id="generarInforme" class="btn btn-primary btn-sm " type="button" value="Generar Informe" name="generar" onclick="generarInformeAct()" disabled=true >
      <div id ="botonGenerar" class='block-help with-errors'></div>
    </div>
</form>      
</div>

   <div class="form-group ">  
   <div id="dialogoI" >
          <div id='mapa'></div>
      </div>  
      <table id="datatable" class="table table-striped ">         
         <thead>
           <tr class="header">
             <th>Defensor</th>  
             <th>Usuario</th>
             <th>Fecha Registro</th>
             <th>observaciones</th>                  
             <th>Accion</th>
           </tr>
         </thead>
         <tbody id='resultadoInforme'>
         </tbody>  
       </table> 
   
       
      </div>
    </div>

<script>
function verMapaDir(){
  var lat = parseFloat($('#idlatitud')[0].textContent);
  var lon = parseFloat($('#idlongitud')[0].textContent);
      
  //console.log(typeOf 72.83624970000005);
  initialize(lat, lon);
 }
 function initialize(lat, lon) {    
            
                $("#dialogoI").dialog({
                    modal: true,
                    title: "Google Map",
                    width: 650,
                    height: 450,
                    buttons: {
                        Close: function () {
                            $(this).dialog('close');
                        }
                    },
                    open: function () {
                      var myLatLng = {lat: lat, lng: lon};

                        var map = new google.maps.Map(document.getElementById('mapa'), {
                          zoom: 18,
                          center: myLatLng,
                          mapTypeId: google.maps.MapTypeId.ROADMAP
                        });

                        var marker = new google.maps.Marker({
                          position: myLatLng,
                          map: map,
                          title: 'Hello World!'
                        });                         
                    }
                });            
        }
</script>