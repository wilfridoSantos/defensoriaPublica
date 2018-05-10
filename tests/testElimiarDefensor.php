<?php
use PHPUnit\Framework\TestCase;

class StackTest extends TestCase

{
    public function testPushAndPop()
    {
           $defensor = Array(
            "id_defensor"    =>54 );  
        $url='http://localhost/defensoriaPublica/controlador/defensor/controlDelDefensor.php';
  
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
  echo $result;
$this->assertEquals(200,  intval($result));
     
    }
}




?>