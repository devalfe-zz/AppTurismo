<?php

class Enlaces{

	static public function enlacesController(){

		if(isset($_GET["action"])){

			$enlaces = $_GET["action"];

		}

		else{

			$enlaces = "index";

		}

		$respuesta = (new EnlacesModels)->enlacesModel($enlaces);

		include $respuesta;

	}


}
?>