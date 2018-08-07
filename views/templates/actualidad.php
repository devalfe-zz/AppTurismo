<?php
$view = (new ActualidadController)->serviceActualidadController();

echo '
<main class="actualidad  py-2">
    <div class="container">
        <h2 class="text-center font-weight-bold">Actualidad</h2>
        <div class="row">
             <div class="owl-card owl-carousel">';
        foreach ($view as $key => $item) {
        echo'
            <article>
                <div class="card card-01">

                <img class="card-img-top" src="'.$_ENV['API_IMG'].PUBLIC_.$item['foto_url'].'" alt="">
                <div class="card-body">
                <h5  class="card-title">'.$item["titulo"].'</h5>
                <p class="card-text d-flex">'.$item["descripcion"].'</p>
                <a href="index.php?action=lugares&id='.$item["id"].'" class="btn btn-secondary">Mas Informacion</a>
                </div>
                </div>
            </article>';
        }
    echo'</div>
        </div>
    </div>
</main>
';
