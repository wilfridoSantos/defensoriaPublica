<?php
include_once('../../libreria/conexion.php');

function getDetalleByContraparteAndExpediente($id_contraparte,$id_expediente){
  $sql = "select * from contraparte_expediente 
          where id_expediente=".$id_expediente." 
             and id_contraparte='".$id_contraparte."'";
  $lista = consulta($sql);
  return $lista;
}

function alta_DetalleContraparte($objeto){
      
    $sql = "INSERT INTO contraparte_expediente ";
    $sql.= " SET id_expediente='".$objeto['id_expediente']."', id_contraparte='".$objeto['id_contraparte']."', ";
    $sql.= "  tipo_contraparte='".$objeto['tipo_contraparte']."', ";
    $sql.= "  parentesco='".$objeto['parentesco']."' ";
    
  // echo $sql;
     $lista=registro($sql);
return $lista;
}




?>