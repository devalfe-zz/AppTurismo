<?php

require_once "../../controllers/gestorFestividad.php";
require_once "../../models/gestorFestividad.php";


#CLASE Y MÉTODOS
#-------------------------------------------------------------
class Ajax{

	#SUBIR LA IMAGEN DEL ARTICULO
	#----------------------------------------------------------
	
	public $imagenTemporal;

	public function gestorFestivalAjax(){

		$datos = $this->imagenTemporal;
		$respuesta = GestorFestival::mostrarImagenController($datos);
		echo $respuesta;

	}

	#ACTUALIZAR ORDEN
	#---------------------------------------------
	public $actualizarOrdenFestival;
	public $actualizarOrdenItem;

	public function actualizarOrdenAjax(){	

		$datos = array("ordenFestival" => $this->actualizarOrdenFestival,
			           "ordenItem" => $this->actualizarOrdenItem);

		$respuesta = GestorFestival::actualizarOrdenController($datos);

		echo $respuesta;

	}

}

#OBJETOS
#-----------------------------------------------------------

if(isset($_FILES["imagen"]["tmp_name"])){

	$a = new Ajax();
	$a -> imagenTemporal = $_FILES["imagen"]["tmp_name"];
	$a -> gestorFestivalAjax();

}

if(isset($_POST["actualizarOrdenFestival"])){

	$b = new Ajax();
	$b -> actualizarOrdenFestival = $_POST["actualizarOrdenFestival"];
	$b -> actualizarOrdenItem = $_POST["actualizarOrdenItem"];
	$b -> actualizarOrdenAjax();

}
