<?php

require_once "conexion.php";

class GestorNoticiasModel{
    
	static public function guardarNoticiasModel($datosModel, $tabla){
        $stmt = (new Conexion)->conectar()->prepare("INSERT INTO $tabla (titulo, introduccion, ruta, contenido) VALUES (:titulo, :introduccion, :ruta, :contenido)");

        $stmt -> bindParam(":titulo", $datosModel["titulo"], PDO::PARAM_STR);
		$stmt -> bindParam(":introduccion", $datosModel["introduccion"], PDO::PARAM_STR);
		$stmt -> bindParam(":ruta", $datosModel["ruta"], PDO::PARAM_STR);
   		$stmt -> bindParam(":contenido", $datosModel["contenido"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}
		else{
			return "error GestorNoticiasModel";
		}

		$stmt->close();
    }
    
    static public function mostrarNoticiasModel($tabla){

		$stmt = (new Conexion)->conectar()->prepare("SELECT id, titulo, introduccion, ruta, contenido FROM $tabla ORDER BY orden ASC");
        $stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();

	}
    
    static public function borrarNoticiasModel($datosModel, $tabla){
        
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
		if($stmt->execute()){
			return "ok";
		}
		else{
			return "error borrarNoticiasModel";
		}
		$stmt->close();

    }

    static public function editarNoticiasModel($datosModel, $tabla){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET titulo = :titulo, introduccion = :introduccion, ruta = :ruta, contenido = :contenido WHERE id = :id");	

		$stmt -> bindParam(":titulo", $datosModel["titulo"], PDO::PARAM_STR);
		$stmt -> bindParam(":introduccion", $datosModel["introduccion"], PDO::PARAM_STR);
		$stmt -> bindParam(":ruta", $datosModel["ruta"], PDO::PARAM_STR);
       	$stmt -> bindParam(":contenido", $datosModel["contenido"], PDO::PARAM_INT);
        $stmt -> bindParam(":id", $datosModel["id"], PDO::PARAM_INT);


		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error editarNoticiasModel";
		}

		$stmt->close();
    }
    
    static public function actualizarOrdenModel($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET orden = :orden WHERE id = :id");

		$stmt -> bindParam(":orden", $datos["ordenItem"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["ordenarNoticias"], PDO::PARAM_INT);

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

		$stmt = Conexion::conectar()->prepare("SELECT id, titulo, introduccion, ruta, contenido FROM $tabla ORDER BY orden ASC");

		$stmt -> execute();
		return $stmt->fetchAll();
		$stmt->close();

	}
}
