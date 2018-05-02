<?php
//include '../../controlador/conexion.php';
//include '../../libreria/conexion.php';
include_once ('../../libreria/conexion.php');
function listar_personal(){
        $sql="SELECT * FROM defensor inner join personal using(id_personal)
                                        inner join juzgado using(id_juzgado)
                                        inner join estudios using (id_personal)";			

   $lista=consulta($sql);
   return $lista;
}



  
    //Definimos la funciones sobre el objeto crear_defensor
    function crear_personal($objetoEntidad){

        $sql ="select id_cargo from cargo where cargo='defensor'";
          $idcargo= consulta($sql);
    
         $sql = "INSERT INTO personal  ";
        $sql.= "SET id_cargo='".$objetoEntidad['id_cargo']."', nombre='".$objetoEntidad['nombre']."',";
        $sql.= "ap_paterno='".$objetoEntidad['ap_paterno']."', ap_materno='".$objetoEntidad['ap_materno']."',";
        $sql.= "curp='".$objetoEntidad['curp']."', calle='".$objetoEntidad['calle']."',"; 
        $sql.= "numero_ext='".$objetoEntidad['numero_ext']."', numero_int='".$objetoEntidad['numero_int']."',"; 
        $sql.= "colonia='".$objetoEntidad['colonia']."', municipio='".$objetoEntidad['municipio']."',"; 
        $sql.= "nup='".$objetoEntidad['nup']."', nue='".$objetoEntidad['nue']."',"; 
        $sql.= "genero='".$objetoEntidad['genero']."', telefono='".$objetoEntidad['telefono']."',"; 
        $sql.= "correo_electronico='".$objetoEntidad['correo']."', foto='".$objetoEntidad['foto']."'";
        //return consulta($sql, $conexion);
    //echo $sql;
     registro($sql); 
    }
    //Definimos una funcion que acutualice al actualiza_defensor
    function actualiza_personal($clientes){
        global $conexion;
        $sql = "UPDATE  proveedor ";
        $sql.= "SET id_juzgado='".$provedor['id_juzgado']."',   id_estudio='".$provedor['id_estudio']."',";
        $sql.= "numero_cedula_profesional='".$provedor['numero_cedula_profesional']."'";
        return consulta($sql, $conexion);
    }

    //Definimos una funcion que borrar defensor
    function borrar_personal($clientes){
        global $conexion;
        $sql = "DELETE  proveedor ";
        $sql.= "SET id_juzgado='".$provedor['id_juzgado']."',   id_estudio='".$provedor['id_estudio']."',";
        $sql.= "numero_cedula_profesional='".$provedor['numero_cedula_profesional']."'";
        return consulta($sql, $conexion);
    }

 function ultimoPersonalCreatado(){
        $sql = "SELECT MAX(id_personal) AS id FROM personal";
          $id=consulta($sql);
          // print_r($id);
        return $id[0]['id']; 

    }


?>
