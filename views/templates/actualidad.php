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
                <div class="card">

                <img class="card-img-top" src="'.$_ENV['API_IMG'].PUBLIC_.$item['foto_url'].'" alt="">
                <h3><a class="m-2" href="index.php?action=lugares&id='.$item["id"].'">'.$item["titulo"].'</a></h3>
                <p class="d-flex m-2">'.$item["descripcion"].'</p>
                <a href="index.php?action=lugares&id='.$item["id"].'" class="btn btn-secondary">Mas Informacion</a>
                </div>
            </article>';
        }
    echo'</div>
        </div>
    </div>
</main>
';
