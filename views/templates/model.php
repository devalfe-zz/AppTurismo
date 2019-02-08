<?php
$view = (new ServicioController)->ApiServices($_GET["id"]);
var_dump($view);
if (count($view)==0){
    $msg = '{"msg":"Datos no disponibles en la DB"}';
    $data = json_decode($msg, true);
    echo '
    <div class="internas" >
        <section class="bienvenidos">';
            include "views/templates/header.php";
            echo'<div class="text-encabezado text-center">
                    <div class="container">
                        <h1 class="display-4 wow slideInLeft">'.$data['msg'].'</h1>
                        <p class="wow bounceIn" data-wow-delay=".3s"></p>
                    </div>
                </div>
        </section>
        <div class="ruta">
            <div class="container">
                <row>
                    <div class=" bar col-12 text-right">
                        <a href="index.php">Inicio</a> »
                    </div>
                </row>
            </div>
        </div>

    <section  id="model">
        <div class="container">
            <div class="row">

            </div>
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

<main class="lugar py-2">
    <div class="container">
        <div class="row">';
            foreach($view as $row => $item){
           echo'<article class="col-lg-4 col-md-6">
                    <div class="card card-01">
                        <img class="card-img-top" src="'.$_ENV['API_IMG'].PUBLIC_.$item['foto_url'].'" alt="">
                        <div class="card-body">
                            <h4 class="card-title">'.$item["titulo"].'</h4>
                            <p class="card-text d-flex">'.$item["descripcion"].'</p>
                        </div>
                        <a href="index.php?action=lugares&id='.$item["id"].'" class="btn btn-secondary">Mas Informacion</a>
                    </div>
                </article>
           ';
           }
    echo'</div>
    </div>
</main>';
}
