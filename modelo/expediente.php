<?php

include_once ('../../libreria/conexion.php');
function getExpedienteByNum($numExp){
      $sql = " select * from respuesta inner join preguntas using(id_pregunta) inner join expediente using(id_expediente)
       where num_expediente='".$numExp."' ";
    $lista=consulta($sql);
    return $lista;    
}
function listar_expedienteByPersonalAndMateria($id_usuario_servicio,$materia){
  
      $sql = " select * from expediente inner join personal_campo
                 using(id_personal) where materia='".$materia."' 
                 and id_usuario_servicio='".$id_usuario_servicio."'";
   // echo $sql;
         $lista=consulta($sql);
       //  print_r($lista);
         return $lista;
  }
  function listar_x_num_expediente_($num_expediente){
   
    $sql = "select * from expediente  inner join 
                          usuario_servicio using(id_usuario_servicio)
                           where num_expediente='".$num_expediente."'";
   // echo $sql;
    $lista=consulta($sql);
  //  print_r($lista);
    return $lista;
 }

 function listar_expedientes(){
  $sql="SELECT * FROM expediente inner join personal_campo using(id_personal) inner join personal using(id_personal)
                                inner join materia using(id_materia)";
  $lista=consulta($sql);
  return $lista;
}
function listar_expedientes_x_materia($materia){
  $sql="SELECT * FROM expediente inner join personal_campo using(id_personal) inner join personal using(id_personal)
         inner join materia using(id_materia)
        where materia= '".$materia."'";
  $lista=consulta($sql);
  return $lista;
}
function listar_expedientes_x_estado($estado){
  switch($estado){
    case 1:
      $sql="SELECT * FROM expediente inner join personal_campo using(id_personal) inner join personal using(id_personal)
             inner join materia using(id_materia) where id_personal>0";
    break;
    case 2: 
      $sql="SELECT * FROM expediente inner join personal_campo using(id_personal) inner join personal using(id_personal) 
                 inner join materia using(id_materia)where id_personal<0";
    break;
    case 3: 
      $sql="SELECT * FROM expediente inner join personal_campo using(id_personal) inner join personal using(id_personal)
       inner join materia using(id_materia)";
    break;
  }
  $lista=consulta($sql);
  return $lista;
}

function listar_expedientes_EM($estado, $materia){
  switch($estado){
    case 1:
      $sql="SELECT * FROM expediente inner join personal_campo using(id_personal) inner join personal using(id_personal) 
      inner join materia using(id_materia)
      where id_personal>0 and materia= '".$materia."'";
    break;
    case 2: 
      $sql="SELECT * FROM expediente inner join personal_campo using(id_personal) inner join personal using(id_personal) 
      inner join materia using(id_materia)
      where id_personal<0 and materia= '".$materia."'";
    break;
    case 3: 
      $sql="SELECT * FROM expediente inner join personal_campo using(id_personal) inner join personal using(id_personal)
      inner join materia using(id_materia)
      where materia= '".$materia."'";
    break;
  }
  $lista=consulta($sql);
  return $lista;
}
function listar_expedientes_activos(){
  $sql="SELECT * FROM expediente inner join personal_campo using(id_personal) inner join personal using(id_personal) where id_personal>0";
  $lista=consulta($sql);
  return $lista;
}
function listar_expedientes_activos_materia($q2){
  $sql="SELECT * FROM expediente inner join personal_campo using(id_personal) inner join personal using(id_personal) 
  where id_personal>0 and materia= '".$materia."'";
  $lista=consulta($sql);
  return $lista;
}
function listar_expedientes_inactivos(){
  $sql="SELECT * FROM expediente inner join personal_campo using(id_personal) inner join personal using(id_personal) where id_personal<0";
  $lista=consulta($sql);
  return $lista;
}
function listar_expedientes_inactivos_materia($q2){
  $sql="SELECT * FROM expediente inner join personal_campo using(id_personal) inner join personal using(id_personal)
   where id_personal<0 and materia= '".$materia."'";
  $lista=consulta($sql);
  return $lista;
}

 function listar_expediente_x_defensor($idDefensor){
   
    $sql = "select exp.estado,exp.fecha_final,exp.fecha_inicio, exp.num_expediente, exp.materia,exp.id_usuario_servicio,defensor.id_juzgado   defensor.estado from expediente as exp inner join 
                          personal_campo  ad defensor using(id_personal)
                           where id_personal='".$idDefensor."'";
   // echo $sql;
    $lista=consulta($sql);
  //  print_r($lista);
    return $lista;
 }
  
  function listar_expediente_asesoria($id_expediente){
        global $conexion;
        $sql = "select * from expediente inner join compra_proveedor using(id_expediente) inner join asesoria using(id_expediente) where nombre='".$id_expediente."'";
        $consulta = consulta($sql, $conexion);
        return $consulta;
    }
    function listar_expediente_visitas($id_expediente){
        global $conexion;
        $sql = "select * from expediente inner join compra_proveedor using(id_expediente) inner join visitas using(id_expediente) where nombre='".$id_expediente."'";
        $consulta = consulta($sql, $conexion);
        return $consulta;
    }
    function listar_expediente_adudiencia($id_expediente){
        global $conexion;
        $sql = "select * from expediente inner join compra_proveedor using(id_expediente) inner join audiencia using(id_expediente) where nombre='".$id_expediente."'";
        $consulta = consulta($sql, $conexion);
        return $consulta;
    }
    function alta_expediente($objetoEntidad){
      
        $sql = "INSERT INTO expediente ";
        $sql.= " SET id_usuario_servicio='".$objetoEntidad['id_usuario_servicio']."', id_personal='".$objetoEntidad['id_defensor']."' ,";
        $sql.= " num_expediente='".$objetoEntidad['num_expediente']."' ";
      // echo $sql;
         $lista=registro($sql);
   return $lista;
    }
  
    //Definimos la funciones sobre el objeto crear_expediente
    
   


?>
