
<?php

include_once('RfcBuilder.php');
$builder = new RfcBuilder();
/* $rfc = $builder->name('eduardo')
        ->firstLastName('castañon')
        ->secondLastName('olguin')
        ->birthday(15, 04, 1968)
        ->build()
        ->toString();
     */
$rfc = $builder->name(isset($_GET['nombre']))
        ->firstLastName(isset($_GET['apellidoP']))
        ->secondLastName(isset($_GET['apellidoM']))
        ->birthday(isset($_GET['dia']), isset($_GET['mes']), isset($_GET['anno']))
        ->build()
        ->toString();
    
    
    
    
    echo $rfc;
    
?>