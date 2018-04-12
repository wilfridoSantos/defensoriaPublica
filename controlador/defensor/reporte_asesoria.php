<?php
    require_once("modelo/defensor.php");
    require_once("modelo/materia.php");
    require_once("modelo/usuario_servicio.php");
    require_once("modelo/expediente.php");
    require_once("modelo/siguimiento_caso.php");
    require_once("modelo/juzgado.php");
    require_once("modelo/asesoria.php");
    
   $asesoria=['id_expediente'=>1,
                'dia_asesoria'=>02,
                'mes_asesoria'=>01,
                'an_asesoria'=>2008];
   $sql = "INSERT INTO proveedor ";
   $sql.= "SET id_expediente='".$provedor['id_expediente']."',   dia_asesoria='".$provedor['dia_asesoria']."',";
   $sql.= "SET mes_asesoria='".$provedor['mes_asesoria']."',   ano_asesoria='".$provedor['ano_asesoria']."',";
   $sql.= "observaciones='".$provedor['observaciones']."'";
    crear_asesoria($asesoria);

?>
