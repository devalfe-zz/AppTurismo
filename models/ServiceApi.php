<?php

use GuzzleHttp\Client;
class Restfull{
    static public function ClientResponseAll($api)
    {
        $client = new Client([
            'base_uri' =>  $_ENV['API_BASE'].$_ENV['API_URL'],
            //!'timeout'  => 2.0,
        ]);
        $response = $client->request('GET', $api);
        $data = json_decode ($response->getBody(),200);
        return $data;
    }
    static public function ClientResponseId($id)
    {
        $client = new Client([
            'base_uri' =>  $_ENV['API_BASE'].$_ENV['API_URL'].'categoria/',
            //!'timeout'  => 2.0,
        ]);
        $response = $client->request('GET', $id);
        //?json_decode(json_encode($data),true);
        $data = json_decode($response->getBody()->getContents(),true);
        return $data;

    }
}
