<?php 
    header('Content-Type: application/json');
    include '../../modelo/personal.php';    
    include '../../modelo/contraparte.php';
    include '../../libreria/herramientas.php';

    $hoy = getdate();
      $edadNumero=$hoy['year']-intval($_POST['fechaNacimiento']);

      $usuario = Array(
           
            "id_contraparte" =>$_POST['id_contraparte'],
            "nombre"         =>$_POST['nombre'],
            "ap_paterno"     =>$_POST['apellido_paterno'],
            "ap_materno"     =>$_POST['apellido_materno'],
            "telefono"       =>$_POST['telefono'],
            "correo"         =>$_POST['email'],                
            "calle"          =>$_POST['calle'],
            "numero_ext"     =>$_POST['numero'],               
            "numero_int"     =>"",
            "colonia"        =>$_POST['colonia'],
            "municipio"      =>$_POST['municipio'],         
            "curp"           =>$_POST['curp'],
            "estado"           =>$_POST['estado'],
            "edad"            =>$edadNumero,
            "etnia"            =>$_POST['etnia'],
            "idioma"          =>$_POST['idioma'],         
            "fecha"          =>"",         
            "genero"         =>$_POST['genero'],
            "sexo"         =>$_POST['sexo']
        );
      $detalle_contraparte=Array(
        $id_expediente=>$_POST['id_expediente'],
        $id_contraparte=>$_POST['id_contraparte']
      );
      print_r($usuario);
      print_r($detalle_contraparte);
        $usuario =  array_map( "cadenaToMayuscula",$usuario);
        $mensaje=['tipo'=>"error",
        'mensaje'=>"este usuario ya se encuentra registrado"];
         $dirigir="registrar_usuario";
       //sprint_r (getDefensorByCurp($_POST['curp']));
        if(getUsuarioByCurp($_POST['curp'])==0){
            //crear_contraparte($usuario); //regresa 1 si regristro para validar tambien par validar si ya exite o res regisro correctamente
            $mensaje=['tipo'=>"exito",
                      'mensaje'=>"registro existoso"
                    ];
            $dirigir="asignar_defensor";
        } 
     //print_r($usuario);

        if(!isset($_GET['tipo'])){
           session_start();
            $_SESSION['mensaje'] = $mensaje;
            $_SESSION['dirigir']=$dirigir;
          header("location: ../../vistas/defensor/index.php");
        }
        else{
            echo "json";
        }
    
      
     
      function vericar_coordinador($puesto){
        if($puesto=='2')
           $verificador=listar_defensor_x_juzgado($_POST['adscripcion']);
            if($verificador==0)
               return false;
            
          return true;     
      }  
?>