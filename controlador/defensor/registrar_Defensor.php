<?php 
    header('Content-Type: application/json');
  include '../../modelo/personal.php';    
    include '../../modelo/defensor/defensor.php';
    
      $personal = Array(
           
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
     //  print_r(listar_personal());
     $mensaje=['tipo'=>"exito",
                'mensaje'=>"registro existoso"];
     $didigir="listar_defensor";
     if(listar_defensor_x_nue($_POST['nue'])==0){
        crear_personal($personal);
        $defensor=Array(
         "id_juzgado"=>$_POST['adscripcion'],
         "id_personal"=>ultimoPersonalCreatado()
        );
        crear_defensor($defensor);
      }
      else{

        $mensaje=['tipo'=>"error",
        'mensaje'=>"el personal  con el nue o nup ya se encuentra registrado"];
  
        $didigir="registrar_defensor";
      }
      //  ultimoPersonalCreatado();
 
        if(!isset($_GET['tipo'])){
         
           session_start();
            $_SESSION['mensaje'] = $mensaje;
         // include "../../vistas/usuarios/registrar.html";
       
            header("location: ../../vistas/coordinador/index.php?dirigir=".$didigir);
        }
        else{
            echo "json";
        }
    
?>