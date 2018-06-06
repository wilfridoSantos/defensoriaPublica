<?php
include_once('../../libreria/conexion.php');

function get_materia_materia_instancia($materia,$instancia){
        $sql="SELECT id_materia,materia,instancia FROM materia  where materia ='".$materia."' and instancia =".$instancia;			
     
   $lista=consulta($sql);
   return $lista;
}

function get_materia_instancia(){
    $sql="SELECT id_personal, nombre, ap_paterno,ap_materno,estado,juzgado FROM personal_campo as d inner join personal as p using(id_personal)
                    inner join juzgado as j using(id_juzgado) where id_cargo =4";			

$lista=consulta($sql);
return $lista;
}

?>