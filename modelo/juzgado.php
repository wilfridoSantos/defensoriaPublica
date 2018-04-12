<?php
require_once("conexion.php");

function listar_juzgado_x_id($id){
      global $conexion;
      $sql = "select * from cliente where id='".$id."'";
      $consulta = consulta($sql, $conexion);
      return $consulta;
  }
  
    



?>
