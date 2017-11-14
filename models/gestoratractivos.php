<?php
require_once "BackTurismo/models/conexion.php";
class AtractivosModels{
    static public function selecionarAtractivosModels($tabla){
        
		$stmt = (new Conexion)->conectar()->prepare("SELECT id, titulo, introduccion, ruta,  rutai, rutaii, contenido FROM $tabla ORDER BY orden ASC");

        $stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();

    }
}
