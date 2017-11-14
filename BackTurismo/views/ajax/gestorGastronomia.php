<?php

require_once "../../controllers/gestorGastronomia.php";
require_once "../../models/gestorGastronomia.php";
#-------------------------------------------------------------
class Ajax{

	
	public $imagenTemporal;

	public function gestorGastronomiaAjax(){

		$datos = $this->imagenTemporal;
		$respuesta = GestorGastronomia::mostrarImagenController($datos);
		echo $respuesta;

	}

	#ACTUALIZAR ORDEN
	#---------------------------------------------
	public $actualizarOrdenGastronomia;
	public $actualizarOrdenItem;

	public function actualizarOrdenAjax(){	

		$datos = array("ordenGastronomia" => $this->actualizarOrdenGastronomia,
			           "ordenItem" => $this->actualizarOrdenItem);

		$respuesta = GestorGastronomia::actualizarOrdenController($datos);

		echo $respuesta;

	}

}

#OBJETOS
#-----------------------------------------------------------

if(isset($_FILES["imagen"]["tmp_name"])){

	$a = new Ajax();
	$a -> imagenTemporal = $_FILES["imagen"]["tmp_name"];
	$a -> gestorGastronomiaAjax();

}

if(isset($_POST["actualizarOrdenGastronomia"])){

	$b = new Ajax();
	$b -> actualizarOrdenGastronomia = $_POST["actualizarOrdenGastronomia"];
	$b -> actualizarOrdenItem = $_POST["actualizarOrdenItem"];
	$b -> actualizarOrdenAjax();

}
