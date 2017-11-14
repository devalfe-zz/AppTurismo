<?php

include "../../variables.php";
require_once "../../models/gestorNoticias.php";
require_once "../../controllers/gestorNoticias.php";
#CLASE Y MÉTODOS
#-------------------------------------------------------------
class Ajax{
    public $imagenTemporal;
    public $theme = THEMEX; 
    public $root = ROOT; 
    public $temp = TEMP_N;
    public function gestorNoticiasAjax(){
        $datos = array("imagenTemporal" => $this->imagenTemporal,
			           "theme" => $this->theme,
                       "root" => $this->root,
                       "temp" => $this->temp);

		#$datos = $this->imagenTemporal;
		$respuesta = GestorNoticias::mostrarImagenController($datos);
		echo $respuesta;
	}
    
    public $actualizarOrdenNoticias;
	public $actualizarOrdenItem;

	public function actualizarOrdenAjax(){	

		$datos = array("ordenarNoticias" => $this->actualizarOrdenNoticias,
			           "ordenItem" => $this->actualizarOrdenItem);

		$respuesta = GestorNoticias::actualizarOrdenController($datos);
		echo $respuesta;

	}
    
       
}

#OBJETOS
#-----------------------------------------------------------

if(isset($_FILES[ "imagen"][ "tmp_name"])){ 
    $a = new Ajax();
    $a -> imagenTemporal = $_FILES["imagen"]["tmp_name"];
    $a -> gestorNoticiasAjax();
    
}

if(isset($_POST["actualizarOrdenNoticias"])){

	$b = new Ajax();
	$b -> actualizarOrdenNoticias = $_POST["actualizarOrdenNoticias"];
	$b -> actualizarOrdenItem = $_POST["actualizarOrdenItem"];
	$b -> actualizarOrdenAjax();

}
