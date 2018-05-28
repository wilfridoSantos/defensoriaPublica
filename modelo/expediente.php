<?php

include_once ('../../libreria/conexion.php');

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
 function listar_expediente_x_defensor($idDefensor){
   
    $sql = "select exp.estado,exp.accion_implementar,exp.observaciones,exp.fecha_final,exp.fecha_inicio, exp.num_expediente, exp.id_usuario_servicio,defensor.id_juzgado,     defensor.estado AS estadoDefensor,defensor.id_personal
                from expediente as exp inner join 
            personal_campo  as defensor using(id_personal)
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
        $sql.= " SET estado='".$objetoEntidad['estado']."', accion_implementar='".$objetoEntidad['accion_implementar']."' ,";
        $sql.= " num_expediente='".$objetoEntidad['num_expediente']."' ";
      // echo $sql;
         $lista=registro($sql);
   return $lista;
    }
  
    //Definimos la funciones sobre el objeto crear_expediente
    
   


?>
