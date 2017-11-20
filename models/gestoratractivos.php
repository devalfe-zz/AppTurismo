<?php
require_once "BackTurismo/models/conexion.php";
class AtractivosModels{
    static public function selecionarAtractivosModels($tabla){
        
		$stmt = (new Conexion)->conectar()->prepare("SELECT id, titulo, introduccion, ruta,  rutai, rutaii, contenido FROM $tabla ORDER BY orden ASC");

        $stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();

    }

    static public function serviceAtractivosModels ($api){
        $url ="http://devalfe.net.kemari.co/apptotem/public/api/v1/".$api;
        $json = file_get_contents($url);
        $data = json_decode($json,true);
        return $data;
    }
}
