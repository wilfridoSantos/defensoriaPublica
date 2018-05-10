<?php
use PHPUnit\Framework\TestCase;

class StackTest extends TestCase

{
    public function testPushAndPop()
    {
         
        $defensor = Array(
            'id_defensor'   =>'54',
           
        );  
 $url='http://localhost/defensoriaPublica/controlador/defensor/controlDefensor.php';
  
  $postfields = http_build_query( $defensor); 
       $opts = array('http' =>  
       array(  
        'method'  => 'GET',  
        'header'  => 'Content-type: application/json',  
        'content' => $defensor, 
     )  
  );  
  $context  = stream_context_create($opts);  
  $result = file_get_contents($url, false, $context);  
 $this->assertEquals(200,  intval($result));
     
    }
}




?>