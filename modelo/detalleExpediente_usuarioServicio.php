<?php
include_once('../../libreria/conexion.php');

function alta_DetalleExpedinte($id_expediente,$id_usuario_servicio){
      
    $sql = "INSERT INTO detalle_usuario_expediente ";
    $sql.= " SET id_expediente='".$id_expediente."', id_usuario_servicio='".$id_usuario_servicio."' ";
    
   echo $sql;
     $lista=registro($sql);
return $lista;
}


function get_materia_instancia(){
    $sql="SELECT id_personal, nombre, ap_paterno,ap_materno,estado,juzgado FROM personal_campo as d inner join personal as p using(id_personal)
                    inner join juzgado as j using(id_juzgado) where id_cargo =4";			

$lista=consulta($sql);
return $lista;
}

?>