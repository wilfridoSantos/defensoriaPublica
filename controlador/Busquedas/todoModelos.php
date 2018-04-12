<?php

include("../conexion.php");
$consulta = "select m.id_modelo,m.nombre_modelo,m.url,m.estatus, f.nombre_fraccionamiento from modelos
    m INNER JOIN fraccionamientos f on m.fraccionamiento = f.id_fraccionamiento
    where m.estatus=1";
$ejecutar_consulta = $conexion->query($consulta);
while ($registro = $ejecutar_consulta->fetch_assoc()) {
    $name = utf8_encode($registro['nombre_modelo']);
    $nombre = utf8_encode($registro['nombre_fraccionamiento']);
    $url = utf8_encode($registro['url']);
    echo '<label class="text-warning">'.$name.'-'.$nombre.'</label><br>';
    echo '<iframe allowfullscreen="" frameborder="0" height="326" marginheight="0" marginwidth="0" scrolling="no" '
    . 'src="'.$url.'" '
            . 'width="580">';
    echo '</iframe><br>';
    
}
$conexion->close();
