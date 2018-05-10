<?php

define('BD_SERVIDOR', '127.0.0.1');
define('BD_NOMBRE', 'bddefensoria');
define('BD_USUARIO', 'root');
define('BD_PASSWORD', '');

$db = new PDO("mysql:host=".BD_SERVIDOR.";dbname=".BD_NOMBRE.";charset=utf8",BD_USUARIO,BD_PASSWORD);


function consulta($consulta){
  global $db;
  $sql = $db->prepare($consulta);
  $sql->execute();  
  if($sql->rowCount()==0)
     return 0;
  
  if($sql->rowCount()>0)
    //$datos = $sql->fetchAll(PDO::FETCH_ASSOC);
    return  $sql->fetchAll(PDO::FETCH_ASSOC);
  //return $datos;
}

function consulta_obj($consulta){
  global $db;
  $sql = $db->prepare($consulta);
  $sql->execute();  
  if($sql->rowCount()==0)
     return 0;
  
  if($sql->rowCount()>0)
    //$datos = $sql->fetchAll(PDO::FETCH_ASSOC);
    return  $sql->fetchAll(PDO::FETCH_ARRAY);
  //return $datos;
}
 
 function registro($consulta){
   global $db;
   $sql=$db->prepare($consulta);
   $sql->execute();
    
    return $sql->rowCount();
 }
?>
