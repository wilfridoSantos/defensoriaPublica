<?php 
    header('Content-Type: application/json');
    include_once ('../../modelo/actividad.php');
    include_once('../../modelo/usuarioServicio.php');
    include_once('../../modelo/asesoria.php');
    include_once('../../modelo/visita.php');
    include_once('../../modelo/audiencia.php');
   
    $usuario_servicio=getUsuarioByCurp($_POST['curp'])[0]['id_usuario_servicio'];
    $dia_registro=split('[/.-]', $_POST['fechaRegistro'])[2];
    $mes_registro=split('[/.-]', $_POST['fechaRegistro'])[1];
    $anio_registro=split('[/.-]', $_POST['fechaRegistro'])[0];
    $actividad = Array(
           
            "id_personal_campo"         =>$_POST['id_personal'],
            "fecha_registro"           =>$_POST['fechaRegistro'],
            "id_usuario_servicio"      =>$usuario_servicio,
            "observacion"              =>$_POST['resultado']
           
     );
      $mensaje=['tipo'=>"error",
        'mensaje'=>"no existe el usuario con dicho curp"];
      $dirigir="registrar_usario";
        
     if($usuario_servicio)
     {  
      
        crear_actividad($actividad);
     // if($_POST["actividad"]=="asesoria"||$_POST["actividad"]=="visita"){
        $id_actividadRegistrado=ultimoActividadRegistrado();
       // echo "ACTIVIDAD". $id_actividadRegistrado;
  //     $ubicacion=" ";
//       if(isset($_POST['ubicacion']))
        $ubicacion=split(',',$_POST['ubicacion']);
       
        //print_r($ubicacion);
        $la=(count($ubicacion)==2)?$ubicacion[0]:"";
        $long=(count($ubicacion)==2)?$ubicacion[1]:"";
        // EN CASO DE QUE ES VISITAS Y CARGA EL COMPROBANTE(FOTO)
        $nombreFoto="";
       // echo "Error: " . $_FILES['archivo']['error'] ;
        //echo "comprabante es =>".$_FILES["archivo"]["name"];
        if(isset($_FILES['archivo']))   

            if ($_FILES['archivo']["error"] > 0)
            {
           // echo "Error: " . $_FILES['archivo']['error'] . "<br>";
            $mensaje=['tipo'=>"error",
            'mensaje'=>$_FILES['archivo']['error']];
            $dirigir="registrar_actividad";
        
            }

            if($_FILES['archivo']['size'] != 0){
                $nombreFoto = $_FILES["archivo"]["name"];
                $rutaFoto   = $_FILES["archivo"]["tmp_name"];
                $carpeta='../../recursos/archivo/vistas';
                
                if (!file_exists($carpeta)) {
                        mkdir($carpeta, 0777, true);
                }
                
                $destino = $carpeta.basename($nombreFoto);
                move_uploaded_file($rutaFoto,$destino);
            }
        $actividadRealizada = Array(
           
            "id_actividad"          =>$id_actividadRegistrado,
            "latitud"       =>$la,
            "longitud"       =>$long,
            "foto"       =>$nombreFoto
           
        );
     //   echo $_POST["actividad"];
        if($_POST["actividad"]=="asesoria")
           crear_asesoria($actividadRealizada);

        if($_POST["actividad"]=="visita")
          crear_visita($actividadRealizada);

        if($_POST["actividad"]=="audiencia")
           crear_audiencia($actividadRealizada);
           
       print_r($actividadRealizada);
       $mensaje=['tipo'=>"exito",
       'mensaje'=>"Registro exitoso"];
       $dirigir="registrar_actividad";
    }
    
    //////// CUANDO ES EJECUCION DE SANCIONES SE DEBE DE REGISTRAR LA FECHA EN QUE SE CREO EL EXPEDIENTE
    /* $mensaje=['tipo'=>"error",
    'mensaje'=>"expediente ya existe"];
    $dirigir="asignar_defensor";
    if((listar_x_num_expediente_($expediente['num_expediente'])==0)||($expediente['num_expediente']=="")){
       echo "entro valido expediente".$expediente['num_expediente'];
        if(listar_expedienteByPersonalAndMateria($expediente['id_usuario_servicio'],$expediente['materia'])==0)
        {   echo "entro valido personal materia";
            alta_expediente($expediente);
    
        $mensaje=['tipo'=>"exito",
                'mensaje'=>"registro existoso"];
        $dirigir="listar_Expediente";
        }
        else{
            $mensaje=['tipo'=>"error",
            'mensaje'=>"el usuario ya cuenta con un defensor del mismo problema"];
            $dirigir="asignar_defensor";
        }
    } */
    

if(isset($_GET['tipo'])){
        
    if($_GET['tipo']=="html"){

        session_start();
   //     echo "solo ver";
         $_SESSION['mensaje'] = $mensaje;
         //$_SESSION['dirigir'] = $dirigir;
        // echo $mensaje['mensaje'];
      header("location: ../../vistas/defensor/index.php");
     }
     else{
          header('Content-Type: application/json');
         echo "json";
     }
    }
      
     
      
?>