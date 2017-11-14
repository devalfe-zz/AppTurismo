<?php
require_once "BackTurismo/models/conexion.php";
class GaleriaModels{
    static public function selecionarGaleriaModels($tabla){
        
		$stmt = Conexion::conectar()->prepare("SELECT id, titulo, introduccion, ruta FROM $tabla ORDER BY orden ASC");

        $stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();

    }
}
