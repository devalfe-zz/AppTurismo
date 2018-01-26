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
        //$url ="http://192.168.10.10:3000/api/v1/".$api;        
        $url ="http://devalfe.net.kemari.co/apptotem/public/api/v1/".$api;
        $file_headers = @get_headers($url);
        if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') { 
            header("location:index");
            //echo '<script> window.location = "index"</script>'
        }
        else {
            $url ="http://devalfe.net.kemari.co/apptotem/public/api/v1/".$api;            
            $json = file_get_contents($url);
            $data = json_decode($json,true);
            return $data;
        }
        
    }

    static public function serviceAtractivoModels($id){
        //$url ="http://192.168.10.10:3000/api/v1/AtractivosApi/".$id; 
        $url ="http://devalfe.net.kemari.co/apptotem/public/api/v1/AtractivosApi/".$id;
        $file_headers = @get_headers($url);
        if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') { 
            header("location:index");
            //echo '<script> window.location = "index"</script>';
        }
        else {
            $url ="http://devalfe.net.kemari.co/apptotem/public/api/v1/AtractivosApi/".$id;
            $json = file_get_contents($url);      
            $data = json_decode($json,true);
            return $data;
        }         
        
    }
}
