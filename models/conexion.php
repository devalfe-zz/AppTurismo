<?php 
class M_Conexion {
    public function M_f_ConexionBD () {
        $servidor = "munimoquegua.gob.pe"; //el servidor que utilizaremos, en este caso será el localhost
        $usuario = "munimoq_turismo2"; //El usuario que acabamos de crear en la base de datos
        $password = "MpMn2017#"; //La contraseña del usuario que utilizaremos
        $BD = "munimoq_turismo2"; //El nombre de la base de datos
        $cBD = new PDO ("mysql:host=".$servidor.";dbname=".$BD."","munimoq_turismo2",$password);
        var_dump($cBD);
        
        
    } 
}
$connect = new M_Conexion();
$connect -> M_f_ConexionBD();

?>
