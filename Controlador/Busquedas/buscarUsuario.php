<?php

$usuario = $_POST["valor"];
$rol = $_POST['rol'];

include('../conexion.php');
include('../encriptador.php');
$consulta = "select * from usuario where nom_usu = '$usuario'";
$ejecutar_consulta = $conexion->query($consulta);
$registro = $ejecutar_consulta->fetch_assoc();
$datos = "";
echo '<legend>Datos generales</legend>';
echo '<div class="form-group">';
echo '<label class="control-label col-xs-3">Nombre(s):</label>';
echo '<div class="col-xs-7">';
echo '<input value="' . utf8_encode($registro["nombres_usu"])
 . '"  id="nombre" onkeypress="return soloLetras(event);"'
 . ' onKeyUp="this.value = this.value.toUpperCase();"'
 . ' type="text" class="form-control " placeholder="Nombre(s)">';
echo '</div>';
echo '</div>';
echo '<div class = "form-group">';
echo '<label class = "control-label col-xs-3">Apellido Paterno:</label>';
echo '<div class = "col-xs-7">';
echo '<input value="' . utf8_encode($registro["ape_paterno_usu"])
 . '"  id = "apellidoPat" onkeypress = "return soloLetras(event);" '
 . 'onKeyUp = "this.value = this.value.toUpperCase();" type = "text"'
 . ' class = "form-control" placeholder = "Apellido Paterno">';
echo '</div>';
echo '</div>';
echo '<div class = "form-group">';
echo '<label class = "control-label col-xs-3">Apellido Materno:</label>';
echo '<div class = "col-xs-7">';
echo '<input value="' . utf8_encode($registro["ape_materno_usu"])
 . '"  id = "apellidoMat" onkeypress = "return soloLetras(event);"'
 . ' onKeyUp = "this.value = this.value.toUpperCase();"'
 . ' type = "text" class = "form-control" '
 . 'placeholder = "Apellido Materno">';
echo '</div>';
echo '</div>';
echo '<div class = "form-group">';
echo '<label class = "control-label col-xs-3">Nombre de Usuario:</label>';
echo '<div class = "col-xs-7">';
echo '<input value="' . utf8_encode($registro["nom_usu"])
 . '" readonly = "" id = "usuario" '
 . 'onkeypress = "return sinCaracteres(event);" '
 . 'type = "text" class = "form-control" id = "nomUsuario" '
 . 'placeholder = "Nombre de Usuario">';
echo '</div>';
echo '</div>';
echo '<div class="form-group">';
echo '<label class="control-label col-xs-3">Password:</label>';
echo '<div class="col-xs-7">';
echo '<input value="' . utf8_encode(desencriptar($registro["password"]))
 . '" id="password" type="password" class="form-control"  '
 . 'placeholder="Password">';
echo '</div>';
echo '</div>';
$sql;
if ($rol == "3") {
    $sql = "SELECT * FROM perfil where id_perfil !='4' ORDER BY tipo_perfil";
} else {
    $sql = "SELECT * FROM perfil where id_perfil ='1' ORDER BY tipo_perfil";
}

$ejec_consul = $conexion->query($sql);
echo '<div class = "form-group">';
echo '<label class = "control-label col-xs-3">Cargo:</label>';
echo '<div class = "col-xs-7" id = "cargo">';
echo '<select id="cargo_slc" class="form-control" name="cargo_slc" ">';
while ($reg = $ejec_consul->fetch_assoc()) {
    $idSucursal = utf8_encode($reg["id_perfil"]);
    $perfil = utf8_encode($reg["tipo_perfil"]);
    if ($idSucursal == utf8_encode($registro['id_perfil'])) {
        echo '<option selected value="' . $idSucursal . '">'
        . $perfil . '</option>';
    } else {
        echo '<option value="' . $idSucursal . '">'
        . $perfil . '</option>';
    }
}
echo '</select>';
echo '</div>';
echo '</div>';


