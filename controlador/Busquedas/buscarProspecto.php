<?php

$usuario = $_POST["valor"];
include('../conexion.php');
$sql = "select * from prospeccion where curp ='$usuario'";
$ejecutar_consulta = $conexion->query($sql);
$registro = $ejecutar_consulta->fetch_assoc();
echo '<div class="container-flat-form">';
echo '<legend>Datos generales</legend>';
echo '<div class="form-group">
     <label class="control-label col-xs-3">Nombre(s):</label>
     <div class="col-xs-7">
     <input value=' . utf8_encode($registro["nombres"]) . ' name="nombrep" id="nombrepe"  onkeypress="return soloLetras(event)" onKeyUp="this.value = this.value.toUpperCase();" type="text" class="form-control " placeholder="Nombre(s)">
     </div>
     </div>';
echo '<div class="form-group">
     <label class="control-label col-xs-3">Apellido Paterno:</label>
     <div class="col-xs-7">
     <input value=' . utf8_encode($registro["apellido_paterno"]) . ' name="apellidoPatp" id="apellidoPatpe"  onkeypress="return soloLetras(event);" onKeyUp="this.value = this.value.toUpperCase();"  type="text" class="form-control "  placeholder="Apellido Paterno">
     </div>
     </div>';
echo '<div class="form-group">
     <label class="control-label col-xs-3">Apellido Materno:</label>
     <div class="col-xs-7">
     <input  value=' . utf8_encode($registro["apellido_materno"]) . ' name="apellidoMatp" id="apellidoMatpe"  onkeypress="return soloLetras(event);" onKeyUp="this.value = this.value.toUpperCase();" type="text" class="form-control"  placeholder="Apellido Materno">
     </div>
     </div>';
$h = '';
$m = '';
if (utf8_encode($registro["sexo"]) == "M") {
    $h = 'checked';
} else {
    $m = 'checked';
}
echo '<div class="form-group">
     <label class="control-label col-xs-3">Sexo:</label>
     <div class="col-xs-7">
     <input type="radio"  id="H"   name="sexo_rdo" title="Tu sexo" value="M" required ' . $h . ' />&nbsp;<label for="H">Masculino</label>
     &nbsp;&nbsp;&nbsp;
     <input type="radio"  id="M" name="sexo_rdo" title="Tu sexo" value="F" required ' . $m . '  />&nbsp;<label for="M">Femenino</label>
     </div>
     </div>';
echo '<div class="form-group">
     <label class="control-label col-xs-3">Estado civil:</label>
     <div class="col-xs-7" id="estado_civil">';
$consulta = "SELECT * FROM estado_civil";
$ejecutar = $conexion->query($consulta);
echo '<select id="estado_civil_slc" class="form-control" name="estado_civil_slc"  >';
while ($reg = $ejecutar->fetch_assoc()) {
    $idSucursal = utf8_encode($reg["id_estado_civil"]);
    $perfil = utf8_encode($reg["estado_civil"]);
    if (utf8_encode($registro["id_estado_civil"]) == utf8_encode($reg["id_estado_civil"])) {
        echo '<option selected value="' . $idSucursal . '">' . $perfil . '</option>';
    } else {
        echo '<option value="' . $idSucursal . '">' . $perfil . '</option>';
    }
}
echo '</select>';
echo '</div>
     </div>
     <div class="form-group">
     <label class="control-label col-xs-3">Fecha de nacimiento:</label>
     <div class="col-xs-7">';
$date = new DateTime(utf8_encode($registro["fecha_nacimiento"]));

echo '<div class="form-group ">
    <div class="col-sm-12">
    <div class="input-group col-md-12">
    <div class="input-group-addon">
    <i class="zmdi zmdi-calendar">
    </i>
    </div>
    <input value=' . $date->format('m/d/Y') . ' onclick="selectFecha()" style="cursor: default;" readonly="" class="form-control" id="fechae" name="date" placeholder="MM/DD/YYYY" type="text"/>
    </div>
    </div>
    </div>

    </div>
    </div>';
echo '<div class="form-group">
    <label class="control-label col-xs-3" >Telefono:</label>
    <div class="col-xs-7">
    <input value="' . utf8_encode($registro["telefono"]) . '" name="telefonoPros" id="telefonope" onkeypress="return soloNumeros(event)"  maxlength="10" type="tel" class="form-control" placeholder="Telefono">
    </div>
    </div>';
echo '<div class="form-group">
      <label class="control-label col-xs-3">CURP:</label>
      <div class="col-xs-7">
      <input value="' . utf8_encode($registro["clave_curp"]) . '" maxlength="18" name="curpp" id="curppe"  onkeypress="return sinCaracteres(event)" onKeyUp="this.value = this.value.toUpperCase();" type="text" class="form-control " placeholder="CURP">
      </div>
      </div>';
echo '<div class="form-group">
                <label class="control-label col-xs-3">RFC:</label>
                <div class="col-xs-7">
                    <input value ="' . utf8_encode($registro["rfc"]) . '" maxlength="13" name="rfcpe" id="rfcpe"  onkeypress="return sinCaracteres(event)" onKeyUp="this.value = this.value.toUpperCase();" type="text" class="form-control " placeholder="RFC">
                </div>
            </div>';
