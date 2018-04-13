<?php
require 'config.php';
class Acciones{    
    	   
    public function insertar($param1, $param2){    	
    	$con = new Conexion();
    	try {    		
    		$resul = $con->prepare("INSERT INTO persona VALUES(null, :nom, :tel)");
    		$resul->bindParam(':nom', $param1);
    		$resul->bindParam(':tel', $param2);
    		$resul->execute();    		
    	} catch (Exception $e) {
    		echo "Error al insertar";
    	}
    } 
    public function actualizar($id, $cliente){
        $con = new Conexion();
        try {
      $sql = "UPDATE persona SET nombre = :cli WHERE id = :id";
            $resul = $con->prepare($sql);
            $resul->execute(array(":cli"=>$cliente, ":id"=>$id));                        
    } catch (Exception $e) {
      echo "Error al actualizar datos";
    }
    }
    public function eliminar($id){
        $con = new Conexion();
        try {
            $sql = "DELETE FROM persona WHERE id = ?";
            $resul = $con->prepare($sql);
            $resul->execute(array($id));            
            echo "<p>Eliminación exitosa</p>";         
             
    } catch (Exception $e) {
      echo "Error al eliminar";
    }
    }
    
}
?>
