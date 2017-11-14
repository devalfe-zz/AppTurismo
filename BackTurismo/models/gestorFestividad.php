<?php

require_once "conexion.php";

class GestorFestivalModel{

	#GUARDAR ARTICULO
	#------------------------------------------------------------

	static public function guardarFestivalModel($datosModel, $tabla){
		$stmt = (new Conexion)->conectar()->prepare("INSERT INTO $tabla (titulo, introduccion, ruta, inicio, fin, mes, color) VALUES (:titulo, :introduccion, :ruta, :inicio, :fin, :mes, :color)");
		$stmt -> bindParam(":titulo", $datosModel["titulo"], PDO::PARAM_STR);
		$stmt -> bindParam(":introduccion", $datosModel["introduccion"], PDO::PARAM_STR);
		$stmt -> bindParam(":ruta", $datosModel["ruta"], PDO::PARAM_STR);
        $stmt -> bindParam(":inicio", $datosModel["inicio"], PDO::PARAM_STR);
        $stmt -> bindParam(":fin", $datosModel["fin"], PDO::PARAM_STR);
        $stmt -> bindParam(":mes", $datosModel["mes"], PDO::PARAM_STR);
        $stmt -> bindParam(":color", $datosModel["color"], PDO::PARAM_STR);


		if($stmt->execute()){
			return "ok";
		}
		else{
			return "error guardarFestivalModel";
		}
		$stmt->close();
	}

	#MOSTRAR ARTÍCULOS
	#------------------------------------------------------
	static public function mostrarFestivalModel($tabla){

		$stmt = (new Conexion)->conectar()->prepare("SELECT id, titulo, introduccion, ruta,  inicio, fin, mes FROM $tabla ORDER BY orden ASC");

		$stmt -> execute(); 
        return $stmt -> fetchAll();
        $stmt -> close();

	}

	#BORRAR ARTICULOS
	#-----------------------------------------------------
	static public function borrarFestivalModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}

		else{

			return "error borrarFestivalModel";

		}

		$stmt->close();

	}

	#ACTUALIZAR ARTICULOS
	#---------------------------------------------------
	static public function editarFestivalModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET titulo = :titulo, introduccion = :introduccion, ruta = :ruta, inicio = :inicio, fin = :fin, mes = :mes WHERE id = :id");	

		$stmt -> bindParam(":titulo", $datosModel["titulo"], PDO::PARAM_STR);
		$stmt -> bindParam(":introduccion", $datosModel["introduccion"], PDO::PARAM_STR);
		$stmt -> bindParam(":ruta", $datosModel["ruta"], PDO::PARAM_STR);
        $stmt -> bindParam(":inicio", $datosModel["inicio"], PDO::PARAM_STR);
        $stmt -> bindParam(":fin", $datosModel["fin"], PDO::PARAM_STR);
		$stmt -> bindParam(":mes", $datosModel["mes"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error editarFestivalModel";
		}

		$stmt->close();

	}

	#ACTUALIZAR ORDEN 
	#---------------------------------------------------
	static public function actualizarOrdenModel($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET orden = :orden WHERE id = :id");

		$stmt -> bindParam(":orden", $datos["ordenItem"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["ordenFestival"], PDO::PARAM_INT);

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

		$stmt = Conexion::conectar()->prepare("SELECT id, titulo, introduccion, ruta, inicio, fin, mes FROM $tabla ORDER BY orden ASC");

		$stmt -> execute();

		return $stmt->fetchAll();

		$stmt->close();

	}

}
