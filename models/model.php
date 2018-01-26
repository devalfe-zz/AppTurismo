<?php 

class M_linkpages {

    static public function M_f_linkPages($mlink){

        if ( $mlink=="nosotros" ||
            $mlink=="servicio" ||
            $mlink=="atractivos" ||
            $mlink=="galeria" ||
            $mlink=="circuitos" ||
            $mlink=="nocturna" ||
            $mlink=="festividades" ||
            $mlink=="naturaleza" ||
            $mlink=="arquitectura" ||
            $mlink=="gastronomia" ||
            $mlink=="religiosidad" ||
            $mlink=="aventura" ||
            $mlink=="historia" ||
            $mlink=="contactenos" ||    
            $mlink=="prehispanica" ||   
            $mlink=="transporte" ||   
            $mlink=="alojamiento" ||   
            $mlink=="restaurante" ||   
            $mlink=="agencia" ||       
            $mlink=="inicio" ||       
            $mlink=="lugares" ||               
            $mlink=="folclore"                                                      
        ){
            $module = "views/templates/".$mlink.".php";
        }
        else if ($mlink == "index"){
            $module = "views/templates/inicio.php";        
        }
        else {
            $module = "views/templates/inicio.php";
        }
       return $module;    
    }
 

    static public function M_f_scriptPages($mScript){
        if ($mScript == "index"){
            $js = "views/templates/script.php";
        }
        else {
            $js = "views/templates/scripts.php";
        }
        return $js;     
    }

}

?>

