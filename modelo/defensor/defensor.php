<?php
include_once('../../libreria/conexion.php');
function listar_defensores(){
            $sql="SELECT id_personal, nombre, ap_paterno,ap_materno,estado,juzgado,p.municipio,p.colonia FROM personal_campo as d inner join personal as p using(id_personal)
                            inner join juzgado as j using(id_juzgado) where id_cargo =4";			

   $lista=consulta($sql);
   //print_r($sql);
   return $lista;

}

function registrarEstudio($objetoEntidad){
    $sql="INSERT INTO escolaridad(id_personal,grado_escolaridad,fecha_termino,instituto,descripcion_perfil_egreso,cedula_profesional,";
    $sql.="perfil,documento_provatorio,nombre_estudio,especialidad) values(";
    $sql.="'".$objetoEntidad['id_personal']."',"."'".$objetoEntidad['grado_escolaridad']."',"."'".$objetoEntidad['fecha_termino']."',";
    $sql.="'".$objetoEntidad['instituto']."',"."'".$objetoEntidad['descripcion_perfil_egreso']."',"."'".$objetoEntidad['cedula_profesional']."',";
    $sql.="'".$objetoEntidad['perfil']."',"."'".$objetoEntidad['documento_provatorio']."',"."'".$objetoEntidad['nombre_estudio']."',";
    $sql.="'".$objetoEntidad['especialidad']."')";
 
  
     

/*     $sql="SELECT id_personal, nombre, ap_paterno,ap_materno,estado,juzgado,p.municipio,p.colonia FROM personal_campo as d inner join personal as p using(id_personal)
                    inner join juzgado as j using(id_juzgado) where id_cargo =4";			
 */
    $lista=registro($sql);
//print_r($sql);
return $lista;
}
function listar_defensoresSisMat($sis, $mat){
    $sql="SELECT id_personal, nombre, ap_paterno,ap_materno,estado,juzgado,p.municipio,p.colonia FROM personal_campo as d
         inner join personal as p using(id_personal)
         inner join materia as ma using(id_materia)
                    inner join juzgado as j using(id_juzgado) where id_cargo =4
                        and ma.sistema='".$sis."' and ma.materia='".$mat."'";			

$lista=consulta($sql);
//print_r($sql.' sql sismat');
return $lista;
}
function listar_defensoresSisReg($sis, $reg){
    $sql="SELECT id_personal, nombre, ap_paterno,ap_materno,estado,juzgado,p.municipio,p.colonia FROM personal_campo as d
         inner join personal as p using(id_personal)
         inner join materia as ma using(id_materia)
                    inner join juzgado as j using(id_juzgado) where id_cargo =4
                        and ma.sistema='".$sis."' and j.region='".$reg."'";			

$lista=consulta($sql);
//print_r($sql);
return $lista;
}
function listar_defensoresSisRegMat($sis, $reg, $mat){
    $sql="SELECT id_personal, nombre, ap_paterno,ap_materno,estado,juzgado,p.municipio,p.colonia FROM personal_campo as d
         inner join personal as p using(id_personal)
         inner join materia as ma using(id_materia)
                    inner join juzgado as j using(id_juzgado) where id_cargo =4
                        and ma.sistema='".$sis."' and j.region='".$reg."' and ma.materia='".$mat."'";			

$lista=consulta($sql);
//print_r($sql);
return $lista;
}
function listar_defensoresRM($reg, $mat){
    $sql="SELECT id_personal, nombre, ap_paterno,ap_materno,estado,juzgado,p.municipio,p.colonia FROM personal_campo as d
         inner join personal as p using(id_personal)
         inner join materia as ma using(id_materia)
                    inner join juzgado as j using(id_juzgado) where id_cargo =4
                        and j.region='".$reg."' and ma.materia='".$mat."'";			

$lista=consulta($sql);
//print_r($sql);
return $lista;
}

