<?php

require_once "conexion.php";

class MensajesModel{

	#MOSTRAR MENSAJES EN LA VISTA
	#------------------------------------------------------------
	static public function mostrarMensajesModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, nombre, email, mensaje, fecha FROM $tabla ORDER BY fecha DESC"); 

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();
	}

	#BORRAR MENSAJES
	#-----------------------------------------------------
	static public function borrarMensajesModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	#ENVIAR EMAIL MASIVOS
	#-------------------------------------------------
	static public function seleccionarEmailSuscriptores($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT nombre, email FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

	#SELECCIONAR MENSAJES SIN REVISAR
	#------------------------------------------------------------
	static public function mensajesSinRevisarModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT revision FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

	#MENSAJES REVISADOS
	#------------------------------------------------------------
	static public function mensajesRevisadosModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET revision = :revision");

		$stmt->bindParam(":revision", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

}
