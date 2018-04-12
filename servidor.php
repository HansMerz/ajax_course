<?php 
require 'conexion.php';

$personas = $_GET['personas'];

$nombreID = "nombreID";
$emailID = "emailID";
$actualizar = "actualizar";
$borrar = "borrar";

if($personas === "personas"){
	$resultado = mysqli_query($link, "SELECT * FROM persona");	
	$table = "";
	$table .= '<div class = "container">';
	$table .= '<table class = "table table-striped table-bordered">';
	$table .= '<tr>';
	$table .= '<th>Usuario</th>';
	$table .= '<th>Nombre</th>';
	$table .= '<th>Email</th>';
	$table .= '<th>Editar Usuario</th>';
	$table .= '<th>Borrar Usuario</th>';
	$table .= '</tr>';

	while($fila = mysqli_fetch_assoc($resultado)){
		$table .= '<tr>';
		$table .= '<td>' . $fila['id'] . '</td>';
		$table .= '<td id = "'.$nombreID.$fila['id'].'">' . $fila['nombre'] . '</td>';
		$table .= '<td id = "'.$emailID.$fila['id'].'">' . $fila['correo'] . '</td>';
		$table .= '<td><input id="'.$fila['id'].'" onclick="editarUsuario(this.id)" type="button" value="Editar" class="btn btn-default"></td>';
		$table .= '<td><input id="'.$borrar.$fila['id'].'" type="button" value="Borrar" class="btn btn-danger"></td>';
		$table .= '<td><input id="'.$actualizar.$fila['id'].'" type="button" value="Actualizar" class="btn btn-primary" style="display:none;"></td>';
		$table .= '</tr>';		
	}
}
echo $table;
mysqli_close($link);
 ?>
