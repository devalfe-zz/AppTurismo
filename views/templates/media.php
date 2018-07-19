<?php
$view = (new ServicioController)->ApiServices($_GET["id"]);
if (count($view)==0 && $_GET["id"]==0){
    $view = (new ServicioController)->ApiServices('1');

    $msg = '{"msg":"Datos no disponibles en la DB"}';
    $data = json_decode($msg, true);
    echo '
    <div class="internas" >
        <section class="bienvenidos">';
            include "views/templates/header.php";
            echo'<div class="text-encabezado text-center">
                    <div class="container">
                        <h1 class="display-4 wow slideInLeft">Videos</h1>
                        <p class="wow bounceIn" data-wow-delay=".3s"></p>
                    </div>
                </div>
        </section>
        <div class="ruta">
            <div class="container">
                <row>
                    <div class=" bar col-12 text-right">
                        <a href="index.php">Inicio</a> » Videos
                    </div>
                </row>
            </div>
        </div>

    <section  id="model">
        <div class="container">
            <div class="row">';
                 foreach($view as $row => $item){
                echo'<div class="card">
                        <a data-fancybox="" data-width="640" data-height="360" href="'.$_ENV['API_IMG'].PUBLIC_.$item["video_url"].'">
                            <img class="card-img-top img-fluid" src="'.$_ENV['API_IMG'].PUBLIC_.$item["foto_url"].'">
                        </a>
                        <div class="card-body">
                            <p class="card-text">'.$item["titulo"].'</p>
                        </div>
                    </div>';
                }
       echo'</div>
        </div>
    </section>';
}
else{
foreach ($view as $key => $value) {
    $categoria = $value['categorias'];
}
echo '
<div class="internas" >
    <section class="bienvenidos">';
        include "views/templates/header.php";
        echo'<div class="text-encabezado text-center">
                <div class="container">
                    <h1 class="display-4 wow slideInLeft">'.$categoria['titulo'].'</h1>
                    <p class="wow bounceIn" data-wow-delay=".3s">Conoce la ciudad, su gente e historia.</p>
                </div>
            </div>
    </section>
    <div class="ruta">
        <div class="container">
            <row>
                <div class=" bar col-12 text-right">
                    <a href="index.php">Inicio</a> » '.$categoria['titulo'].'
                </div>
            </row>
        </div>
    </div>

<section  id="model">
    <div class="container">
        <div class="row">
            <div class="vision">';
            if ($_GET["id"]==1) {
                foreach($view as $row => $item){
                echo'<figure data-fancybox="images">
                    <img src="'.$_ENV['API_IMG'].PUBLIC_.$item["foto_url"].'" alt="" />
                    <figcaption>'.$item["titulo"].'<small></small></figcaption>
                </figure>';
               }
            }  if ($_GET["id"]==0) {
                 foreach($view as $row => $item){
                echo'<div class="card">
                        <a data-fancybox="" data-width="640" data-height="360" href="'.$_ENV['API_IMG'].PUBLIC_.$item["video_url"].'">
                            <img class="card-img-top img-fluid" src="'.$_ENV['API_IMG'].PUBLIC_.$item["foto_url"].'">
                        </a>
                        <div class="card-body">
                            <p class="card-text">'.$item["titulo"].'</p>
                        </div>
                    </div>';
                }
            }
        echo'</div>
        </div>
    </div>
</section>';
}
