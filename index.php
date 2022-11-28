<?php
  $url = "https://newsapi.org/v2/everything?domains=wsj.com&apiKey=f6d230ad85e0411295cb723f744251fb"; 
  $ch = curl_init($url); 
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  
  $arrResp = json_decode(curl_exec($ch));
  
  ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Notícias via API</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/main.css">
  </head>
  <body>
    <section class="container mt-2 mt-sm-5">
      <div class="row mx-auto">
        <div class="col-10 mx-auto">
          <?php
            //if(count($arrResp->articles)) {
            if ($arrResp->articles <> "") {
            foreach($arrResp->articles as $artigo) {
            ?>
          <div class="card p-2 p-sm-4 mb-1 mb-sm-3">
            <div class="card-image has-text-centered">
              <p class="author mb-0 font-weight-bold"><?=$artigo->author?></p>
              <Br>
              <p class="title mt-0"><?=$artigo->title?></p>
              <br>
              <p class="descripition"><?=$artigo->description?></p>
            </div>
          </div>
          <?php } }  else { ?>
          <strong>Nenhum pokemón retornado pela API</strong>
          <?php } ?>    
        </div>
      </div>
    </section>
    <script src="./assets/js/jquery-3.5.1.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
  </body>
</html>
