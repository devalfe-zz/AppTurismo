<?php

class GestorVideos{

	#MOSTRAR VIDEO AJAX
	#------------------------------------------------------------

	public function mostrarVideoController($datos){

		$aleatorio = mt_rand(100, 999);

		$ruta = "../../themes/admin/videos/video".$aleatorio.".mp4";

		move_uploaded_file($datos, $ruta);

		GestorVideosModel::subirVideoModel($ruta, "dev7_videos_turismo");

		$respuesta = GestorVideosModel::mostrarVideoModel($ruta, "dev7_videos_turismo");

		$enviarDatos = $respuesta["ruta"];

		echo $enviarDatos;

	}

	#MOSTRAR VIDEOS EN LA VISTA
	#------------------------------------------------------------
	public function mostrarVideoVistaController(){

		$respuesta = GestorVideosModel::mostrarVideoVistaModel("dev7_videos_turismo");

		foreach($respuesta as $row => $item){

			echo '<li id="'.$item["id"].'" class="bloqueVideo">
					<span class="fa fa-times eliminarVideo" ruta="'.$item["ruta"].'"></span>
					<video controls class="handleVideo">
						<source src="'.substr($item["ruta"],6).'" type="video/mp4">
					</video>	
				</li>';

		}

	}

	#ELIMINAR VIDEO
	#-----------------------------------------------------------
	public function eliminarVideoController($datos){

		$respuesta = GestorVideosModel::eliminarVideoModel($datos, "dev7_videos_turismo");

		unlink($datos["rutaVideo"]);

		echo $respuesta;

	}

	#ACTUALIZAR ORDEN 
	#---------------------------------------------------
	public function actualizarOrdenController($datos){

		GestorVideosModel::actualizarOrdenModel($datos, "dev7_videos_turismo");

		$respuesta = GestorVideosModel::seleccionarOrdenModel("de7_videos_turismo");

		foreach($respuesta as $row => $item){

			echo '<li id="'.$item["id"].'" class="bloqueVideo">
					<span class="fa fa-times eliminarVideo" ruta="'.$item["ruta"].'"></span>
					<video controls class="handleVideo">
						<source src="'.substr($item["ruta"],6).'" type="video/mp4">
					</video>	
				</li>';

		}

	}

}
