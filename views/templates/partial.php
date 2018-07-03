<?php
$view = (new ServicioController)->ApiServices($_GET["id"]);
    foreach ($view as $key => $value) {
        $categoria = $value['categorias'];
    } 
echo '
<div class="internas">
    <section class="bienvenidos">';
        include "views/templates/header.php";
        echo'<div class="text-encabezado text-center">
                <div class="container">
                    <h1 class="display-4 wow slideInLeft">'.$categoria['titulo'].'</h1>
                    <p class="wow bounceIn" data-wow-delay=".3s">ofrecemos una serie de opciones de transporte para satisfacer el gusto y presupuesto de cada viajero.</p>
                </div>
            </div>
    </section>
    <div class="ruta">
        <div class="container">
            <row>
                <div class="bar col-12 text-right">
                    <a href="index.php">Inicio</a> » Transporte
                </div>
            </row>
        </div>
    </div>
      
    <main class="container">
        <div class="row carousel-row">';
        foreach ($view as $key => $value) {
            $fotos = $value['fotos'];
            $count = count($fotos);
        echo'<div class="col-12 slide-row my-3">';
                if ($count == 0) {
                    echo'<div><div><img class="d-block img-thumbnail" src="'.PUBLIC_.$value['foto_url'].'" alt="'.$value['titulo'].'">';
                } else {     
                echo'
                <div id="carousel-'.$value['id'].'" class="carousel slide slide-carousel" data-ride="carousel">
                    <ol class="carousel-indicators">';
                        foreach ($fotos as $index => $foto) {
                        echo'<li data-target="#carousel-'.$value['id'].'" data-slide-to="'.$value['id'].'" class="active"></li>';
                        }
                    echo'
                    </ol>
                    <div class="carousel-inner" role="listbox">';
                        foreach ($fotos as $index => $foto) {
                            echo'    
                            <div class="carousel-item ';
                            if ($index == 0) {
                                echo ' active';
                            }
                            echo'">
                            <img class="d-block img-thumbnail" src="'.PUBLIC_.$foto['foto_url'].'" alt="'.$foto['titulo'].'">
                            </div>';
                        }
                }
               echo'</div> 
                </div>
                <div class="slide-content">
                    <ul class="nav nav-tabs" id="myTab'.$value['id'].'" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home'.$value['id'].'" role="tab" aria-controls="home" aria-selected="true">'.$value['titulo'].'</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile'.$value['id'].'" role="tab" aria-controls="profile" aria-selected="false">Dirección</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact'.$value['id'].'" role="tab" aria-controls="contact" aria-selected="false">Contacto</a>
                        </li>
                    </ul>
                    <div class="tab-content mx-4" id="myTabContent'.$value['id'].'">
                        <div class="tab-pane fade show active" id="home'.$value['id'].'" role="tabpanel" aria-labelledby="home-tab">'.$value['detalle'].'</div>
                        <div class="tab-pane fade" id="profile'.$value['id'].'" role="tabpanel" aria-labelledby="profile-tab">'.$value['ubicacion'].' - '.$value['direccion'].'</div>
                        <div class="tab-pane fade" id="contact'.$value['id'].'" role="tabpanel" aria-labelledby="contact-tab"><div id="map" style="width:100%;height:360px;"></div></div>
                    </div>
                </div>
            </div>';
            }
   echo'</div>      
    </main>                         
</div>';