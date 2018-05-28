<?php
require_once "BackTurismo/models/conexion.php";

class AtractivosModels{
//$baseURL = "http://guiaturistica.moqueguaturismo.gob.pe/api/v1/";

    static public function selecionarAtractivosModels($tabla){
        
		$stmt = (new Conexion)->conectar()->prepare("SELECT id, titulo, introduccion, ruta,  rutai, rutaii, contenido FROM $tabla ORDER BY orden ASC");
        $stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();

    }

    static public function serviceAtractivosModels ($api){
       
        $url = "http://guiaturistica.moqueguaturismo.gob.pe/api/v1/".$api;
        $file_headers = @get_headers($url);
        if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') { 
            header("location:index");
            //echo '<script> window.location = "index"</script>';
        }
        else {
            $url = "http://guiaturistica.moqueguaturismo.gob.pe/api/v1/".$api;
            $json = file_get_contents($url);
            $data = json_decode($json,true);
            return $data;
        }
        
    }

    static public function serviceAtractivoModels($id){
        //$url ="http://192.168.10.10:3000/api/v1/AtractivosApi/".$id; 
        $url ="http://guiaturistica.moqueguaturismo.gob.pe/api/v1/atractivo/".$id;
        $file_headers = @get_headers($url);
        if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') { 
            header("location:index");
            //echo '<script> window.location = "index"</script>';
        }
        else {
            $url ="http://guiaturistica.moqueguaturismo.gob.pe/api/v1/atractivo/".$id;           
            $json = file_get_contents($url);      
            $data = json_decode($json,true);
            return $data;
        }         
        
    }
}
