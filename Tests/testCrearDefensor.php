<?php
use PHPUnit\Framework\TestCase;


class StackTest extends TestCase

{
    public function testPushAndPop()
    {
           $defensor = Array(
            "id_cargo"       =>4, 
            "nombre"         =>'juan',
            "apellido_paterno" =>'garcia',
            "ap_materno"     =>'lopez',
            "curp"           =>'CURP1234ABCD3214567',
            "nup"            =>'98783',
            "nue"            =>'89765',
            "genero"         =>'masculino',
            "telefono"       =>'9878787786',
            "email"         =>'juan@gmail.com',  
            "puesto"         =>'3',
            "adscripcion"     =>4,
            "password"       =>'holajuan'         
            
        );  
        $url='http://localhost/defensoriaPublica/controlador/defensor/registrar_Defensor.php';
  
  $postfields = http_build_query( $defensor);  
  $opts = array('http' =>  
     array(  
        'method'  => 'POST',  
        'header'  => 'Content-type: application/x-www-form-urlencoded',  
        'content' => $postfields,  
     )  
  );  
  $context  = stream_context_create($opts);  
  $result = file_get_contents($url, false, $context);  
  
$this->assertEquals(200,  intval($result));
     
    }
}
?>