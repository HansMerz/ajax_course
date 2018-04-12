<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$bd = "prueba";
$link = mysqli_connect($servidor, $usuario, $clave, $bd);
if (mysqli_connect_errno()) {
    echo "Error con la conexión ". mysql_connect_error();
}
?>