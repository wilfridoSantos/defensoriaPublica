<?php 
    //header('Content-Type: application/json');
    include '../../modelo/defensor/defensor.php';

    
      $defensor = Array(
            "id_defensor"    =>$_POST['id_defensor'],
            "nombre"         =>$_POST['nombre'],
            "ap_paterno"     =>$_POST['ap_paterno'],
            "ap_materno"     =>$_POST['ap_materno'],
            "curp"           =>$_POST['curp'],
            "calle"          =>$_POST['calle'],
            "numero_ext"     =>$_POST['numero_ext'],    
            "numero_int"     =>$_POST['numero_int'],
            "colonia"        =>$_POST['colonia'],
            "municipio"      =>$_POST['municipio'],
            "nup"            =>$_POST['nup'],
            "nue"            =>$_POST['nue'],
            "genero"         =>$_POST['genero'],
            "telefono"       =>$_POST['telefono'],
            "corre_electronico" =>$_POST['corre_electronico'],                
            "cedula_profesional" =>$_POST['cedula_profesional'],
            "juzgado"         =>$_POST['juzgado']
        );
        print_r($defensor['id_defensor']);
        //print_r ($defensor);
        $actualizaDefensor = actualiza_defensor($defensor);
        //echo'<script language="javascript">window.location="../../vistas/coordinador/listarDefensores.php"</script>';
        
       
        if(!isset($_GET['tipo'])){
         
          session_start();
           $_SESSION['mensaje'] = "Actualizacion exitoso";
        // include "../../vistas/usuarios/registrar.html";
         //echo '<script> window.location="../../vistas/coordinador/listarDefensores.php?dirigir=actualizar_defensor"</script>';  
         // echo '<script>  $("#menuContainer").load("	listarDefensores.php");
          //</script>';
          header("location: ../../vistas/coordinador/index.php?dirigir='listar_defensor'");
       }
       else{
           echo "json";
       }
        ?>