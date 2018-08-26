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
                        <a href="" class="btn btn-secondary" data-toggle="modal" data-target="#Modal'.$item["id"].'">Mas Informacion</a>
                    </div>
                </div>
            </article>
            ';
        }
    echo'</div>
        </div>
    </div>
</main>';
foreach ($view as $key => $item) {
echo '<div class="modal fade" id="Modal'.$item["id"].'" tabindex="-1" role="dialog" aria-labelledby="'.$item["id"].'" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title" id="ModalLabel'.$item["id"].''.$item["id"].'">'.$item["titulo"].'</h5>
                    </div>
                    <div class="modal-body">
                        <img class="card-01 img-fluid" src="'.$_ENV['API_IMG'].PUBLIC_.$item['foto_url'].'" alt="">
                        <p class="text-justify"> '.$item["detalle"].'</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
            </div>';
}
