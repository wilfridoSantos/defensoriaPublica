<?php
//include '../../controlador/conexion.php';
include_once '../../libreria/conexion.php';

function getContraparteById($id_expediente){
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
    function crear_contraparte($objetoEntidad){
      
        $sql = "INSERT INTO contraparte ";
        $sql.= "SET nombre='".$objetoEntidad['nombre']."', ap_materno='".$objetoEntidad['ap_materno']."',";
        $sql.= "ap_paterno='".$objetoEntidad['ap_paterno']."', genero='".$objetoEntidad['genero']."',";
        $sql.= "edad='".$objetoEntidad['edad']."', idioma='".$objetoEntidad['idioma']."',";
        $sql.= "etnia='".$objetoEntidad['etnia']."', curp='".$objetoEntidad['curp']."',"; 
        $sql.= "calle='".$objetoEntidad['calle']."', numero_ext='".$objetoEntidad['numero_ext']."',"; 
        $sql.= "numero_int='".$objetoEntidad['numero_int']."', municipio='".$objetoEntidad['municipio']."',"; 
        $sql.= "estadoProveniente='".$objetoEntidad['estado']."',sexo='".$objetoEntidad['sexo']."',"; 
        $sql.= "telefono='".$objetoEntidad['telefono']."', correo_electronico='".$objetoEntidad['correo']."'"; 
       //echo $sql;
         $lista=registro($sql);

        // echo $lista;
       return $lista;
    }

    
    //Definimos una funcion que acutualice al Contraparte
 function actualizar_Contraparte($defensor){
        
        $sql = "UPDATE  defensor as d inner join personal as p using(id_personal) inner join juzgado as j using(id_juzgado)".
        "SET p.nombre='".$defensor['nombre']."', p.ap_paterno='".$defensor['ap_paterno']."', p.ap_materno='".$defensor['ap_materno']."',".
        "p.curp='".$defensor['curp']."', p.calle='".$defensor['calle']."', p.numero_ext='".$defensor['numero_ext']."',".
        "p.numero_int='".$defensor['numero_int']."',p.colonia='".$defensor['colonia']."',p.municipio='".$defensor['municipio']."',".
        "p.nup='".$defensor['nup']."',p.nue='".$defensor['nue']."',p.genero='".$defensor['genero']."',p.telefono='".$defensor['telefono']."',".
        "p.corre_electronico='".$defensor['corre_electronico']."',j.juzgado='".$defensor['juzgado']."'".
        " where id_defensor = '".$defensor['id_defensor']."'";
        $lista=consulta($sql);
        //echo $defensor['id_defensor'].' => Ah sido actualizado';
        //echo $sql;
        return $lista;
 }

    //Definimos una funcion que borrar defensor
    function eliminar_Contraparte($id_defensor){
        
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