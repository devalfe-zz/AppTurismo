<?php
require_once "BackTurismo/models/conexion.php";
use GuzzleHttp\Client;

class AtractivosModels{
//$baseURL = "http://guiaturistica.moqueguaturismo.gob.pe/api/v1/";

    static public function selecionarAtractivosModels($tabla){

		$stmt = (new Conexion)->conectar()->prepare("SELECT id, titulo, introduccion, ruta,  rutai, rutaii, contenido FROM $tabla ORDER BY orden ASC");
        $stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();

    }

    static public function serviceAtractivosModels ($page){
        /* $api="atractivo";
        $url =  $_ENV['API_BASE'].$_ENV['API_URL'].$api.'?page='.$page;
        $file_headers = @get_headers($url);
        if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
            header("location:index");
            //echo '<script> window.location = "index"</script>';
        }
        else {
            $url = $_ENV['API_BASE'].$_ENV['API_URL'].$api.'?page='.$page;
            $json = file_get_contents($url);
            $data = json_decode($json,true);
            return $data;
        } */
        $url =  $_ENV['API_BASE'].$_ENV['API_URL'].'atractivo?page='.$page;
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $url);

        //*$response = $client->request('GET', 'http://guia-turistica.munimoquegua.gob.pe/public/api/v1/atractivo?page=1');
        //?echo $response->getStatusCode(); # 200
        //?echo $response->getHeaderLine('content-type'); # 'application/json; charset=utf8'
        return json_decode($response->getBody(),200); # '{"id": 1420053, "name": "guzzle", ...}'


    }

    static public function serviceAtractivoModels($id){

        /* $url =$_ENV['API_BASE'].$_ENV['API_URL'].'atractivo/'.$id;
        $file_headers = @get_headers($url);
        if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
            header("location:index");
            //echo '<script> window.location = "index"</script>';
        }
        else {
            $url =$_ENV['API_BASE'].$_ENV['API_URL'].'atractivo/'.$id;
            $json = file_get_contents($url);
            $data = json_decode($json,true);
            return $data;
        }
 */

        $client = new Client([
            'base_uri' =>
            $_ENV['API_BASE'].$_ENV['API_URL'].'atractivo/'.$id,
        ]);
        $response = $client->request('GET', $id);
        $data = json_decode($response->getBody()->getContents(),true);
        return $data;

    }
}
