<?php
//require_once("conexion.php");
//include '../controlador/conexion.php';
include_once( '../../libreria/conexion.php');
function listar_juzgado_x_id($id){
      global $conexion;
      $sql = "select * from juzgado where id='".$id."'";
      $consulta = consulta($sql, $conexion);
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
        $sql.= "calle='".$objetoEntidad['calle']."', numero_ext='".$objetoEntidad['numero_ext']."',";
        $sql.= "numero_int='".$objetoEntidad['numero_int']."', municipio='".$objetoEntidad['municipio']."',"; 
        $sql.= "cp='".$objetoEntidad['cp']."', num_telefono='".$objetoEntidad['num_telefono']."'";
        //return consulta($sql, $conexion);
    
      registro($sql); 
    //  return 
     /// $conexion->query($sql);
 //       return consulta($sql, $conexion);

  // $sql="INSERT INTO  juzgado values()";			

  // $lista=consulta($sql);
  // return $lista;
    }
    



?>
