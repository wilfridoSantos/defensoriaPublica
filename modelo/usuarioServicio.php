<?php
//include '../../controlador/conexion.php';
include_once '../../libreria/conexion.php';

function getUsuarioServicioById($id_expediente){
    $sql = "select * from usuario_servicio inner join detalle_usuario_expediente using(id_usuario_servicio) where id_expediente='".$id_expediente."'";
    $lista = consulta($sql);
    return $lista;
}

function getUsuarioByCurp($curp){
    $sql = "select * from usuario_servicio where curp='".$curp."'";
    $consulta = consulta($sql);
 //  echo $sql;
    return $consulta;
}
  
    //Definimos la funciones sobre el objeto crear_defensor
    function crear_usuarioSevicio($objetoEntidad){
      
        $sql = "INSERT INTO usuario_servicio ";
        $sql.= "SET nombre='".$objetoEntidad['nombre']."', ap_materno='".$objetoEntidad['ap_materno']."',";
        $sql.= "ap_paterno='".$objetoEntidad['ap_paterno']."', genero='".$objetoEntidad['genero']."',";
        $sql.= "edad='".$objetoEntidad['edad']."', idioma='".$objetoEntidad['idioma']."',";
        $sql.= "etnia='".$objetoEntidad['etnia']."', curp='".$objetoEntidad['curp']."',"; 
        $sql.= "calle='".$objetoEntidad['calle']."', numero_ext='".$objetoEntidad['numero_ext']."',"; 
        $sql.= "numero_int='".$objetoEntidad['numero_int']."', municipio='".$objetoEntidad['municipio']."',"; 
        $sql.= "estadoProveniente='".$objetoEntidad['estado']."',sexo='".$objetoEntidad['sexo']."',"; 
        $sql.= "telefono='".$objetoEntidad['telefono']."', correo_electronico='".$objetoEntidad['correo']."',"; 
        $sql.= "discapacidad='".$objetoEntidad['discapacidad']."'"; 
       echo $sql;
         $lista=registro($sql);

        // echo $lista;
       return $lista;
    }

    
    //Definimos una funcion que acutualice al usuarioServicio
    function actualizar_usuario_servicio($usuario_servicio){
        $sql = "update usuario_servicio set ";
        $sql.= "nombre='".$usuario_servicio['nombre']."',";
        $sql.= "ap_paterno='".$usuario_servicio['apellido_paterno']."',";
        $sql.= "ap_materno='".$usuario_servicio['apellido_materno']."',";
        $sql.= "etnia='".$usuario_servicio['etnia']."',";
        $sql.= "idioma='".$usuario_servicio['idioma']."',";
        $sql.= "calle='".$usuario_servicio['calle']."',";
        $sql.= "colonia='".$usuario_servicio['colonia']."',";
        $sql.= "municipio='".$usuario_servicio['municipio']."',";
        $sql.= "telefono='".$usuario_servicio['telefono']."',";
        $sql.= "genero='".$usuario_servicio['genero']."',";
        $sql.= "discapacidad='".$usuario_servicio['discapacidad']."',";
        $sql.= "correo_electronico='".$usuario_servicio['email']."'";
      $sql.=" where id_usuario_servicio='".$usuario_servicio['id_usuario_servicio']."'";
      $lista = consulta($sql);
      //echo $sql;
      return $lista;
     }

    //Definimos una funcion que borrar defensor
    function eliminar_usuarioServicio($id_defensor){
        
        //$sql = "DELETE from  defensor where id_defensor = '".$id_defensor."'";
        $sql = "UPDATE defensor as d  inner join personal as p using (id_personal)
                set d.estado = false, p.estado=false where id_defensor = '".$id_defensor."'";
        $lista = consulta($sql);
        return $lista;
    }

    function ultimoUsuarioCreado(){
        $sql = mysql_query("SELECT MAX(id_defensor) AS id FROM usuario_servicio");
          $id=consulta($sql);
          
        return $id[0]['id']; 

    }
    function listar_usuarios(){
        $sql="SELECT id_usuario_servicio, nombre, ap_paterno,ap_materno,curp,etnia,colonia,municipio FROM usuario_servicio as u;";			

   $lista=consulta($sql);
   return $lista;
}

function listar_usuarios_id($id_usuario_servicio){
    $sql="SELECT *  FROM usuario_servicio where id_usuario_servicio=".$id_usuario_servicio;			
// echo $sql;
$lista=consulta($sql);
return $lista;
}

?>
