<?php

include_once('../../libreria/conexion.php');

function listar_actividad_x_id($id){
      global $conexion;
      $sql = "select * from defensor where id='".$id."'";
      $consulta = consulta($sql, $conexion);
      return $consulta;
  }
  function getActividadesByRangoFecha($fechaI, $fechaF){
    $sql = "SELECT P.nombre as Defensor, U.nombre as Usuario, fecha_registro, observacion, latitud, longitud
     FROM actividad inner join asesoria as A using(id_actividad) inner join personal AS P using(id_personal) 
     inner join usuario_servicio as U using(id_usuario_servicio)
     
    where fecha_registro between '".$fechaI."' and '".$fechaF."' ";
    $lista= consulta($sql);
    //print_r($sql);
    return $lista;
}
function getActividadesByFiltroPersonal($fechaInicio, $fechaFinal,$puesto){
    $sql = "SELECT * FROM actividad inner join asesoria using(id_actividad) inner join personal using(id_personal)
    where (fecha_registro between '".$fechaI."' and '".$fechaF."') and id_cargo='".$puesto."'";
    $lista= consulta($sql);
    //print_r($sql);
    return $lista;
}
function getActividadesByFiltroNue($fechaInicio, $fechaFinal,$nue){
    $sql = "SELECT * FROM actividad inner join asesoria using(id_actividad) inner join personal using(id_personal)
    where (fecha_registro between '".$fechaI."' and '".$fechaF."') and nue='".$nue."'";
    $lista= consulta($sql);
    //print_r($sql);
    return $lista;
}
    //Definimos la funciones sobre el objeto crear_asesoria
    function crear_actividad($asesoria){
        
        $sql = "INSERT INTO actividad ";
        $sql.= "SET id_usuario_servicio='".$asesoria['id_usuario_servicio']."',   id_personal='".$asesoria['id_personal_campo']."',";
       // $sql.= " dia_registro='".$asesoria['dia_registro']."',   mes_registro='".$asesoria['mes_registro']."',";
        $sql.= " fecha_registro='".$asesoria['fecha_registro']."',   observacion='".$asesoria['observacion']."'";
            echo $sql;
        $lista=registro($sql);
        return $lista;

    }

 
    function ultimoActividadRegistrado(){
        $sql = "SELECT MAX(id_actividad) AS id FROM actividad";
          $id=consulta($sql);
          // print_r($id);
        return $id[0]['id']; 

    }




?>
