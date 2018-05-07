
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <title>Modulo Coordinador General</title>
      <script src="../../recursos/js/main.js"></script>

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
              <th>Numero Ext</th>     
              <th>Numero Int</th>      
              <th>acciones</th>
            </tr>
          </thead>
          <tbody id='tebody' >
        <?php
          include '../../controlador/defensor/controladorListaDef.php';
          $Defensores=json_decode($contenido);
          foreach($Defensores as $obj){
            echo '<tr> '.
              '<td id="idDefensor" style="display:none;">'.$obj->id_defensor.'</td>'.
              '<td>'.$obj->nombre.'</td>'.
              '<td>'.$obj->ap_paterno.'</td>'.
              '<td>'.$obj->ap_materno.'</td>'.
              '<td>'.$obj->juzgado.'</td>'.                                          
              '<td>'.$obj->numero_ext.'</td>'. 
              '<td>'.$obj->numero_int.'</td>'. 
          '<td><button type="button" class="btn btn-primary boton" id="boton" name="info"><span class="glyphicon glyphicon-user" aria-hidden="true"> </span></button>'.
          '<button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-transfer" aria-hidden="true"></span></button>'.
          '<button type="button" class="btn btn-warning botonUp" id="botonUp" name="botonUp"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>'.
          '<button type="button" class="btn btn-danger botonDel" id="botonDel" name="botonDel"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>'.
          '</td> </tr>';            
            }
        ?>
          </tbody>
          

        </table>
       
        
      </div>
          </body>
          </html>
