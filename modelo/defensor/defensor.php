<?php
//include '../../controlador/conexion.php';
include_once ('../../libreria/conexion.php');
function listar_defensores(){
        $sql="SELECT * FROM defensor inner join personal using(id_personal)
                                        inner join juzgado using(id_juzgado)
                                        inner join estudios using (id_estudios)";			

   $lista=consulta($sql);
   return $lista;
}

function listar_defensor_x_id($id){
      global $conexion;
      $sql = "select * from defensor where id='".$id."'";
      $consulta = consulta($sql, $conexion);
      return $consulta;
  }
function obtenerExpedientes(){
    $sql="SELECT * FROM expediente";			

$lista=consulta($sql);
return $lista;

}
function obtenerDefensorCedula($numCedula){
    //echo 'entro a  obtenerdefensorcedula '. $numCedula;
    $sql="SELECT * FROM defensor inner join personal using(id_personal)
                                    inner join juzgado using(id_juzgado)
                                    inner join estudios using (id_estudios) 
                                    where cedula_profesional='25uCCYANARAW'";	
    global $db;
    $infor = $db->prepare($sql);
    $infor->execute(); 
    $datos = $infor->fetchAll(PDO::FETCH_ASSOC);
    //$infor = consulta($sql);
    return $datos;
}
  
    //Definimos la funciones sobre el objeto crear_defensor
    function crear_defensor($objetoEntidad){
      
        $sql = "INSERT INTO defensor ";
        $sql.= " SET id_juzgado='".$objetoEntidad['id_juzgado']."', id_personal='".$objetoEntidad['id_personal']."' ";
       // echo $sql;
         $lista=registro($sql);
   return $lista;
    }
    //Definimos una funcion que acutualice al actualiza_defensor
    function actualiza_defensor($clientes){
        global $conexion;
        $sql = "UPDATE  proveedor ";
        $sql.= "SET id_juzgado='".$provedor['id_juzgado']."',   id_estudio='".$provedor['id_estudio']."',";
        $sql.= "numero_cedula_profesional='".$provedor['numero_cedula_profesional']."'";
        return registro($sql, $conexion);
    }

    //Definimos una funcion que borrar defensor
    function borrar_defensor($clientes){
        global $conexion;
        $sql = "DELETE  proveedor ";
        $sql.= "SET id_juzgado='".$provedor['id_juzgado']."',   id_estudio='".$provedor['id_estudio']."',";
        $sql.= "numero_cedula_profesional='".$provedor['numero_cedula_profesional']."'";
        return consulta($sql, $conexion);
    }

    function ultimoDefensorCreatado(){
        $sql = mysql_query("SELECT MAX(id_defensor) AS id FROM defensor");
          $id=consulta($sql);
          
        return $id[0]['id']; 

    }



?>
