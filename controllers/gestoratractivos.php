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
                                <a href="index.php?action=articulos&id="'.$item["id"].'" class="btn btn-default text-uppercase">Más</a>
                            </div>
                        </div>
                    </div>
                ';
        }
                echo'</div>
            </div>
        </section>';
    }

    static public function serviceAtractivosController($page){
        if(preg_match('/^[0-9]+$/',$page)){
            $result = (new AtractivosModels)->serviceAtractivosModels($page);
            $paginate = $result['first_page_url'];
            //?var_dump ($result);
            return $result;
        }

    }

    static public function serviceAtractivoController($id){
        if(preg_match('/^[0-9]+$/',$id)){
            $result = (new AtractivosModels)->serviceAtractivoModels($id);
            //?echo '<h2 class="text-center mt-2">'.$result["titulo"].'</h2>';
            return $result;
        }
    }
}
