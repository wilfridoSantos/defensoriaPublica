<?php
include_once('../../libreria/conexion.php');
function listar_defensores(){
        $sql="SELECT id_personal, nombre, ap_paterno,ap_materno,estado,juzgado FROM personal_campo as d inner join personal as p using(id_personal)
                        inner join juzgado as j using(id_juzgado) where id_cargo =4";			

   $lista=consulta($sql);
   return $lista;
}

function listar(){
    $sql="SELECT * FROM personal_campo as d inner join personal as p using(id_personal)
                        inner join juzgado as j using(id_juzgado) where p.id_cargo =4";			

        $sql="SELECT * FROM personal as p inner join personal_campo as d using(id_personal)
                    inner join juzgado as j using(id_juzgado) where id_cargo =4";			
   $lista=consulta($sql);
   return $lista;
}
function listar_defensores_estudios(){
    $sql="SELECT * FROM personal_campo as d inner join personal as p using(id_personal)
                    inner join juzgado as j using(id_juzgado)
                    inner join estudios using(id_personal) where id_cargo =4";			

$lista=consulta($sql);
//print_r($sql);
return $lista;
}

function numRegistros($sql){
    return registro($sql);
}
function getDefensorById($id_defensor){
    $sql="SELECT p.nombre,p.ap_paterno,p.ap_materno, p.municipio, p.colonia, p.calle,p.numero_int,p.numero_ext, p.genero,p.telefono,p.correo_electronico,p.curp,p.foto, nup,nue,juzgado,perfil,cedula_profesional FROM personal_campo as d inner join personal as p using(id_personal)
    inner join juzgado as j using(id_juzgado)
    inner join escolaridad using(id_personal) where id_cargo=4 and d.id_personal ='".$id_defensor."' ";

    if(registro($sql) == 0){
        $sql="SELECT p.nombre,p.ap_paterno,p.ap_materno, p.municipio, p.colonia, p.calle,p.numero_int,p.numero_ext, p.genero,p.telefono,p.correo_electronico,p.curp,p.foto, nup,nue,juzgado FROM personal_campo as d inner join personal as p using(id_personal)
        inner join juzgado as j using(id_juzgado)
        where id_cargo=4 and d.id_personal ='".$id_defensor."' ";
        $lista = consulta($sql);
        return $lista;
    }else
        $lista = consulta($sql);
        return $lista;
}
function getExpedientesById($id_defensor){
    $sql="SELECT * FROM personal_campo as d inner join expediente using(id_personal)
                 inner join personal using(id_personal) inner join escolaridad using(id_personal) 
                 where id_cargo=4 and d.id_personal ='".$id_defensor."' ";
        $lista = consulta($sql);
        return $lista;
}

function getImagenById($id_defensor){
    $sql="SELECT foto FROM personal_campo as d inner join personal as p using(id_personal)
    inner join juzgado as j using(id_juzgado)
    inner join escolaridad using(id_personal) where id_cargo=4 and d.id_personal ='".$id_defensor."' ";
    $lista = consulta_obj($sql);
    //echo 'si hace consulta';
    return $lista;

}
function getDefensorUpdate($id_defensor){
    $sql="SELECT * FROM personal_campo as d inner join personal as p using(id_personal)
             where id_cargo=4 and d.id_personal ='".$id_defensor."' ";
    $lista = consulta($sql);
   
    return $lista;

}
function listar_defensor_x_id($id){
      global $conexion;
      $sql = "select * from personal_campo where id='".$id."'";
      $consulta = consulta($sql, $conexion);
      return $consulta;
  }

  function listar_defensor_x_juzgado($juzgado){
 
    $sql = "select * from personal_campo
              inner join personal using(id_personal )
               where   id_cargo=2 and id_juzgado='".$juzgado."'";
    $consulta = consulta($sql);
   // echo $sql;
    return $consulta;
}
  function listar_defensor_x_nue($nue){
 
    $sql = "select * from personal_campo inner join personal using (id_personal ) where nue='".$nue."'";
    $consulta = consulta($sql);
   // echo $sql;
    return $consulta;
}
function listar_defensor_x_nup($nup){
 
    $sql = "select * from personal_campo inner join personal using (id_personal ) where nue='".$nup."'";
    $consulta = consulta($sql);
   // echo $sql;
    return $consulta;
}

function obtenerExpedientes($id_defensor){
    $sql="SELECT * FROM expediente inner join personal_campo using(id_defensor) WHERE 
                    id_defensor = '".$id_defensor."'";
$lista=consulta($sql);
return $lista;

}

function obtenerDefensorCedula($cedulaProf){
    //echo 'entro a  obtenerdefensorcedula ';
    $sql="SELECT * FROM personal_campo inner join personal using(id_personal)
                                    inner join juzgado using(id_juzgado)
                                    inner join estudios using (id_estudios) 
                                    where cedula_profesional='guy87gbH5fASa'";	
    global $db;
    $infor = $db->prepare($sql);
    $infor->execute(); 
    $datos = $infor->fetchAll(PDO::FETCH_ASSOC);
    //$infor = consulta($sql);
    return $datos;

}
  
    //Definimos la funciones sobre el objeto crear_defensor
    function crear_defensor($objetoEntidad){
      
        $sql = "INSERT INTO personal_campo ";
        $sql.= " SET id_juzgado='".$objetoEntidad['id_juzgado']."', id_personal='".$objetoEntidad['id_personal']."' ";
       // echo $sql;
         $lista=registro($sql);
   return $lista;
    }

    function actualizar_juzgado($id_juzgado,$id_defensor){
      
        $sql = "UPDATE personal_campo ";
        $sql.= " SET id_juzgado='".$id_juzgado."' where id_defensor = ".$id_defensor;
        echo $sql;
         $lista=registro($sql);
   return $lista;
    }
    //Definimos una funcion que acutualice al actualiza_defensor
 function actualiza_defensor($defensor){
        
        $sql = "UPDATE  personal_campo as d inner join personal as p using(id_personal)".
        "SET p.nombre='".$defensor['nombre']."', p.ap_paterno='".$defensor['ap_paterno']."', p.ap_materno='".$defensor['ap_materno']."',".
        "p.curp='".$defensor['curp']."', p.calle='".$defensor['calle']."', p.numero_ext='".$defensor['numero_ext']."',".
        "p.numero_int='".$defensor['numero_int']."',p.colonia='".$defensor['colonia']."',p.municipio='".$defensor['municipio']."',".
        "p.telefono='".$defensor['telefono']."',".
        "p.correo_electronico='".$defensor['correo_electronico']."', p.foto='".$defensor['foto']."'".
        " where d.id_personal= '".$defensor['id_personal']."'";
        $lista=consulta($sql);
        //echo $defensor['id_defensor'].' => Ah sido actualizado';
        print_r($sql);
        return $lista;
 }

    //Definimos una funcion que borrar defensor
    function eliminar_defensor($id_defensor){
        
        //$sql = "DELETE from  defensor where id_defensor = '".$id_defensor."'";
        $sql = "UPDATE personal_campo as d  inner join personal as p using (id_personal)
                set d.estado = false where id_personal = '".$id_defensor."'";
        $lista = consulta($sql);
        return $lista;
    }

    function ultimoDefensorCreatado(){
        $sql = mysql_query("SELECT MAX(id_defensor) AS id FROM defensor");
          $id=consulta($sql);
          
        return $id[0]['id']; 

    }



?>