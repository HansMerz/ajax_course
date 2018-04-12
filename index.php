<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	<title>Inventario</title>
</head>
<body>
<br><br>

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
</script>	
</body>
</html>