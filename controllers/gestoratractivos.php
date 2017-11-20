<?php

class Atractivos {
    static public function selecionarAtractivosController(){
        $repuesta = (new AtractivosModels)->selecionarAtractivosModels("dev7_atractivos_turismo");
        echo '<section>
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
                                <p class="card-text">'.$item ["introduccion"].'</p>
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

    static public function serviceAtractivosController(){
        $api="AtractivosApi";
        $resul = (new AtractivosModels)->serviceAtractivosModels($api);
        echo '<main class="container d-flex flex-wrap justify-content-center align-content-center align-items-center text-justify">
                    <section class="lugares">
                        <div class="row">';
        foreach($resul as $row => $item){
            echo
                '   <div class="col-md-4 d-flex" id="caja'.$item["id"].'">
                        <div class="card card-01">
                            <div id="carouselExampleControls'.$item["id"].'" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner" role="listbox">
                                    <div class="carousel-item active">
                                        <img class="d-block img-fluid" src=http://moqueguaturismo.gob.pe/'.$item["foto_url"].'></li>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block img-fluid" src=http://moqueguaturismo.gob.pe/'.$item["foto_url"].'></li>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block img-fluid" src=http://moqueguaturismo.gob.pe/'.$item["foto_url"].'></li>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="card-body">          
                                <h4 class="card-title">'.$item["titulo"].'</h4>
                                <p class="card-text">'.$item ["descripcion"].'</p>
                                <a href="#" class="btn btn-default text-uppercase">Explore</a>
                            </div>
                        </div>
                    </div>';   
        }
                    echo'</div>
                </section>
        </main>';

    }
    
}
