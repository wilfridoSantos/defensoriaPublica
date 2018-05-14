<?php 
    include '../../modelo/defensor/defensor.php';
/*     $id_defensor = $_POST['id_personal'];
    $expedientes = getNumExpedientes($id_defensor); */
    
   if($_FILES['fileToUpload']['size'] != 0){
        $nombreFoto = $_FILES["fileToUpload"]["name"];
        $rutaFoto   = $_FILES["fileToUpload"]["tmp_name"];
        $carpeta='../../recursos/uploads/';
        
        if (!file_exists($carpeta)) {
                mkdir($carpeta, 0777, true);
        }
         
        $destino = $carpeta.basename($nombreFoto);
        move_uploaded_file($rutaFoto,$destino);
    }else{        
        $nombreFoto = $_POST['imagen'];
    }
        $defensor = Array(
                "id_personal"    =>$_POST['id_personal'],
                "nombre"         =>strtoupper($_POST['nombre']),
                "ap_paterno"     =>strtoupper($_POST['ap_paterno']),
                "ap_materno"     =>strtoupper($_POST['ap_materno']),
                "curp"           =>strtoupper($_POST['curp']),
                "calle"          =>strtoupper($_POST['calle']),
                "numero_ext"     =>$_POST['numero_ext'],    
                "numero_int"     =>$_POST['numero_int'],
                "colonia"        =>strtoupper($_POST['colonia']),
                "municipio"      =>strtoupper($_POST['municipio']),
                "telefono"       =>$_POST['telefono'],
                "correo_electronico" =>$_POST['correo_electronico'],
                "foto"          => $nombreFoto
            );        
        $actualizaDefensor = actualiza_defensor($defensor);
        $mensaje=['tipo'=>"exito",
        'mensaje'=>"Se ha actualizado satisfactoriamente"];
        $didigir="listar_defensor";
        //print_r($actualizaDefensor);      
        if(!isset($_GET['tipo'])){
           session_start();
           $_SESSION['mensaje'] = "Actualizacion exitoso";
          //return 200; // 
         header("location: ../../vistas/administrador/");
        }else{
           echo "json";
       }       
?>
