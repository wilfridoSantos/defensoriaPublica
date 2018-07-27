<?php
    include_once('../../modelo/expediente.php');
    include_once('../../modelo/detalleContraparteExpediente.php');
    include_once('../../modelo/contraparte.php');
    include_once('../../modelo/personal.php');
    header('Content-Type: application/json');

//   $user = listar_preguntaConOpciones(9);
$id_expediente=$_GET['id_expediente'];
$id_personal=$_GET['id_personal'];
$respuestas = listar_x_idExpedienteAndDefensor($id_personal,$id_expediente);
$expediente = getExpedienteById($id_expediente);
   //echo $_GET['id_materia'];
   
$tarjeta = Array( );
$tarjeta['expediente']=$expediente;
$tarjeta['respuestas']=$respuestas;
$tarjeta['usuarioServicio']=usuarioServicio($id_expediente);
$tarjeta['usuarioContraparte']=contraparte($id_expediente);
$tarjeta['personal']=personal($id_personal);
//print_r(listar_UsuarioServicioByExpediente(9));

echo json_encode($tarjeta);


function personal($id_personal){
$personal = Array( );
    foreach (listar_personalById($id_personal) as $key => $value) {
        $personal['nombreCompleto']=$value['nombre']." ".$value['ap_paterno']." ".$value['ap_materno'];
    } 
    return $personal;
}
function usuarioServicio($id_expediente){
    $personales = Array( );
        foreach (listar_UsuarioServicioByExpediente($id_expediente) as $key => $value) {
            $personal = Array( );
    
            $personal['nombreCompleto']=$value['nombre']." ".$value['ap_paterno']." ".$value['ap_materno'];
            $personal['etnia']=$value['etnia'];
            $personal['idioma']=$value['idioma'];
            $personal['edad']=$value['edad'];
            $personales[$key]=$personal;
        } 
        return $personales;
    }

function contraparte($id_expediente){
    $personales = Array( );
      $contraparte=  getContrapartesById($id_expediente);
       if($contraparte!=0)
        foreach ($contraparte as $key => $value) {
            $personal = Array( );
    
            $personal['nombreCompleto']=$value['nombre']." ".$value['apellido_paterno']." ".$value['apellido_materno'];
            $personal['etnia']=$value['etnia'];
            $personal['idioma']=$value['idioma'];
            $personal['edad']=$value['edad'];
            $personales[$key]=$personal;    } 
        return $personales;
    }
    
?>