<?php

include_once('../../libreria/conexion.php');

function getActividades(){
    $sql = "select act.fecha_registro as fechaR, act.observacion as observaciones,act.id_actividad as idAct,
    ase.latitud as latAse, ase.longitud as longAse,
    aud.latitud as latAud, aud.longitud as longAud,
    vis.foto as fotoVis,
    usu.nombre as Usuario
     from actividad as act 
                     left join asesoria as ase using(id_actividad)
                     left join audiencias as aud using(id_actividad)
                     left JOIN visitas_carcelarias as vis using(id_actividad)
                     inner join usuario_servicio as usu using(id_usuario_servicio)
                     order by id_actividad;";
    $consulta = consulta($sql);
    return $consulta;
}
function getActividadesAsesorias(){
    $sql = "select act.fecha_registro as fechaR, act.observacion as observaciones,act.id_actividad as idAct,
    ase.latitud as latAse, ase.longitud as longAse,
    usu.nombre as Usuario
     from actividad as act 
                     inner join asesoria as ase using(id_actividad)                     
                     inner join usuario_servicio as usu using(id_usuario_servicio)
                     order by id_actividad;";
    $consulta = consulta($sql);
    return $consulta;
}
function getActividadesAudiencias(){
    $sql = "select act.fecha_registro as fechaR, act.observacion as observaciones,act.id_actividad as idAct,    
    aud.latitud as latAud, aud.longitud as longAud,
    usu.nombre as Usuario
     from actividad as act 
                     
                     inner join audiencias as aud using(id_actividad)
                     
                     inner join usuario_servicio as usu using(id_usuario_servicio)
                     order by id_actividad;";
    $consulta = consulta($sql);
    return $consulta;
}
function updateObservacion($obs, $id_act){
    $sql = "update actividad set observacion='".$obs."' where id_actividad='".$id_act."' ";
    $consulta = consulta($sql);
    return $consulta;
}
function getActividadesVisitas(){
        $sql = "select act.fecha_registro as fechaR, act.observacion as observaciones,
        vis.foto as fotoVis,
        usu.nombre as Usuario
        from actividad as act                     
                        inner JOIN visitas_carcelarias as vis using(id_actividad)
                        inner join usuario_servicio as usu using(id_usuario_servicio)
                        order by id_actividad;";
    $consulta = consulta($sql);
    return $consulta;
}
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
    $sql = "SELECT P.nombre as Defensor, U.nombre as Usuario, fecha_registro, observacion, latitud, longitud
    FROM actividad inner join asesoria as A using(id_actividad) inner join personal AS P using(id_personal) 
    inner join usuario_servicio as U using(id_usuario_servicio)  
    where (fecha_registro between '".$fechaInicio."' and '".$fechaFinal."') and nue='".$nue."'";
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