echo '<div class = "form-group">';
echo '<label class = "control-label col-xs-3">Sucursal:</label>';
echo '<div class = "col-xs-7" id = "sucursal">';
$sql2 = "SELECT * FROM sucursales where estatus = 1 ORDER BY nombre_suc";
$eject2 = $conexion->query($sql2);
echo '<select id="sucursal_slc" class="form-control" name="sucursal_slc" >';
while ($reg2 = $eject2->fetch_assoc()) {
    $idSucursal = utf8_encode($reg2["id_sucursal"]);
    $sucursal = utf8_encode($reg2["nombre_suc"]);
    if ($idSucursal == utf8_encode($registro['id_sucursal'])) {
        echo '<option selected value="' . $idSucursal . '">'
        . $sucursal . '</option>';
    } else {
        echo '<option value="' . $idSucursal . '">' . $sucursal . '</option>';
    }
}
echo '</select>';
echo '</div>';
echo '</div>';

echo '<div class="form-group">';
echo '<label class="control-label col-xs-3">Fotografía:</label>';
echo '<div class="col-xs-7">';
echo '<button type="button" class="btn btn-primary btn-lg" '
 . 'data-toggle="modal" data-target="#miModal">';
echo 'Ver foto';
echo '</button>';
echo '</div>';
echo '<div class="modal fade" id="miModal" tabindex="-1" role="dialog"'
 . ' aria-labelledby="myModalLabel" aria-hidden="true">';
echo '<div class="modal-header">';
echo '<br><br><br>';
echo '<div class="row col-md-4 col-md-offset-4">';
echo '<img  border="1px"  name="" class="c col-xs-12 " alt="" id="imagenUser" '
 . 'src="' . utf8_encode($registro["foto"]) . '"  >';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '<legend>Datos de contacto</legend>';
echo '<div class="form-group">';
echo '<label class="control-label col-xs-3">Email:</label>';
echo '<div class="col-xs-7">';
echo '<input value="' . utf8_encode($registro["correo_usu"]) . '" id="email" '
 . ' type="email" class="form-control"  placeholder="Email">';
echo '</div>';
echo '</div>';
echo '<div class="form-group">';
echo '<label class="control-label col-xs-3" >Telefono:</label>';
echo '<div class="col-xs-7">';
echo '<input value="' . utf8_encode($registro["telefono_usu"])
 . '"  id="telefono" onkeypress="return soloNumeros(event);" '
 . ' maxlength="10" type="tel" class="form-control" placeholder="Telefono">';
echo '</div>';
echo '</div>';
echo '<legend>Domicilio</legend>';
echo '<div class="form-group">';
echo '<label class="control-label col-xs-3" >calle:</label>';
echo '<div class="col-xs-7">';
echo '<input value="' . utf8_encode($registro["calle_domicilio_usu"])
 . '"   id="calle" type="text" class="form-control" placeholder="Calle">';
echo '</div>';
echo '</div>';
echo '<div class="form-group">';
echo '<label class="control-label col-xs-3" >Número:</label>';
echo '<div class="col-xs-7">';
echo '<input value="' . utf8_encode($registro["numero_domicilio_usu"])
 . '"  id="numero" onkeypress="return soloNumeros(event);"  '
 . 'type="text" class="form-control" placeholder="Numero">';
echo '</div>';
echo '</div>';
echo '<div class="form-group">';
echo '<label class="control-label col-xs-3" >Código Postal:</label>';
echo '<div class="col-xs-7">';
echo '<input value="' . utf8_encode($registro["cp_domicilio_usu"])
 . '"  onkeypress="return soloNumeros(event);" maxlength="5" '
 . 'onkeyup="obtenerColonias()" id="cp" type="text" '
 . 'class="form-control" placeholder="Código Postal">';
echo '</div>';
echo '</div>';

echo '<div class="form-group">';
echo '<label class="control-label col-xs-3" >Colonia:</label>';
echo '<div class="col-xs-7">';
echo '<select class="form-control" id="colonias" name="colonia_slc">';
echo '<option>' . utf8_encode($registro["colonia_domicilio_usu"])
        . '</option>';
echo '</select>';
echo '</div>';
echo '</div>';
echo '<script>';
echo 'obtenerColonias();';
echo '</script>';
echo '<div class="form-group">';
echo '<label class="control-label col-xs-3" >Municipio:</label>';
echo '<div class="col-xs-7">';
echo '<input disabled="" id="municipio"  type="text"'
. ' class="form-control" placeholder="Municipio">';
echo '</div>';
echo '</div>';
echo '<div class="form-group">';
echo '<label class="control-label col-xs-3" >Estado:</label>';
echo '<div class="col-xs-7">';
echo '<input disabled="" id="estado"  type="text" '
. 'class="form-control" placeholder="Estado">';
echo '</div>';
echo '</div>';
$conexion->close();

