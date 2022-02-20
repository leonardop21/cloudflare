<?php 

namespace Services;

use Exception;

class SendRequestService {

    private $email;
    private $key;
    private $zone;

    public function __construct()
    {
        $this->email = "SEU EMAIL";
        $this->key = "SUA KEY";
        $this->zone = "ID ZONE";
        $this->baseURI= "https://api.cloudflare.com/client/v4/zones/";
    }
    
    public function clearCache($url){

        try{
            $cloudflare = [
                'files' => [
                    $url,
                        [  
                            'url' => $url,
                            'headers' => [ 'Origin' => 'https://www.cloudflare.com'],
                        ],
                ],
            ];

            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => "{$this->baseURI}{$this->zone}/purge_cache",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => json_encode($cloudflare),
                CURLOPT_HTTPHEADER => ["X-Auth-Email: {$this->email}", "X-Auth-Key: {$this->key}", "Content-Type: application/json"]
            ]);

            $response = curl_exec($curl);

            curl_close($curl);

            return json_decode($response);
        }catch(Exception $e){
            return $e->getMessage();
        }
    }
}