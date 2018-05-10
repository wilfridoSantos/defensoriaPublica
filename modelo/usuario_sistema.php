<?php
//include '../../controlador/conexion.php';
//include '../../libreria/conexion.php';
include_once ('../../libreria/conexion.php');



  
    //Definimos la funciones sobre el objeto crear_defensor
    function crear_usarioSistema($objetoEntidad){

        $sql ="select id_cargo from cargo where cargo='defensor'";
          $idcargo= consulta($sql);
    
         $sql = "INSERT INTO usuario_sistema  ";
        $sql.= "SET username='".$objetoEntidad['username']."', password='".$objetoEntidad['password']."',";
        $sql.= "estado=1";
       
        //return consulta($sql, $conexion);
    //echo $sql;
     registro($sql); 
    }
    //Definimos una funcion que acutualice al actualiza_defensor
    function actualiza_usarioSistema($clientes){
        global $conexion;
        $sql = "UPDATE  usuario_sistema ";
        $sql.= "SET id_juzgado='".$provedor['id_juzgado']."',   id_estudio='".$provedor['id_estudio']."',";
        $sql.= "numero_cedula_profesional='".$provedor['numero_cedula_profesional']."'";
        return consulta($sql, $conexion);
    }

    //Definimos una funcion que borrar defensor
    function borrar_usarioSistema($clientes){
        global $conexion;
        $sql = "DELETE  proveedor ";
        $sql.= "SET id_juzgado='".$provedor['id_juzgado']."',   id_estudio='".$provedor['id_estudio']."',";
        $sql.= "numero_cedula_profesional='".$provedor['numero_cedula_profesional']."'";
        return consulta($sql, $conexion);
    }

 function ultimousarioSistemaCreatado(){
        $sql = "SELECT MAX(id_personal) AS id FROM personal";
          $id=consulta($sql);
          // print_r($id);
        return $id[0]['id']; 

    }


?>
