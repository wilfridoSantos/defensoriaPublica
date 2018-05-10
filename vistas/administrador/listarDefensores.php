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
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!--   <link rel="stylesheet" href="/resources/demos/style.css"> -->


      <script src="../../recursos/js/coordinador/atendiendoCoordinador.js"></script>
      <link href="../../recursos/css/style.css" rel="stylesheet"/>

<body>
<div class="x_content">
        <h3 >
          LISTA DEFENSORES
        </h3>
       <div class="input-group custom-search-form">
                                <input type="text" id="inputCedula" onkeyup="buscarXCedula()" class="form-control" placeholder="Nombre Defensor...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" onclick="buscarXCedula()" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
        
        <table id="datatable" class="table table-striped table-bordered">
          <thead  >
            <tr class="header">
              <th>Nombre</th>
              <th>Ap. Paterno</th>
              <th>Ap. Materno</th>
              <th>Lugar Adscripcion</th>                   
              <th>acciones</th>
            </tr>
          </thead>
          <tbody id='tebody'>
        <?php require_once('../../controlador/defensor/controladorListaDef.php');
            $defensores=json_decode($contenido);
            print_r($defensores);
            foreach($defensores as $obj){
              //print_r('=> '. $obj->estado);
              if($obj->estado){                
                echo '<tr> '.
                  '<td id="idPersonal" style="display:none;">'.$obj->id_personal.'</td>'.
                  '<td>'.strtoupper($obj->nombre).'</td>'.
                  '<td>'.strtoupper($obj->ap_paterno).'</td>'.
                  '<td>'.strtoupper($obj->ap_materno).'</td>'.
                  '<td>'.strtoupper($obj->juzgado).'</td>'.                                          
                  '<td><button type="button" class="btn btn-primary boton" id="boton" name="info">'.
                      '<span class="glyphicon glyphicon-user" aria-hidden="true"> </span></button>'.
                  '<button type="button" class="btn btn-warning botonUp" id="botonUp" name="botonUp">'.
                      '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>'.
                  '<button type="button" class="btn btn-danger botonDel" id="botonDel" name="botonDel">'.
                  '<span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>'.
                  '</td> </tr>';
                }            
              }
        ?>
          </tbody>  
        </table>
       
        
      </div>
          </body>
          </html>
