<?php
$view = (new ServicioController)->ApiServices($_GET["id"]);
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

<section  id="model">
    <div class="container">
        <div class="row">';    
        
            foreach($view as $row => $item){     
            echo'<div class="items col-lg-4 col-md-6 grid-group-item">
                    <div class="thumbnail card-01 col-12">
                          <img class="group list-group-image d-block img-fluid" src="'.$_ENV['API_IMG'].PUBLIC_.$item["foto_url"].'" alt="'.$item["titulo"].'" />
                            <div class="caption">
                                <h4 class="group inner list-group-item-heading">'.$item["titulo"].'</h4>
                                <p class="group inner list-group-item-text">'.$item["descripcion"].'</p>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <p>'.$item["direccion"].'</p>
                                    </div>
                                <div class="col-12 col-md-6 d-flex btn-list">
                                        <a class="btn btn-success" href="index.php?action=lugares&id='.$item["id"].'">Más</a>
                                </div>
                            </div>
                        </div>
                     </div>
                </div>';
           } 
    echo'</div>
    </div>
</section>';
}