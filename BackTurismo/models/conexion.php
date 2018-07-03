<?php

class Conexion{
	static public function conectar(){
        $server = $_ENV['DB_HOST']; 
        $user = $_ENV['DB_USERNAME'];
        $pass = $_ENV['DB_PASSWORD'];
        $db = $_ENV['DB_DATABASE']; 
        
        $conexion = new PDO ("mysql:host=".$server.";dbname=".$db."",$user,$pass);
        return $conexion;
	}
}
