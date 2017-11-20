<?php
class ProgramaModels{
    static public function serviceProgramaModels($api){
        $url = "http://www.munimoquegua.gob.pe/json/".$api;
        $json = file_get_contents($url);
        $data = json_decode($json,true);
        return $data['programa'];
    }
}