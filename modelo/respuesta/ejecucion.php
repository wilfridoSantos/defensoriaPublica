<?php

include_once('../../libreria/conexion.php');



    //Definimos la funciones sobre el objeto crear_asesoria
    function Registrar($asesoria){
        $sql = "INSERT INTO asesoria ";
        $sql.= "SET id_actividad='".$asesoria['id_actividad']."',";
        $sql.= " latitud='".$asesoria['latitud']."',   longitud='".$asesoria['longitud']."'";
        echo $sql;
     $lista=registro($sql);
     return $lista;
    }






?>
