<?php

include '../conexion.php';
$valor = $_POST["valor"];
$x = $_POST["x"];
$y = $_POST["y"];
$mzn = $_POST["mzn"];
$lote = $_POST["lote"];
$num = $_POST["num"];
$edificio = $_POST["edificio"];
$calle = $_POST["calle"];
$costo = $_POST["costo"];
$iddepto = $_POST["id_depto"];
if ($iddepto == "0") {
    $sql = "INSERT INTO departamentos "
            . "(id_fraccionamiento,calle,numero,edificio,lote,manzana,costo_departamento,posx,posy) VALUES "
            . "('$valor','$calle','$num','$edificio','$lote','$mzn','$costo','$x','$y' )";
    $ejecutar_consulta = $conexion->query(utf8_decode($sql));
    if ($ejecutar_consulta) {
        echo '<p  class="text-success" ><strong>se agrego el departamento</strong></p>';
    } else {
        echo '<p  class="text-danger" ><strong>Error</strong></p>';
    }
}else{
    $sql = "UPDATE departamentos set calle = '$calle', numero ='$num',edificio='$edificio',"
            . "lote ='$lote',manzana='$mzn',costo_departamento='$costo' where id_departamento= '$iddepto'";
    $ejecutar_consulta = $conexion->query(utf8_decode($sql));
    if ($ejecutar_consulta) {
        echo '<p  class="text-success" ><strong>se actualizo el departamento</strong></p>';
    }else{
        echo '<p  class="text-danger" ><strong>Error</strong></p>';
    }
}

/* 
<?php
form.append("x", x.val());
            form.append("y", y.val());
            form.append("mzn", mzn.val());
            form.append("lote", lote.val());
            form.append("num", num.val());
            form.append("edificio", edificio.val());
            form.append("calle", calle.val());
            form.append("costo", costo.val());
            form.append("valor",getParameterByName('id'));
include '../conexion.php';
$valor = $_POST["valor"];
$radio = $_POST["radio"];
$ancho = $_POST["ancho"];
$alto = $_POST["alto"];
$fuente = $_POST["fuente"];
$borde = $_POST["border"];

$sql = "SELECT * FROM componente_fraccinamiento where id_fraccionamiento ='$valor'";
$ejecutar_consulta = $conexion->query(utf8_encode($sql));
$num_regs = $ejecutar_consulta->num_rows;
if ($num_regs == 0) {
   $sql = "INSERT INTO componente_fraccinamiento "
            . "(id_fraccionamiento,radio,border,ancho,alto,tam_fuente) VALUES "
            . "('$valor','$radio','$borde','$ancho','$alto','$fuente' )";
    $ejecutar_consulta = $conexion->query(utf8_decode($sql));
    if ($ejecutar_consulta) {
        echo '<p  class="text-success" ><strong>se agrego el componente</strong></p>';
    }else{
        echo '<p  class="text-danger" ><strong>Error</strong></p>';
    }
} else {
    $registro = $ejecutar_consulta->fetch_assoc();
    $idcomponente = utf8_encode($registro["id_componente"]);
    $sql = "UPDATE componente_fraccinamiento set radio='$radio', border = '$borde',"
            . "ancho ='$ancho',alto='$alto',tam_fuente='$fuente' where id_componente= '$idcomponente'";
    $ejecutar_consulta = $conexion->query(utf8_decode($sql));
    if ($ejecutar_consulta) {
        echo '<p  class="text-success" ><strong>se actualizo el componente</strong></p>';
    }else{
        echo '<p  class="text-danger" ><strong>Error</strong></p>';
    }
}

 */

