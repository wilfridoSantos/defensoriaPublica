<?php

$link = mysql_connect("localhost", "root", "");


mysql_select_db("bddefensoria", $link);
$result = mysql_query("drop DATABASE if EXISTS bddefensoria", $link);
if ($result == 0) {
    echo "Error intente más tarde";
} else {
    echo "Se elimino la base de datos exitosamente";
}
mysql_close($link);

