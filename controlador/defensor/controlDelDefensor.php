<?php 
    //header('Content-Type: application/json');
    include '../../modelo/defensor/defensor.php';
        $id_defensor = $_GET['id_defensor'];
        //print_r($id_defensor);
        
        $eliminarDefensor = eliminar_defensor($id_defensor);
        //print_r ($eliminarDefensor);
        $listar = listar_defensores();
        //echo'<script language="javascript">window.location="../../vistas/coordinador/listarDefensores.php"</script>';
        if(!isset($_GET['tipo'])){
         
          session_start();
           $_SESSION['mensaje'] = "Se ha eliminado defensor exitosamente";
        // include "../../vistas/usuarios/registrar.html";
         //echo '<script> window.location="../../vistas/coordinador/listarDefensores.php?dirigir=actualizar_defensor"</script>';  
         // echo '<script>  $("#menuContainer").load("	listarDefensores.php");
          //</script>';
         // header("location: ../../vistas/coordinador/index.php?dirigir='listar_defensor'");
        echo $eliminarDefensor;
      //  echo 200;
       }
       else{
           echo "json";
       }
        ?>