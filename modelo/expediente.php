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
                 using(id_personal) inner join detalle_usuario_expediente  using(id_expediente)
                 where id_materia='".$materia."' 
                 and id_usuario_servicio='".$id_usuario_servicio."'";
   // echo $sql;
         $lista=consulta($sql);
       //  print_r($lista);
         return $lista;
  }

  function listar_UsuarioServicioByExpediente($id_expediente){
  
    $sql = "   select * from detalle_usuario_expediente 
                inner join usuario_servicio using(id_usuario_servicio)
                where id_expediente='".$id_expediente."'"; 
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
      $sql="SELECT e.id_expediente, e.num_expediente, m.materia, e.fecha_inicio, e.estado, p.id_personal, e.observaciones
       FROM expediente as e inner join personal_campo as pc using(id_personal) inner join personal as p using(id_personal)
       inner join materia as m  using(id_materia)";
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
function updateExpediente($id_defensor, $id_expediente){
  $sql = "update expediente set id_personal='".$id_defensor."'";
  $sql.=" where id_expediente='".$id_expediente."'";
  $lista = consulta($sql);
  //echo $sql;
  return $lista;

}
function checkNoti(){
  $sql = "select count(id_expediente) as numeroExps from notificaciones";//num notis
  $nums = consulta($sql)[0]['numeroExps'];
  
  return $nums;
}
function bajaExpediente($id_expediente, $motivacion){
    $sql="update expediente set estado='Suspensión', observaciones='".$motivacion."'
          where id_expediente='".$id_expediente."'";
          $lista = consulta($sql);
          //echo $sql;
          return $lista;
}
 /* function listar_expediente_x_defensor($idDefensor){
   
    $sql = "select exp.estado,exp.fecha_final,exp.fecha_inicio, exp.num_expediente, exp.materia,exp.id_usuario_servicio,defensor.id_juzgado   defensor.estado from expediente as exp inner join 
                          personal_campo  ad defensor using(id_personal)
                           where id_personal='".$idDefensor."'";
   // echo $sql;
    $lista=consulta($sql);
  //  print_r($lista);
    return $lista;
 } */
 function listar_expediente_x_defensor($idDefensor){
   
    $sql = "select exp.id_expediente,exp.estado,exp.nombre_delito,exp.grado_delito,exp.observaciones,exp.fecha_final,exp.fecha_inicio, exp.num_expediente,
                defensor.id_juzgado,     defensor.estado AS estadoDefensor,defensor.id_personal,mate.materia
                from expediente as exp inner join 
            personal_campo  as defensor using(id_personal)
            inner join materia as mate using(id_materia)
            
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
    
    function listar_pregunta($id_materia){
     
        $sql = "select pregunta.id_pregunta,pregunta.id_materia,pregunta.id_pregunta,pregunta.pregunta,pregunta.identificador
                    from preguntas as pregunta
                      where id_materia='".$id_materia."'";
        $consulta = consulta($sql);
        return $consulta;
    }
    
    function listar_preguntaConOpciones($id_materia){
     
        $sql = "select pregunta.id_pregunta,pregunta.id_materia,pregunta.id_pregunta,pregunta.pregunta,pregunta.identificador,op.opcion
                    from preguntas as pregunta
                    left join opcion as op on pregunta.id_pregunta=op.id_pregunta where id_materia='".$id_materia."'";
        $consulta = consulta($sql);
        return $consulta;
    }
    

    function alta_expediente($objetoEntidad){
      
        $sql = "INSERT INTO expediente ";
        $sql.= " SET id_personal='".$objetoEntidad['id_defensor']."', nombre_delito='".$objetoEntidad['nombre_delito']."' ,";
        $sql.= "  grado_delito='".$objetoEntidad['grado_delito']."', num_expediente='".$objetoEntidad['num_expediente']."' ";
        //$sql.= " num_expediente='".$objetoEntidad['num_expediente']."' ";
      // echo $sql;
         $lista=registro($sql);
   return $lista;
    }
  

    //Definimos la funciones sobre el objeto crear_expediente
    
    function ultimoExpedinteCreatado(){
        $sql = "SELECT MAX(id_expediente) AS id FROM expediente";
        $id=consulta($sql);
        // print_r($id);
      return $id[0]['id']; 

    }



?>
