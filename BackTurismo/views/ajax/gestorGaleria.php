<?php
require_once "../../models/gestorGaleria.php";
require_once "../../controllers/gestorGaleria.php";
#CLASE Y MÉTODOS
#-------------------------------------------------------------
class Ajax{

	#SUBIR LA IMAGEN DE LA GALERIA
	#----------------------------------------------------------
	public $imagenTemporal;
    public function gestorGaleriaAjax(){

		$datos = $this->imagenTemporal;
		$respuesta = GestorGaleria::mostrarImagenController($datos);
		echo $respuesta;

	}
    
    public $actualizarOrdenGaleria;
	public $actualizarOrdenItem;

	public function actualizarOrdenAjax(){	

		$datos = array("ordenGaleria" => $this->actualizarOrdenGaleria,
			           "ordenItem" => $this->actualizarOrdenItem);

		$respuesta = GestorGaleria::actualizarOrdenController($datos);
		echo $respuesta;

	}
}

#OBJETOS
#-----------------------------------------------------------

if(isset($_FILES[ "imagen"][ "tmp_name"])){ 
    $a = new Ajax();
    $a -> imagenTemporal = $_FILES["imagen"]["tmp_name"];
    $a -> gestorGaleriaAjax();
    
}

if(isset($_POST["actualizarOrdenGaleria"])){

	$b = new Ajax();
	$b -> actualizarOrdenGaleria = $_POST["actualizarOrdenGaleria"];
	$b -> actualizarOrdenItem = $_POST["actualizarOrdenItem"];
	$b -> actualizarOrdenAjax();

}
