<?php
//include '../../controlador/conexion.php';
include_once '../../libreria/conexion.php';

function getContraparteById($id_contraparte){
    $sql = "select * from contraparte where id_contraparte='".$id_contraparte."'";
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
       // $sql.="'".$objetoEntidad['calle']."',"."'".$objetoEntidad['curp']."')";
        /* $sql = "INSERT INTO contraparte ";
        $sql.= "SET nombre='".$objetoEntidad['nombre']."', apellido_materno='".$objetoEntidad['ap_materno']."',";
        $sql.= "apellido_paterno='".$objetoEntidad['ap_paterno']."', genero='".$objetoEntidad['genero']."',";
        $sql.= "calle='".$objetoEntidad['calle']."', edad='".$objetoEntidad['edad']."',";
        $sql.= "fecha_nacimiento='".$objetoEntidad['fecha_nacimiento']."', idioma='".$objetoEntidad['idioma']."',";
        $sql.= "etnia='".$objetoEntidad['etnia']."', curp='".$objetoEntidad['curp']."',"; 
        $sql.= "id_contraparte='".$objetoEntidad['id_contraparte']."',"; 
        //$sql.= "calle='".$objetoEntidad['calle']."', municipio='".$objetoEntidad['municipio']."',"; 
       // $sql.= "numero_int='".$objetoEntidad['numero_int']."', numero_ext='".$objetoEntidad['numero_ext']."',"; 
        $sql.= "entidad='".$objetoEntidad['estado']."',sexo='".$objetoEntidad['sexo']."',"; 
        $sql.= "telefono='".$objetoEntidad['telefono']."', email='".$objetoEntidad['correo']."'";  */
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
    function listar_contraparte(){
        $sql="SELECT * FROM contraparte";			

   $lista=consulta($sql);
   return $lista;
}


?>
