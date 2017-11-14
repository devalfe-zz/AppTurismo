<?php

require_once "../../controllers/gestorServicios.php";
require_once "../../models/gestorServicios.php";


#CLASE Y MÉTODOS
#-------------------------------------------------------------
class Ajax{

	#SUBIR LA IMAGEN DEL ARTICULO
	#----------------------------------------------------------
	
	public $imagenTemporal;

	public function gestorServiciosAjax(){

		$datos = $this->imagenTemporal;
		$respuesta = GestorServicios::mostrarImagenController($datos);
		echo $respuesta;

	}

	#ACTUALIZAR ORDEN
	#---------------------------------------------
	public $actualizarOrdenServicios;
	public $actualizarOrdenItem;

	public function actualizarOrdenAjax(){	

		$datos = array("ordenServicios" => $this->actualizarOrdenServicios,
			           "ordenItem" => $this->actualizarOrdenItem);

		$respuesta = GestorServicios::actualizarOrdenController($datos);

		echo $respuesta;

	}

}

#OBJETOS
#-----------------------------------------------------------

if(isset($_FILES["imagen"]["tmp_name"])){

	$a = new Ajax();
	$a -> imagenTemporal = $_FILES["imagen"]["tmp_name"];
	$a -> gestorServiciosAjax();

}

if(isset($_POST["actualizarOrdenServicios"])){

	$b = new Ajax();
	$b -> actualizarOrdenServicios = $_POST["actualizarOrdenServicios"];
	$b -> actualizarOrdenItem = $_POST["actualizarOrdenItem"];
	$b -> actualizarOrdenAjax();

}
