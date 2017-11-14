<?php

require_once "conexion.php";

class GestorGastronomiaModel{

	#GUARDAR ARTICULO
	#------------------------------------------------------------

	static public function guardarGastronomiaModel($datosModel, $tabla){
		$stmt = (new Conexion)->conectar()->prepare("INSERT INTO $tabla (titulo, introduccion, ruta, rutai, contenido, color) VALUES (:titulo, :introduccion, :ruta, :rutai, :contenido, :color)");
		$stmt -> bindParam(":titulo", $datosModel["titulo"], PDO::PARAM_STR);
		$stmt -> bindParam(":introduccion", $datosModel["introduccion"], PDO::PARAM_STR);
		$stmt -> bindParam(":ruta", $datosModel["ruta"], PDO::PARAM_STR);
        $stmt -> bindParam(":rutai", $datosModel["rutai"], PDO::PARAM_STR);
        $stmt -> bindParam(":contenido", $datosModel["contenido"], PDO::PARAM_STR);
        $stmt -> bindParam(":color", $datosModel["color"], PDO::PARAM_STR);
		if($stmt->execute()){
			return "ok";
		}
		else{
			return "error guardarGastronomiaModel";
		}
		$stmt->close();
	}

	#MOSTRAR ARTÍCULOS
	#------------------------------------------------------
	static public function mostrarGastronomiaModel($tabla){

		$stmt = (new Conexion)->conectar()->prepare("SELECT id, titulo, introduccion, ruta,  rutai, contenido, color FROM $tabla ORDER BY orden ASC");

		$stmt -> execute(); 
        return $stmt -> fetchAll();
        $stmt -> close();

	}

	#BORRAR ARTICULOS
	#-----------------------------------------------------
	static public function borrarGastronomiaModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}

		else{

			return "error borrarGastronomiaModel";

		}

		$stmt->close();

	}

	#ACTUALIZAR ARTICULOS
	#---------------------------------------------------
	static public function editarGastronomiaModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET titulo = :titulo, introduccion = :introduccion, ruta = :ruta, rutai = :rutai, contenido = :contenido WHERE id = :id");	

		$stmt -> bindParam(":titulo", $datosModel["titulo"], PDO::PARAM_STR);
		$stmt -> bindParam(":introduccion", $datosModel["introduccion"], PDO::PARAM_STR);
		$stmt -> bindParam(":ruta", $datosModel["ruta"], PDO::PARAM_STR);
        $stmt -> bindParam(":rutai", $datosModel["rutai"], PDO::PARAM_STR);
        $stmt -> bindParam(":contenido", $datosModel["contenido"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error editarGastronomiaModel";
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

		$stmt = Conexion::conectar()->prepare("SELECT id, titulo, introduccion, ruta, rutai, rutaii, contenido FROM $tabla ORDER BY orden ASC");

		$stmt -> execute();

		return $stmt->fetchAll();

		$stmt->close();

	}

}
