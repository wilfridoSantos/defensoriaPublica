<?php
//require_once("conexion.php");
//include '../controlador/conexion.php';
include_once( '../../libreria/conexion.php');
function listar_juzgado_x_id($id){
    
      $sql = "select * from juzgado where id_juzgado='".$id."'";
      $consulta = consulta($sql);
      return $consulta;
  }

  function listar_juzgado(){
     
      $sql = "select id_juzgado,juzgado,region from juzgado ";
      $consulta = consulta($sql);
      return $consulta;
  }


 
  
  function crear_juzgado($objetoEntidad){
      //  echo $objetoEntidad[session_name()];
       // global $conexion;
      $sql = "INSERT INTO juzgado ";
        $sql.= "SET juzgado='".$objetoEntidad['juzgado']."', region='".$objetoEntidad['region']."',";
        $sql.= "calle='".$objetoEntidad['calle']."', num_juzgado='".$objetoEntidad['numero_juzgado']."',";
        $sql.= " municipio='".$objetoEntidad['municipio']."',"; 
        $sql.= "cp='".$objetoEntidad['cp']."', num_telefono='".$objetoEntidad['num_telefono']."',";
        $sql.= "colonia='".$objetoEntidad['colonia']."', num_extension='".$objetoEntidad['numero_extension']."'";
        //return consulta($sql, $conexion);
    
      registro($sql); 
        print_r($sql);
    }
    



    ?>
