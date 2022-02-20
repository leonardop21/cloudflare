<?php 

namespace Repository;

require "../vendor/autoload.php";

require "../Interface/CacheInterface.php";

use CacheInterface;
use Services\SendRequestService;

class CloudFlareRepository implements CacheInterface{

   
    public function clearCache($url)
    {
        $sendClear = new SendRequestService();
        return  $sendClear->clearCache($url);
    }
}