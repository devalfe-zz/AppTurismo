<?php

class Atractivos {
    static public function selecionarAtractivosController(){
        $repuesta = (new AtractivosModels)->selecionarAtractivosModels("dev7_atractivos_turismo");
        echo ' <section>
                    <div class="container">
                        <div class="row">';
        foreach($repuesta as $row => $item){
            echo
                '   <div class="col-md-4" id="caja'.$item["id"].'">
                        <div class="card card-01">
                            <div id="carouselExampleControls'.$item["id"].'" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner" role="listbox">
                                    <div class="carousel-item active">
                                        <img class="d-block img-fluid" src=http://moqueguaturismo.gob.pe/BackTurismo/'.$item["ruta"].'></li>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block img-fluid" src=http://moqueguaturismo.gob.pe/BackTurismo/'.$item["rutai"].'></li>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block img-fluid" src=http://moqueguaturismo.gob.pe/BackTurismo/'.$item["rutaii"].'></li>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="card-body">
                                
                                <h4 class="card-title">'.$item["titulo"].'</h4>
                                <p class="card-text">'.$item ["contenido"].'</p>
                                <a href="#" class="btn btn-default text-uppercase">Explore</a>
                            </div>
                        </div>
                    </div>            
                ';   
        }
        echo'</div>
        </div>
</section>';
    }
    
}
