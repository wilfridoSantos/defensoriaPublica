<?php
//include '../../controlador/conexion.php';
include '../../libreria/conexion.php';
function listar_defensores(){
      $sql="SELECT * FROM bddefensoria.defensor inner join bddefensoria.personal using(id_personal)
								    inner join bddefensoria.juzgado using(id_juzgado)";			

   $lista=consulta($sql);
   return $lista;
}

function listar_defensor_x_id($id){
      global $conexion;
      $sql = "select * from defensor where id='".$id."'";
      $consulta = consulta($sql, $conexion);
      return $consulta;
  }

function listar_defensor_x_cedula($numCedula){
    global $conexion;
    $sql = "select * from defensor where numero_cedula_profesional='".$numCedula."'";
    $consulta = consulta($sql, $conexion);
    return $consulta;
}
  
    //Definimos la funciones sobre el objeto crear_defensor
    function crear_defensor($objetoEntidad){
        echo $objetoEntidad[session_name()];
        global $conexion;
        $sql = "INSERT INTO defensor values ('";
        $sql.= " ".$objetoEntidad['id_juzgado'].", ".$objetoEntidad['id_estudio'].", ";
        $sql.= " ".$objetoEntidad['numero_cedula_profesional']." ";
        return consulta($sql, $conexion);
    }
    //Definimos una funcion que acutualice al actualiza_defensor
    function actualiza_defensor($clientes){
        global $conexion;
        $sql = "UPDATE  proveedor ";
        $sql.= "SET id_juzgado='".$provedor['id_juzgado']."',   id_estudio='".$provedor['id_estudio']."',";
        $sql.= "numero_cedula_profesional='".$provedor['numero_cedula_profesional']."'";
        return consulta($sql, $conexion);
    }

    //Definimos una funcion que borrar defensor
    function borrar_defensor($clientes){
        global $conexion;
        $sql = "DELETE  proveedor ";
        $sql.= "SET id_juzgado='".$provedor['id_juzgado']."',   id_estudio='".$provedor['id_estudio']."',";
        $sql.= "numero_cedula_profesional='".$provedor['numero_cedula_profesional']."'";
        return consulta($sql, $conexion);
    }
  echo 'omar es un tontin';



?>
