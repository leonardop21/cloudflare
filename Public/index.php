<?php

namespace Publics;

use Publics\CloudFlare;

require "../public/CloudFlare.php";

class Index extends CloudFlare{
    protected $cloudFlare;
    public function __construct(CloudFlare $cloudFlare)
    {
        $this->cloudFlare = $cloudFlare;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Limpar Cache CloudFlare</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>


<div class="container mt-5">
    <div class="row">
        <div class="col text-center">
            <h5>Limpar cache cloudflare</h5>
            <?php if(!is_null($message->clear())): ?>
                <div class="mt-5 alert alert-dismissible <?php echo $message->clear()['status'] == 200 ? 'alert-success' : 'alert-danger'?> ">
                    <h6><?php echo $message->clear()['message']; ?></h6>
                </div>
            <?php endif?>;
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="/index.php" method="post">
                <div class="form-group">
                    <label for="usr">URL: *</label>
                    <input name="url" type="text" class="form-control" required="required">
                </div>
                <button type="submit" class="btn btn-info">LIMPAR</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>