<?php
use PHPUnit\Framework\TestCase;


class StackTest extends TestCase

{
    public function testPushAndPop()
    {
           $defensor = Array(
            "adscripcion"       =>6, 
            "nue"         =>'32122'                  
            
        );  
 $url='http://localhost/defensoriaPublica/controlador/juzgado/actividad_juzgado.php';
  
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