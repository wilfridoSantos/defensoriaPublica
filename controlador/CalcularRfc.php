
<?php

include_once('../libreria/rfc/RfcBuilder.php');
$builder = new RfcBuilder();
 /* $rfc = $builder->name('eduardo')
        ->firstLastName('castañon')
        ->secondLastName('olguin')
        ->birthday(15, 04, 1968)
        ->build()
        ->toString();
  */    


 $rfc = $builder->name($_GET['nombre'])
        ->firstLastName($_GET['apellidoP'])
        ->secondLastName($_GET['apellidoM'])
        ->birthday($_GET['dia'],$_GET['mes'], $_GET['anno'])
        ->build()
        ->toString();
    
     
    
    
    echo trim ($rfc, " \t\n\r\0\x0B"  );
    
?>