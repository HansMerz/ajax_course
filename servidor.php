<?php 
include_once 'acciones.php';
include_once 'config.php';
@$personas = $_GET['personas'];

$a = new Acciones();

@$usuarioIDEliminado = $_GET['usuarioIDEliminado'];

@$usuarioIDActualizado = $_GET['usuarioIDActualizado'];
@$nombreActualizado = $_GET['nombreActualizado'];

@$nuevoUsuario = $_GET['nuevoNombre'];
@$nuevoCorreo = $_GET['nuevoCorreo'];

$nombreID = "nombreID";
$emailID = "emailID";
$actualizar = "actualizar";
$borrar = "borrar";

if($personas === "personas"){
	$con = new Conexion();
	$resultado = $con->prepare("SELECT * FROM persona");	
	$resultado->execute();
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

	while($fila = $resultado->fetch(PDO::FETCH_ASSOC)){
		$table .= '<tr>';
		$table .= '<td>' . $fila['id'] . '</td>';
		$table .= '<td id = "'.$nombreID.$fila['id'].'">' . $fila['nombre'] . '</td>';
		$table .= '<td id = "'.$emailID.$fila['id'].'">' . $fila['correo'] . '</td>';
		$table .= '<td><input id="'.$fila['id'].'" onclick="editarUsuario(this.id)" type="button" value="Editar" class="btn btn-success"></td>';
		$table .= '<td><input id="'.$borrar.$fila['id'].'" onclick="borrarUsuario('.$fila['id'].')" type="button" value="Borrar" class="btn btn-danger"></td>';
		$table .= '<td><input id="'.$actualizar.$fila['id'].'" onclick = "actualizarUsuario('.$fila['id'].')" type="button" value="Actualizar" class="btn btn-primary" style="display:none;"></td>';
		$table .= '</tr>';		
	}
	$table .= '</table>';
	$table .= '<button onclick="ejecutarNuevaVentana()" class="btn btn-primary">Agregar Usuario</button>';
	$table .= '</div>';
	echo $table;	
}
if(!empty($nuevoUsuario) && !empty($nuevoCorreo)){	
	$a->insertar($nuevoUsuario, $nuevoCorreo);
}

if(!empty($nombreActualizado)){
	$cliente = $a->actualizar($usuarioIDActualizado, $nombreActualizado);
}

if(!empty($usuarioIDEliminado)){
	$resultado = $a->eliminar($usuarioIDEliminado);
}

 ?>
