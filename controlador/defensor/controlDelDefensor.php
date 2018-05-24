<?php 
    include '../../modelo/defensor/defensor.php';
    $id_defensor = $_GET['id_personal'];
    $eliminarDefensor = eliminar_defensor($id_defensor);
    $mensaje=['tipo'   =>"exito",
              'mensaje'=>"Se ha eliminado satisfactoriamente."];
              //$dirigir="listar_defensor";
    //print_r($actualizaDefensor);
    
    if(!isset($_GET['tipo'])){
        session_start();
        $_SESSION['mensaje'] = $mensaje;
        //$_SESSION['dirigir'] = $dirigir;
        //echo $eliminar_defensor;
       //return 200; // 
      //header("location: ../../vistas/administrador/");
      echo $eliminar_defensor;
     }else{
        echo "json";
    } 

     
?>
