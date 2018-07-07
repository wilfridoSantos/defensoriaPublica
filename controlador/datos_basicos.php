<?php
include_once("../libreria/conexion.php");
 /* function datosBasico($nue){
    $sql='select id_personal,nombre,ap_paterno,ap_materno,curp,nup,nue,foto,materia,sistema,instancia 
           from personal inner join personal_campo using(id_personal) 
        inner join materia using(id_materia) where nue ='.$nue;
    return consulta($sql);
} */
function datosBasico($user){
    $sql='select id_personal,nue,nup,materia,sistema,instancia,id_materia 
           from personal inner join personal_campo using(id_personal) 
        inner join materia using(id_materia) where id_personal ='.$user;
    return consulta($sql);
}
   
$datos=datosBasico($_GET['personal']);
echo json_encode($datos);
?>