<?php
use PHPUnit\Framework\TestCase;


class StackTest extends TestCase

{
    public function testPushAndPop()
    {
           $defensor = Array(
            "id_defensor"    =>44,
            "nombre"         =>"pepes",
            "ap_paterno"     =>"lopez",
            "ap_materno"     =>'garcia',
            "curp"           =>'curp',
            "calle"          =>'',
            "numero_ext"     =>'221',    
            "numero_int"     =>'23',
            "colonia"        =>'oaxaca',
            "municipio"      =>'oaxaca',
            "nup"            =>'2334',
            "nue"            =>'234',
            "genero"         =>'masculino',
            "telefono"       =>'988767879',
            "corre_electronico" =>'f@gmail.com',                
            "cedula_profesional" =>'c3dul4Pr0f4io4L',
            "juzgado"         =>'wewe'
        );  
        $url='http://localhost/defensoriaPublica/controlador/defensor/controlActualizarDef.php';
  
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
  //echo $result;
$this->assertEquals(200,  intval($result));
     
    }
}





function post_request($url, $data_as_array , $optional_headers = null) {
    if (is_null($data_as_array)) {
        $data_as_array = array();
    }
    $data = http_build_query($data_as_array);
    $params = array('http' => array(
                'method' => 'POST',
                'content' => $data,
        ));
    if ($optional_headers !== null) {
        $params['http']['header'] = $optional_headers;
    }
    $ctx = stream_context_create($params);
    $fp = @fopen($url, 'rb', false, $ctx);
    if (!$fp) {
        throw new Exception("Problem with {$url}, {$php_errormsg}");
    }
    $response = @stream_get_contents($fp);
  echo $response;
    if ($response === false) {
        throw new Exception("Problem reading data from {$url}, {$php_errormsg}");
    }
    
    return $response;
 }
?>