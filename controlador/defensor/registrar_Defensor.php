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
       crear_personal($personal);
      //  ultimoPersonalCreatado();
      $defensor=Array(
          "id_juzgado"=>$_POST['adscripcion'],
          "id_personal"=>ultimoPersonalCreatado()
      );
      crear_defensor($defensor);
        if(!isset($_GET['tipo'])){
         
           session_start();
            $_SESSION['mensaje'] = "registro exitoso";
         // include "../../vistas/usuarios/registrar.html";
       
            header("location: ../../vistas/coordinador/index.php?dirigir='registrar_defensor'");
        }
        else{
            echo "json";
        }
    
?>