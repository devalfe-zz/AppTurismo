<?php
    
require_once "conexion.php";

class M_Data  extends M_Conexion{
    
    public function M_f_Registro ($mDatos, $mTabla){
        $mStatement =  M_Conexion::M_f_ConexionBD()->prepare();
    }
}
?>
