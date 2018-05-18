<?php

include_once('../../libreria/conexion.php');

function listar_actividad_x_id($id){
      global $conexion;
      $sql = "select * from defensor where id='".$id."'";
      $consulta = consulta($sql, $conexion);
      return $consulta;
  }


    //Definimos la funciones sobre el objeto crear_asesoria
    function crear_actividad($asesoria){
        
        $sql = "INSERT INTO actividad ";
        $sql.= "SET id_usuario_servicio='".$asesoria['id_usuario_servicio']."',   id_personal_campo='".$asesoria['id_personal_campo']."',";
        $sql.= " dia_registro='".$asesoria['dia_registro']."',   mes_registro='".$asesoria['mes_registro']."',";
        $sql.= " anio_registro='".$asesoria['anio_registro']."',   observacion='".$asesoria['observacion']."'";
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
