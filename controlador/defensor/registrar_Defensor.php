<?php 
    header('Content-Type: application/json');
  include '../../modelo/personal.php';    
    include '../../modelo/defensor/defensor.php';
    include '../../modelo/usuario_sistema.php';
    include '../../libreria/herramientas.php';
    include '../../modelo/materia.php';
///verifica si el puesto es de defensor
    $materia=($_POST["puesto"]==2)?"coordinador":$_POST["materia"];
//echo $_POST["materia"];  
//echo $_POST["instancia"];  
//echo $_POST["nue"];  
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
            "rfc"            =>$_POST['rfc'],
           "genero"         =>$_POST['genero'],
            "telefono"       =>$_POST['telefono'],
            "correo"         =>$_POST['email'],                
            "foto"          =>" "           
        );

      // crear_juzgado($juzgado);
       // echo isset($_GET['tipo']);
     print_r($personal);
    $personal =  array_map( "cadenaToMayuscula",$personal);/// convierte todo a mayusculas
       
     if(listar_defensor_x_nue($_POST['nue'])==0){ 
      $mensaje=['tipo'=>"juzgado",
      'mensaje'=>"no puedes tener mas de 1 coordinaodr en un juzgado"];
      $didigir="registrar_defensor";
      if(!vericar_coordinador($_POST['puesto'])){        
        crear_personal($personal);
        $id_materia= get_materia_instancia_sistema($_POST["materia"],$_POST["instancia"],$_POST["sistema"]);
       //  print_r($id_materia);
        $defensor=Array(
          "id_juzgado"=>$_POST['adscripcion'],
          "id_materia"        =>$id_materia[0]['id_materia'],          
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
        $email = " accede a la siguiente pagina http://localhost/defensoriaPublica/  con tu contraseña: ".$_POST['password'];
                     
       envio_correo($personal['correo'], $asunto, $email);
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
            $_SESSION['dirigir']=$didigir;

         header("location: ../../vistas/administrador/index.php");
        }
        else{
            echo "json";  
        }

      function vericar_coordinador($puesto){
      //  print_r (listar_defensor_x_juzgado($_POST['adscripcion']));
        if($puesto=='2') 
            if(listar_defensor_x_juzgado($_POST['adscripcion']))
               return true;
            
          return false;     
      }  
?>