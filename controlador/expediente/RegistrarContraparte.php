<?php 
  //  header('Content-Type: application/json');
    //include '../../modelo/personal.php';    
    include '../../modelo/contraparte.php';
    include '../../modelo/detalleContraparteExpediente.php';
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
                          
            "numero_int"     =>"",
            "numero_ext"     =>"",
            "colonia"        =>'',
           "municipio"      =>'',         
            "curp"           =>$_POST['curp'],
            "estado"           =>$_POST['estado'],
            "edad"            =>$edadNumero,
            "fecha_nacimiento" =>$_POST['fechaNacimiento'],
            "etnia"            =>$_POST['etnia'],
            "idioma"          =>$_POST['idioma'],         
             
            "genero"         =>$_POST['genero'],
            "sexo"         =>$_POST['sexo'],
            "discapacidad"         =>$_POST['discapacidad']
        );
      $detalle_contraparte=Array(
        'id_expediente'=> $_POST['id_expediente'],
        'id_contraparte'=>$_POST['id_contraparte'],
        'tipo_contraparte'=>$_POST['tipo_contraparte']
      );
      //print_r($usuario);
      //print_r($detalle_contraparte);
        $usuario =  array_map( "cadenaToMayuscula",$usuario);
       
        $mensaje=['tipo'=>"error",
        'mensaje'=>"este usuario ya se encuentra registrado en tu expediente"];
         $dirigir="";
       //sprint_r (getDefensorByCurp($_POST['curp']));
        if(getContraparteById($_POST['id_contraparte'])==0){
            crear_contraparte($usuario); //regresa 1 si regristro para validar tambien par validar si ya exite o res regisro correctamente
        //    alta_DetalleContraparte($detalle_contraparte);
        } 
        if(getDetalleByContraparteAndExpediente($_POST['id_contraparte'],$_POST['id_expediente'])==0){
              alta_DetalleContraparte($detalle_contraparte);
                  $mensaje=['tipo'=>"exito",
                    'mensaje'=>"registro existoso"
                  ];
      } 
     //print_r($usuario);

         if(!isset($_GET['tipo'])){
           session_start();
            print_r(json_encode($mensaje));
            //$_SESSION['dirigir']=$dirigir;
       //   header("location: ../../vistas/defensor/index.php");
        }
        else{
            echo "json";
        } 
    
      
      
?>