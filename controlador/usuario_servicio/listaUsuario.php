<?php 
    include_once('../../modelo/usuarioServicio.php');
    include_once('../../modelo/expediente.php');
    
    if(isset($_GET['id_usuario_servicio'])){
        $listaUser = listar_usuarios_id($_GET['id_usuario_servicio']);
        $contenido = json_encode($listaUser);
        echo $contenido;
    }

    if(isset($_GET['id_expediente'])){///muestro los usuario que tiene cada expedientes
        $listaUser = listar_UsuarioServicioByExpediente($_GET['id_expediente']);
        $contenido = json_encode($listaUser);
        echo $contenido;
    }
    if(isset($_GET['term'])){//muestro todo los usuario para las busquedas del defensor
     //   header('Content-type: application/json');
        echo  json_encode(listar_usuarios());
       //$var= '[ {"nombre":"juan","value":"pedro"},{"nombre":"juanito","value
         //   ":"pedros"}]';
   //    $var= '[ { "label": "Choice1", "value": "value1" },{ "label": "Choice2", "value": "value2" } ]';
      // $var= '[ "juan","pedro","juanito","lopez"]';
               //echo $var;
//          print_r();
    }
    
?>