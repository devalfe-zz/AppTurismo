<?php

require_once "conexion.php";

class GestorGaleriaModel{

	#SUBIR LA RUTA DE LA IMAGEN
	#------------------------------------------------------------
	static public function guardarGaleriaModel($datosModel, $tabla){
        //print_r($datos);
        
		$stmt = (new Conexion)->conectar()->prepare("INSERT INTO $tabla (titulo, introduccion, ruta) VALUES (:titulo, :introduccion, :ruta)");

        $stmt -> bindParam(":titulo", $datosModel["titulo"], PDO::PARAM_STR);
		$stmt -> bindParam(":introduccion", $datosModel["introduccion"], PDO::PARAM_STR);
		$stmt -> bindParam(":ruta", $datosModel["ruta"], PDO::PARAM_STR);
       
		if($stmt->execute()){
			return "ok";
		}
		else{
			return "error guardarGaleriaModel";
		}

		$stmt->close();
	}

	#SELECCIONAR LA RUTA DE LA IMAGEN
	#------------------------------------------------------------
	static public function mostrarGaleriaModel($tabla){

		$stmt = (new Conexion)->conectar()->prepare("SELECT id, titulo, introduccion, ruta FROM dev7_galeria_turismo ORDER BY orden ASC");
        $stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();

	}

    static public function borrarGaleriaModel($datosModel, $tabla){
        
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
		if($stmt->execute()){
			return "ok";
		}
		else{
			return "error borrarGaleriaModel";
		}
		$stmt->close();

    }
    
    static public function editarGaleriaModel($datosModel, $tabla){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET titulo = :titulo, introduccion = :introduccion, ruta = :ruta WHERE id = :id");	

		$stmt -> bindParam(":titulo", $datosModel["titulo"], PDO::PARAM_STR);
		$stmt -> bindParam(":introduccion", $datosModel["introduccion"], PDO::PARAM_STR);
		$stmt -> bindParam(":ruta", $datosModel["ruta"], PDO::PARAM_STR);
       	$stmt -> bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error editarGaleriaModel";
		}

		$stmt->close();
    }
	
    
	#ACTUALIZAR ORDEN 
	#---------------------------------------------------
	public function actualizarOrdenModel($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET orden = :orden WHERE id = :id");

		$stmt -> bindParam(":orden", $datos["ordenItem"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["ordenGaleria"], PDO::PARAM_INT);

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

		$stmt = Conexion::conectar()->prepare("SELECT id, titulo, introduccion, ruta FROM $tabla ORDER BY orden ASC");

		$stmt -> execute();
		return $stmt->fetchAll();
		$stmt->close();

	}

}
