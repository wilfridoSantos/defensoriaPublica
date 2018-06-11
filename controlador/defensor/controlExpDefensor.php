<?php
include '../../modelo/defensor/defensor.php';
//echo $_GET['cedula'];
$id_def = $_GET['id_personal'];
$defensorX = getExpedientesById($id_def);
 $defensorZ = json_encode($defensorX);
echo $defensorZ;  
?>