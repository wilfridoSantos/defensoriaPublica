<?php
use PHPUnit\Framework\TestCase;

class StackTest extends TestCase

{
    public function testPushAndPop()
    {
         
        $url='http://localhost/defensoriaPublica/controlador/defensor/controladorListaDef.php';
  
       $opts = array('http' =>  
     array(  
        'method'  => 'GET',  
        'header'  => 'Content-type: application/x-www-form-urlencoded',  
     
     )  
  );  
  $context  = stream_context_create($opts);  
  $result = file_get_contents($url, false, $context);  
 // echo $result;
$this->assertEquals(200,  intval($result));
     
    }
}




?>