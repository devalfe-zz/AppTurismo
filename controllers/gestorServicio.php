<?php

class ServicioController {
    static public function ApiServices($id){
        $result = (new Restfull)->ClientResponseId($id);
        return $result;
    }
}