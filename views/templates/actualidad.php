<?php
$view = (new ActualidadController)->serviceActualidadController();

echo '
<section class="actualidad py-2">
    <div class="container">
        <h2 class="text-center font-weight-bold">Actualidad</h2>
        <div class="row">
            <div class="owl-card owl-carousel">';
        foreach ($view as $key => $item) {
        echo'<article class="card profile-card-5 d-flex flex-md-column">
                    <div class="card-img-block">
    		            <img class="card-img-top" src="'.$_ENV['API_IMG'].PUBLIC_.$item['foto_url'].'" alt="">
    		        </div>
                    <div class="card-block">
                        <h5 class="card-title">'.$item['titulo'].'</h5>
                    <p class="card-text">'.$item["descripcion"].'</p>
                    <a href="#" class="btnMas btn btn-secondary hidden-sm-down btn-block">Más información.</a>
                    </div>
            </article>';
        }
    echo'</div>
        </div>
    </div>
</section>';
