<?php 
    header('Content-Type: application/json');
  include '../../modelo/personal.php';    
    include '../../modelo/defensor/defensor.php';
    include '../../modelo/usuario_sistema.php';
    include '../../libreria/herramientas.php';
      $personal = Array(
            "id_cargo"       =>$_POST['puesto'], 
            "nombre"         =>$_POST['nombre'],
            "ap_paterno"     =>$_POST['apellido_paterno'],
            "ap_materno"     =>$_POST['apellido_materno'],
            "curp"           =>$_POST['curp'],
            "calle"          =>"",
            "numero_ext"     =>"",                
            "numero_int"     =>" ",
            "colonia"        =>"",
            "municipio"      =>"",
            "nup"            =>$_POST['nup'],
            "nue"            =>$_POST['nue'],
            "genero"         =>$_POST['genero'],
            "telefono"       =>$_POST['telefono'],
            "correo"         =>$_POST['email'],                
            "foto"          =>" "           
        );

      // crear_juzgado($juzgado);
       // echo isset($_GET['tipo']);
    //  print_r($personal);
    $personal =  array_map( "cadenaToMayuscula",$personal);
       
     if(listar_defensor_x_nue($_POST['nue'])==0){ 
      $mensaje=['tipo'=>"juzgado",
      'mensaje'=>"no puedes tener mas de 1 coordinaodr en un juzgado"];
      $didigir="registrar_defensor";
      if(!vericar_coordinador($_POST['puesto'])){        
        crear_personal($personal);
        $defensor=Array(
          "id_juzgado"=>$_POST['adscripcion'],
          "id_personal"=>ultimoPersonalCreatado()
        );
        crear_defensor($defensor);
        $personal['username']=$_POST['nue'];
        $personal['password']=encriptar($_POST['password']);
        crear_usarioSistema($personal);
        $mensaje=['tipo'=>"exito",
        'mensaje'=>"registro existoso"];
        
        $didigir="listar_defensor";
        $asunto = "Envio de Nip Acceso Al Sistemas ";
        $mensaje = " accede a la siguiente pagina http://localhost/defensoriaPublica/  con tu contraseña: ".$_POST['password'];
                     
       envio_correo($personal['correo'], $asunto, $mensaje);
       }
      }
      else{
        $mensaje=['tipo'=>"error",
        'mensaje'=>"el personal  con el  nup ya se encuentra registrado"];  
        $didigir="registrar_defensor";
      }
      //  ultimoPersonalCreatado(); 
        if(!isset($_GET['tipo'])){
           session_start();
            $_SESSION['mensaje'] = $mensaje;
           header("location: ../../vistas/administrador/index.php?dirigir=".$didigir);
        }
        else{
            echo "json";        }
    
      
     
      function vericar_coordinador($puesto){
      //  print_r (listar_defensor_x_juzgado($_POST['adscripcion']));
        if($puesto=='2') 
            if(listar_defensor_x_juzgado($_POST['adscripcion']))
               return true;
            
          return false;     
      }  
?>