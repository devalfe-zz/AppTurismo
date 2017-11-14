<?php
class cls_C_Template {
    //NOTE: llamada a la plantilla index.php
    static public function C_f_Plantilla(){
        include "views/template.php";
    }
    //NOTE: funcion enlaces a paginas
    static public function C_f_linkPages(){
        if(isset($_GET["action"])){
            $clink = $_GET["action"];
        }
        else {
            $clink = "inicio";
        }
        $action = M_linkpages::M_f_linkPages($clink);
        include $action;
    }
}
