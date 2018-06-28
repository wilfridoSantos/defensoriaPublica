<?php
//include '../../controlador/conexion.php';
include_once '../../libreria/conexion.php';

function getContraparteById($id_contraparte){
    $sql = "select * from contraparte where id_contraparte='".$id_contraparte."'";
    //echo $sql;
    $lista = consulta($sql);
    return $lista;
}
function getContrapartesById($id_contraparte){
    $sql = "select * from contraparte as contra 
    inner join contraparte_expediente  as detalle  using(id_contraparte)
    where detalle.id_expediente='".$id_contraparte."'";
    //echo $sql;
    $lista = consulta($sql);
    return $lista;
}


function getUsuarioByCurp($curp){
    $sql = "select * from usuario_servicio where curp='".$curp."'";
    $consulta = consulta($sql);
 //  echo $sql;
    return $consulta;
}
//("insert ignore into test_warnings (id_, num_) values (?,?)
    //Definimos la funciones sobre el objeto crear_defensor
    function crear_contraparte($objetoEntidad){
      
        $sql="INSERT INTO contraparte(id_contraparte,nombre,apellido_paterno,apellido_materno,sexo,fecha_nacimiento,edad,";
        $sql.="etnia,idioma,entidad,genero,telefono,email,calle,curp,discapacidad) values(";
        $sql.="'".$objetoEntidad['id_contraparte']."',"."'".$objetoEntidad['nombre']."',"."'".$objetoEntidad['ap_paterno']."',";
        $sql.="'".$objetoEntidad['ap_materno']."',"."'".$objetoEntidad['sexo']."',"."'".$objetoEntidad['fecha_nacimiento']."',";
        $sql.="'".$objetoEntidad['edad']."',"."'".$objetoEntidad['etnia']."',"."'".$objetoEntidad['idioma']."',";
        $sql.="'".$objetoEntidad['estado']."',"."'".$objetoEntidad['genero']."',"."'".$objetoEntidad['telefono']."',";
        $sql.="'".$objetoEntidad['correo']."',"."'".$objetoEntidad['calle']."',"."'".$objetoEntidad['curp']."',";
        $sql.="'".$objetoEntidad['discapacidad']."')";
      
         $lista=registro($sql);

        // echo $lista;
       return $lista;
    }

    
    //Definimos una funcion que acutualice al Contraparte
 function actualizar_Contraparte($contraparte){
    $sql = "update contraparte set ";
    $sql.= "nombre='".$contraparte['nombre']."',";
    $sql.= "apellido_paterno='".$contraparte['apellido_paterno']."',";
    $sql.= "apellido_materno='".$contraparte['apellido_materno']."',";
    $sql.= "etnia='".$contraparte['etnia']."',";
    $sql.= "idioma='".$contraparte['idioma']."',";
    $sql.= "telefono='".$contraparte['telefono']."',";
    $sql.= "genero='".$contraparte['genero']."',";
    $sql.= "discapacidad='".$contraparte['discapacidad']."',";
    $sql.= "email='".$contraparte['email']."'";
  $sql.=" where id_contraparte='".$contraparte['id_contraparte']."'";
  $lista = consulta($sql);
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
    function listar_contraparte(){
        $sql="SELECT * FROM contraparte";			

   $lista=consulta($sql);
   return $lista;
}


?>
