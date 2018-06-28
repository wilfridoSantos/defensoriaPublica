<?php

include_once('../../libreria/conexion.php');
/* 
    select d.nombre as defensor, count( select actAs.id_actividad 
                                            from asesorias inner join actividad as act
                                                where actAs.id_actividad = 5
                                                ) as numAses
            from actividades left join.....
*/

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
                     order     by id_actividad;";
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
    $sql = " SELECT sistema,U.sexo,U.genero as generoU,U.edad as edadU,U.etnia as etniaU, U.discapacidad as discapacidadU, U.idioma as idiomaU,P.nombre as Defensor, U.nombre as Usuario, fecha_registro, observacion,
                    A.id_actividad as idAse, A.latitud as latAse, A.longitud as longAse,
                    Au.id_actividad as idAud, Au.latitud as latAud, Au.longitud as longAud,
                    vis.id_actividad as idAct, vis.foto as fotoVis, act.id_actividad as idAct
    from actividad as act left join asesoria as A using(id_actividad) 
        left join audiencias as Au using(id_actividad)
        left join visitas_carcelarias as vis using(id_actividad) 
        left join personal as P using(id_personal)
        left join personal_campo using(id_personal) 
        left join materia as m using(id_materia)
        left join usuario_servicio as U using(id_usuario_servicio)
    where fecha_registro between '".$fechaI."' and '".$fechaF."'  order by generoU";
    $lista= consulta($sql);
    //print_r($sql);
    return $lista;
}

function getActividadesConsulta($inicio, $final, $sys){
    $sql = " SELECT sistema,U.sexo,U.genero as generoU,U.edad as edadU,U.etnia as etniaU, U.discapacidad as discapacidadU, U.idioma as idiomaU,P.nombre as Defensor, U.nombre as Usuario, fecha_registro, observacion,
                    A.id_actividad as idAse, A.latitud as latAse, A.longitud as longAse,
                    Au.id_actividad as idAud, Au.latitud as latAud, Au.longitud as longAud,
                    vis.id_actividad as idAct, vis.foto as fotoVis, act.id_actividad as idAct
    from actividad as act left join asesoria as A using(id_actividad) 
        left join audiencias as Au using(id_actividad)
        left join visitas_carcelarias as vis using(id_actividad) 
        left join personal as P using(id_personal)
        left join personal_campo using(id_personal) 
        left join materia as m using(id_materia)
        left join usuario_servicio as U using(id_usuario_servicio)
    where (fecha_registro between '".$inicio."' and '".$final."') and m.sistema='".$sys."'";
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
