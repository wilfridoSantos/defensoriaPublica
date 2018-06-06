<?php
include_once('../../modelo/expediente.php');
    $q = intval($_GET['q']);
    $q2 = strtoupper($_GET['q2']);

    if($q == "" && $q2 != ""){
        //por materia
        $lista_expedienteM = listar_expedientes_x_materia($q2);
        $encode = json_encode($lista_expedienteM);
        echo $encode;
    }else if($q != "" && $q2 == ""){
            //filtro por estado
            $lista_expedienteE = listar_expedientes_x_estado($q);
            $encode = json_encode($lista_expedienteE);
            echo $encode;
    }else if($q != "" && $q2 != ""){
            //filtro estado y materia
            $lista_expedienteEM = listar_expedientes_EM($q, $q2);
            $encode = json_encode($lista_expedienteEM);
            echo $encode;
    }

?>