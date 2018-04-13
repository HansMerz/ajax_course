<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">	
	<title>Inventario</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<br><br>

<div id="overlay"></div>
<div id="nuevaVentana">
	<div id="box-header"></div>
	<button onmousedown="ejecutarNuevaVentana()" id="botonCerrar"></button><br/><br/><br/>
		<label>Nombre: </label><input type="text" id="nuevoUsuarioID"><br/><br/>
		<label>Correo:</label><input type="email" id="nuevoEmailID"><br/><br/><br/>
	<button onmousedown="agregarUsuario()" style="margin-left:40%;" class="btn btn-success">Agregar Usuario nuevo</button><br/>
</div>

<div id="wrapper">
	<div id="info"></div>
</div>

<script type="text/javascript">
	var resultado = document.getElementById("info");

	function mostrarUsuarios(){		
		var xmlhttp;
		if(window.XMLHttpRequest){
			xmlhttp = new XMLHttpRequest();
		}else{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function(){
			if(this.readyState === 4 && this.status === 200){
				resultado.innerHTML = xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET", "servidor.php?personas=" + "personas", true);
		xmlhttp.send();
	}
	mostrarUsuarios();
	function editarUsuario(usuarioID){
		var nombreID = "nombreID" + usuarioID;
		var emailID = "emailID" + usuarioID;
		var borrar = "borrar" + usuarioID;
		var actualizar = "actualizar" + usuarioID;
		var editarNombreID = nombreID + "-editar";

		var nombreDelUsuario = document.getElementById(nombreID).innerHTML;
		var parent = document.querySelector("#" + nombreID);

		if(parent.querySelector("#" + editarNombreID) === null){
			document.getElementById(nombreID).innerHTML = '<input type="text" id="'+editarNombreID+'" value="'+nombreDelUsuario+'">';
			document.getElementById(borrar).disabled = "true";
			document.getElementById(actualizar).style.display = "block";
		}
	}	
	function actualizarUsuario(usuarioID){
		var xmlhttp;
		if(window.XMLHttpRequest){
			xmlhttp = new XMLHttpRequest();
		}else{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}

		var nombreActualizado = document.getElementById("nombreID"+ usuarioID +"-editar").value;
		xmlhttp.onreadystatechange = function(){
			if(this.readyState === 4 && this.status === 200){
				mostrarUsuarios();				
			}
		}
		if(nombreActualizado == ""){
			alert("El campo para actualizar nombre no debe estar vacío");
		}else{
			xmlhttp.open("GET", "servidor.php?usuarioIDActualizado="+usuarioID+"&nombreActualizado="+nombreActualizado, true);
		xmlhttp.send();
		}		
	}
	function borrarUsuario(usuarioID){
		var respuesta = confirm("¿Estás seguro de borrar este usuario?");

		if(respuesta === true){
			var xmlhttp;
			if(window.XMLHttpRequest){
				xmlhttp = new XMLHttpRequest();
			}else{
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function(){
				if(this.readyState === 4 && this.status === 200){
					mostrarUsuarios();				
				}
			}
			xmlhttp.open("GET", "servidor.php?usuarioIDEliminado="+usuarioID);
			xmlhttp.send();
		}
	}
	var overlay = document.getElementById("overlay");
	var nuevaVentana = document.getElementById("nuevaVentana");
	
	function ejecutarNuevaVentana(){		
		overlay.style.opacity = .5;

		if(overlay.style.display == "block"){
			overlay.style.display = "none";
			nuevaVentana.style.display = "none";
		}else{
			overlay.style.display = "block";
			nuevaVentana.style.display = "block";
		}
		document.getElementById("nuevoUsuarioID").value = "";
		document.getElementById("nuevoEmailID").value = "";
	}
	function agregarUsuario(){
		overlay.style.display = "none";
		nuevaVentana.style.display = "none";
		var xmlhttp;
		if(window.XMLHttpRequest){
			xmlhttp = new XMLHttpRequest();
		}else{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		var nuevoUsuario = document.getElementById("nuevoUsuarioID").value;
		var nuevoEmail = document.getElementById("nuevoEmailID").value;

		xmlhttp.onreadystatechange = function(){
				if(this.readyState === 4 && this.status === 200){					
					mostrarUsuarios();				
				}
		}		
		if(nuevoUsuario == "" || nuevoEmail == ""){
			alert("No se admiten campos vacios");
		}else{
			xmlhttp.open("GET", "servidor.php?nuevoNombre=" + nuevoUsuario + "&nuevoCorreo=" + nuevoEmail, true);
			xmlhttp.send();
		}				
	}
</script>	
</body>
</html>