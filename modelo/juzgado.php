<?php
//require_once("conexion.php");
//include '../controlador/conexion.php';
include '../../libreria/conexion.php';
function listar_juzgado_x_id($id){
      global $conexion;
      $sql = "select * from juzgado where id='".$id."'";
      $consulta = consulta($sql, $conexion);
      return $consulta;
  }


    function crear_empresa($empresa){
        global $conexion;
        $sql = "INSERT INTO empresa ";
        $sql.= "SET r_social='".$empresa['r_social']."', rfc='".$empresa['rfc']."',";
        $sql.= "email='".$empresa['email']."', giro='".$empresa['giro']."',";
        $sql.= "titular='".$empresa['titular']."', puesto_t='".$empresa['puesto_t']."',"; 
        $sql.= "paginaweb='".$empresa['paginaweb']."', logo='".$empresa['logo']."',";
        $sql.= "domicilio='".$empresa['domicilio']."', telefono='".$empresa['telefono']."', password='".$empresa['clave']."'";
        return consulta($sql, $conexion);
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
     /// $conexion->query($sql);
 //       return consulta($sql, $conexion);

  // $sql="INSERT INTO  juzgado values()";			

  // $lista=consulta($sql);
  // return $lista;
    }
    



?>
