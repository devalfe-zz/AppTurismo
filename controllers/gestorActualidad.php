<?php

class ActualidadController {
    static public function serviceActualidadController(){
        $api="lugares";
        $result = (new Restfull)->ClientResponseAll($api);
        return $result;
    }
}