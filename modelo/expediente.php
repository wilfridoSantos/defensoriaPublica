<?php

include_once ('../../libreria/conexion.php');

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
