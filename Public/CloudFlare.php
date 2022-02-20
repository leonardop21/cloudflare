<?php

namespace Publics;

require "../vendor/autoload.php";

use Repository\CloudFlareRepository;

class CloudFlare{
    protected $cloudFlare;

    public function __construct(){
        $this->cloudFlare = new CloudFlareRepository();
    }

     public function clear(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(empty($_POST['url'])){
                return ['message' => "Por favor, preencha o campo URL", "status" => 500];
            }

            $url = $_POST['url'];
            $cloudFlare = new CloudFlareRepository();
            $response = $cloudFlare->clearCache($url);
            return  $this->message($response);
        }
    }

    public function message($response, $message = null, $status = null){
        if($response->success){
            isset($message) ? $message : "Cache limpo com sucesso";
            return ["message" => "Cache limpo com sucesso", "status" => 200];
        }
        return ['message' => "Ocorreu um erro ao limpar o cache: {$response->errors[0]->message}", "status" => 500];
    }

}

$message = new CloudFlare();
$message->clear();
