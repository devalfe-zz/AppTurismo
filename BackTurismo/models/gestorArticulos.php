<?php
require_once "conexion.php";
class GestorArticulosModel{



	#GUARDAR ARTICULO

	#------------------------------------------------------------
	static public function guardarArticuloModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (titulo, introduccion, ruta, rutai, rutaii, contenido, color, direccion) VALUES (:titulo, :introduccion, :ruta, :rutai, :rutaii, :contenido, :color, :direccion)");
		$stmt -> bindParam(":titulo", $datosModel["titulo"], PDO::PARAM_STR);
		$stmt -> bindParam(":introduccion", $datosModel["introduccion"], PDO::PARAM_STR);
		$stmt -> bindParam(":ruta", $datosModel["ruta"], PDO::PARAM_STR);
        $stmt -> bindParam(":rutai", $datosModel["rutai"], PDO::PARAM_STR);
        $stmt -> bindParam(":rutaii", $datosModel["rutaii"], PDO::PARAM_STR);
        $stmt -> bindParam(":contenido", $datosModel["contenido"], PDO::PARAM_STR);
        $stmt -> bindParam(":color", $datosModel["color"], PDO::PARAM_STR);
        $stmt -> bindParam(":direccion", $datosModel["direccion"], PDO::PARAM_STR);
		//print_r($datosModel);
		if($stmt->execute()){
			return "ok";
		}
		else{
			return "error guardarArticuloModel";
		}
		$stmt->close();
	}

	#MOSTRAR ARTÍCULOS
	#------------------------------------------------------
	static public function mostrarArticulosModel($tabla){
		$stmt = (new Conexion)->conectar()->prepare("SELECT id, titulo,  introduccion, ruta,  rutai, rutaii, contenido, direccion FROM $tabla ORDER BY orden ASC");
		$stmt -> execute(); 
        return $stmt -> fetchAll();
        $stmt -> close();
	}

	#BORRAR ARTICULOS
	#-----------------------------------------------------
	static public function borrarArticuloModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
		if($stmt->execute()){
			return "ok";
		}
		else{
			return "error borrarArticuloModel";
		}
		$stmt->close();
	}



	#ACTUALIZAR ARTICULOS
	#---------------------------------------------------
	static public function editarArticuloModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET titulo = :titulo, direccion = :direccion, introduccion = :introduccion, ruta = :ruta, rutai = :rutai, rutaii = :rutaii, contenido = :contenido WHERE id = :id");	
		$stmt -> bindParam(":titulo", $datosModel["titulo"], PDO::PARAM_STR);
		$stmt -> bindParam(":direccion", $datosModel["direccion"], PDO::PARAM_STR);
		$stmt -> bindParam(":introduccion", $datosModel["introduccion"], PDO::PARAM_STR);
		$stmt -> bindParam(":ruta", $datosModel["ruta"], PDO::PARAM_STR);
        $stmt -> bindParam(":rutai", $datosModel["rutai"], PDO::PARAM_STR);
        $stmt -> bindParam(":rutaii", $datosModel["rutaii"], PDO::PARAM_STR);
		$stmt -> bindParam(":contenido", $datosModel["contenido"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datosModel["id"], PDO::PARAM_INT);
		if($stmt->execute()){
			return "ok";
		}
		else{
			return "error editarArticuloModel";
		}
		$stmt->close();
	}



	#ACTUALIZAR ORDEN 

	#---------------------------------------------------

	static public function actualizarOrdenModel($datos, $tabla){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET orden = :orden WHERE id = :id");
		$stmt -> bindParam(":orden", $datos["ordenItem"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["ordenArticulos"], PDO::PARAM_INT);
		if($stmt -> execute()){
			return "ok";
		}
		else{
			return "error actualizarOrdenModel";
		}
		$stmt -> close();
	}



	#SELECCIONAR ORDEN 
	#---------------------------------------------------
	static public function seleccionarOrdenModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT id, titulo, direccion, introduccion, ruta, rutai, rutaii, contenido FROM $tabla ORDER BY orden ASC");
		$stmt -> execute();
		return $stmt->fetchAll();
		$stmt->close();
	}



}