echo '<div class="form-group">
    <label class="control-label col-xs-3">NSS:</label>
    <div class="col-xs-7">
    <input value="' . utf8_encode($registro["nss"]) . '" name="nssp" id="nnspe"  onkeypress="return sinCaracteres(event)" onKeyUp="this.value = this.value.toUpperCase();" type="text" class="form-control " placeholder="Número de seguridad social">
    </div>
    </div>';
echo '<div class="form-group">
    <label class="control-label col-xs-3">Como se entero:</label>
    <div class="col-xs-7" id="medio">';
$consultaMedio = "SELECT * FROM medios where estatus = 1 ORDER BY medio";
$ejecutar_medio = $conexion->query($consultaMedio);
echo '<select id="medio_slce" class="form-control" name="medio_slc"  >';
while ($reg = $ejecutar_medio->fetch_assoc()) {
    $idMedio = utf8_encode($reg["id_medio"]);
    $medio = utf8_encode($reg["medio"]);
    if ($idMedio == utf8_encode($registro["id_medio"])) {
        echo '<option selected value="' . $idMedio . '">' . $medio . '</option>';
    } else {
        echo '<option value="' . $idMedio . '">' . $medio . '</option>';
    }
}
echo '</select>';
echo '</div>
      </div>';
echo '<div class="form-group">
  <label class="control-label col-xs-3">A que se dedica:</label>
  <div class="col-xs-7" id="ocupacion">';
$consultaOcupacion = "SELECT * FROM ocupaciones where estatus = 1 ORDER BY ocupacion";
$ejecutar_ocupacion = $conexion->query($consultaOcupacion);
echo '<select id="ocupacion_slce" class="form-control" name="ocupacion_slc"  >';
while ($reg = $ejecutar_ocupacion->fetch_assoc()) {
    $idOcupacion = utf8_encode($reg["id_ocupacion"]);
    $ocupacion = utf8_encode($reg["ocupacion"]);
    if ($idOcupacion == utf8_encode($registro["id_ocupacion"])) {
        echo '<option selected value="' . $idOcupacion . '">' . $ocupacion . '</option>';
    } else {
        echo '<option value="' . $idOcupacion . '">' . $ocupacion . '</option>';
    }
}
echo '</select>';
echo '</div>
     </div>';

echo '<div class="form-group">
    <label class="control-label col-xs-3">Referido de:</label>
    <div class="col-xs-7" id="referencia">';
$consultaReferidos = "SELECT * FROM referidos where estatus = 1 and id_referido != 0 ORDER BY nombre_referido";
$ejecutar_consulta_referidos = $conexion->query($consultaReferidos);
echo '<select id="referido_slce" class="form-control" name="referido_slc" >';
echo '<option value="0">--NINGUN REFERIDO--</option>';

while ($reg = $ejecutar_consulta_referidos->fetch_assoc()) {
    $idSucursal = utf8_encode($reg["id_referido"]);
    $sucursal = utf8_encode($reg["nombre_referido"]) . ' '
            . utf8_encode($reg["apellido_paterno_referido"]) . ' '
            . utf8_encode($reg["apellido_materno_referido"]);
    if (utf8_decode($registro["id_referido"]) == "0") {
        echo '<option value="' . $idSucursal . '">' . $sucursal . '</option>';
    } else {
        if ($idSucursal == utf8_decode($registro["id_referido"])) {
            echo '<option selected value="' . $idSucursal . '">' . $sucursal . '</option>';
        } else {
            echo '<option value="' . $idSucursal . '">' . $sucursal . '</option>';
        }
    }
}
echo '</select>';
echo'</div>
    </div>';
echo '<legend>Domicilio</legend>';
echo '<div class="form-group">
  <label class="control-label col-xs-3" >Calle:</label>
  <div class="col-xs-7">
  <input value="' . utf8_encode($registro["calle_direccion"]) . '"  name="callep" id="callepe" type="text" class="form-control" placeholder="Calle">
  </div>
  </div>
  <div class="form-group">
  <label class="control-label col-xs-3" >Número:</label>
  <div class="col-xs-7">
  <input  value="' . utf8_encode($registro["numero_direccion"]) . '" name="numerope" id="numerope" onkeypress="return soloNumeros(event);"  type="text" class="form-control" placeholder="Numero">
  </div>
  </div>

  <div class="form-group">
  <label class="control-label col-xs-3" >Código Postal:</label>
  <div class="col-xs-7">
  <input value="' . utf8_encode($registro["codigo_postal"]) . '" name="cppe" onkeypress="return soloNumeros(event);" maxlength="5" onkeyup="obtenerColoniasProspeccion()" id="cpp" type="text" class="form-control" placeholder="Código Postal">
  </div>
  </div>';
echo '<script>obtenerColoniasProspeccion();</script>';
echo '<div class="form-group">
  <label class="control-label col-xs-3" >Colonia:</label>
  <div class="col-xs-7">
  <select class="form-control" id="coloniasp" name="colonia_slce" >
  </select>
  </div>
  </div>
  <div class="form-group">
  <label class="control-label col-xs-3" >Municipio:</label>
  <div class="col-xs-7">
  <input disabled="" id="municipiop"  type="text" class="form-control" placeholder="Municipio">
  </div>
  </div>
  <div class="form-group">
  <label class="control-label col-xs-3" >Estado:</label>
  <div class="col-xs-7">
  <input disabled="" id="estadop"  type="text" class="form-control" placeholder="Estado">
  </div>
  </div>';
echo '</div>';

$conexion->close();


