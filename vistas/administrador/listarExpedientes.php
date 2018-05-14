<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <title>Modulo Coordinador General</title>
      <script src="../../recursos/js/main.js"></script>
      <script  type="text/javascript" src="../../recursos/vendors/jquery/jquery-ui.js"></script>
      <link href="../../recursos/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <!-- Font Awesome -->
    <link href="../../recursos/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="../../recursos/css/custom.css" rel="stylesheet"/>
    <script src="../../recursos/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../recursos/js/main.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!--   <link rel="stylesheet" href="/resources/demos/style.css"> -->


      <script src="../../recursos/js/coordinador/atendiendoCoordinador.js"></script>
      <link href="../../recursos/css/style.css" rel="stylesheet"/>
      <script>
function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","getuser.php?q="+str,true);
  xmlhttp.send();
}
</script>
<body>
<div class="x_content">
        <h3 ><b>
          <center>
          LISTA EXPEDIENTES
          </center>
          </b>
        </h3>
       <div class="form-group">
                                <div class="left" style="width:45%;">                                     
                                  <input type="text" id="inputCedula" onkeyup="buscarXCedula()" class="form-control" placeholder="Nombre Defensor...">                                                                                                
                                  
                                </div>
                                <div class="right" >
                                  <select  class="mySelectFiltro"  name="users" onchange="showUser(this.value)">
                                    <option value="">Listar Expedientes por estado</option>
                                    <option value="1">Activos</option>
                                    <option value="2">Inactivos</option>
                                    <option value="3">Todos</option>                                  \
                                  </select>
                                </div>
                            </div>
        
        <table id="datatable" class="table table-striped table-bordered">
          <thead  >
            <tr class="header">
              <th>NUM. EXPEDIENTE</th>
              <th>MATERIA</th>
              <th>FECHA DE INICIO</th>
              <th>DEFENSOR ASIGNADO</th>                   
              <th>ACCION</th>
            </tr>
          </thead>
          <tbody id='tebody'>
        <?php include '../../controlador/defensor/controladorListarExp.php';
            $defensores=json_decode($contenido);
            //print_r($defensores);
            foreach($defensores as $obj){
              //print_r('=> '. $obj->estado);
              //if($obj->estado){      
                $nomBoton;
                if($obj->id_personal < 0) {
                  $nomBoton = '<button type="button" class="btn btn-danger botonCambioDefensor" id="botonCambioDef" name="botonCambioDef">Asignar Defensor</button>';                  
                }else{
                  $nomBoton = '<button type="button" class="btn btn-primary botonCambioDefensor" id="botonCambioDef" name="botonCambioDef">Cambiar Defensor</button>';
                }          
                echo '<tr> '.
                  '<td id="idPersonal" style="display:none;">'.$obj->id_personal.'</td>'.
                  '<td>'.strtoupper($obj->num_expediente).'</td>'.
                  '<td>'.strtoupper($obj->materia).'</td>'.
                  '<td>'.strtoupper($obj->fecha_inicio).'</td>'.
                  '<td>'.strtoupper($obj->nombre).'</td>'.                                                           
                  '<td> '.$nomBoton.'</td> </tr>';
                }            
              //}
        ?>
          </tbody>  
        </table>

  
       
        
      </div>

      <br>
<div id="txtHint"><b>Person info will be listed here.</b></div>

          </body>
          </html>
