<?php
class C_Controller{
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
            $clink = "index";
        }
        $action = (new  M_linkpages)->M_f_linkPages($clink);
        include $action;
    }
    
    static public function C_f_scriptPages(){
        if(isset($_GET["action"])){
            $cScript = $_GET["action"];
        }
        else {
            $cScript = "index";
        }
        $script = (new M_linkpages) -> M_f_scriptPages($cScript);
        include $script;
    }
}