function listar_defensoresMateria($mat){
    $sql="SELECT id_personal, nombre, ap_paterno,ap_materno,estado,juzgado,p.municipio,p.colonia FROM personal_campo as d 
            inner join personal as p using(id_personal)
            inner join materia as ma using(id_materia)
                    inner join juzgado as j using(id_juzgado) 

                    where id_cargo =4 and ma.materia='".$mat."'";			

$lista=consulta($sql);
//print_r($sql.' only materiass');
return $lista;
}
function listar_defensoresRegion($reg){
    $sql="SELECT id_personal, nombre, ap_paterno,ap_materno,estado,juzgado,p.municipio,p.colonia FROM personal_campo as d 
            inner join personal as p using(id_personal)
            inner join materia as ma using(id_materia)
                    inner join juzgado as j using(id_juzgado) 

                    where id_cargo =4 and j.region='".$reg."'";			

$lista=consulta($sql);
//print_r($sql);
return $lista;
}
function listar(){
    $sql="SELECT * FROM personal_campo as d inner join personal as p using(id_personal)
                        inner join juzgado as j using(id_juzgado) where p.id_cargo =4";			

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
/*

function numRegistros($sql){
    return registro($sql);
} */
function getNumExpedientes($id_defensor){
    $sql = 'SELECT * from expediente inner join personal_campo using(id_personal) where id_personal = "'.$id_defensor.'"';
    $lista = registro($sql);
    return $lista;
}
function getExpedientesById($id_defensor){
    $sql="select p.foto,p.nombre as nomDef, p.ap_paterno as appDef, p.ap_materno as apmDef, 
    p.calle as calleDef,p.numero_int as numDef, p.telefono as telDef, p.correo_electronico as emailDef,
    p.colonia as coloniaDef, p.municipio as muniDef,p.id_personal,
     e.num_expediente, m.materia,e.fecha_inicio, e.id_expediente,e.fecha_final,e.nombre_delito,
    e.tipo_delito,e.estado, e.motivos,e.observaciones
    from expediente as e inner join personal as p  using(id_personal)
    inner join personal_campo using(id_personal)
    inner join materia as m using(id_materia)
    where id_cargo=4 and id_personal='".$id_defensor."' ";    
        $lista = consulta($sql);
        return $lista;
}
function getDefensorById($id_defensor){
    $sql="SELECT d.id_personal,p.nombre,p.ap_paterno,p.ap_materno, p.municipio, p.colonia, p.calle,p.numero_int,p.numero_ext, p.genero,p.telefono,p.correo_electronico,p.curp,p.foto, nup,nue,juzgado,perfil,cedula_profesional FROM personal_campo as d inner join personal as p using(id_personal)
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
   //   global $conexion;
      $sql = "select * from personal_campo  INNER JOIN materia using(id_materia) where id_personal='".$id."'";
      $lista = consulta($sql);
   // echo $sql;
    return $lista;
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
    $sql="SELECT * FROM expediente inner join personal_campo using(id_personal) WHERE 
                    id_personal = '".$id_defensor."'";
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
  

function getDefensorPorMateria($materia){
    $sql="SELECT id_personal, nombre, ap_paterno, ap_materno FROM personal inner join personal_campo using(id_personal) WHERE 
    materia = '".$materia."'";
$lista=consulta($sql);//print_r( $lista);
return $lista;
}

function getDefensorPorJuzgado($id_personal){
    $sql="SELECT id_juzgado,id_personal,instancia,juzgado,region,municipio,calle,cp FROM personal_campo inner join juzgado using(id_juzgado) WHERE 
            id_personal = '".$id_personal."'";
$lista=consulta($sql);
//print_r( $lista);
return $lista;
}
    //Definimos la funciones sobre el objeto crear_defensor
    function crear_defensor($objetoEntidad){
       
        $sql = "INSERT INTO personal_campo ";        
        $sql.= "SET id_juzgado='".$objetoEntidad['id_juzgado']."', id_personal='".$objetoEntidad['id_personal']."',";
        $sql.= "id_materia='".$objetoEntidad['id_materia']."'"; 
      //  echo $sql;
         $lista=registro($sql);
   return $lista;
    }

    function actualizar_juzgado($id_juzgado,$id_defensor){
      
        $sql = "UPDATE personal_campo ";
        $sql.= " SET id_juzgado='".$id_juzgado."' where id_personal = ".$id_defensor;
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
        " where d.id_personal = '".$defensor['id_personal']."'";
        $lista=consulta($sql);
        //echo $defensor['id_defensor'].' => Ah sido actualizado';
        //print_r($sql);
        return $lista;
 }

    //Definimos una funcion que borrar defensor
    function eliminar_defensor($id_defensor){
        $newId= -1 * $id_defensor;
        $sql = "select id_expediente from  expediente inner join personal_campo 
                using (id_personal) 
                    where id_personal ='".$id_defensor."'
                    limit 1";
        $idExp = consulta($sql);
        $id_exp = $idExp[0]['id_expediente'];
        $sql = "select count(id_expediente) as num from  expediente inner join personal_campo 
        using (id_personal) 
            where id_personal ='".$id_defensor."'";
        $numExp = consulta($sql);
        $num_exp = $numExp[0]['num'];

        $sql = "insert into notificaciones (id_expediente, notificacion, fecha_registro) values('".$id_exp."', 'Existen ".$num_exp." expedientes que necesitan ser atendidos, ya!.','2018-06-11')";                                
        $insert = consulta($sql);


        $sql = "UPDATE personal_campo as d  inner join personal as p using (id_personal)
                set d.estado = false, d.id_personal ='".$newId."',p.id_personal ='".$newId."' where d.id_personal = '".$id_defensor."'";                                
        $listaExp = consulta($sql);
        return $listaExp;
    }


    function ultimoDefensorCreatado(){
      /*   $sql = mysql_query("SELECT MAX(id_defensor) AS id FROM defensor");
          $id=consulta($sql);
          
        return $id[0]['id'];  */

        $sql = "SELECT MAX(id_personal_campo) AS id FROM defensor";
        $id=consulta($sql);
        // print_r($id);
      return $id[0]['id']; 

    }


?>