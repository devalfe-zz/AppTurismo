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

    static public function serviceAtractivosController(){
        $api="atractivo";
        //$var="grid";
        $resul = (new AtractivosModels)->serviceAtractivosModels($api);
        $lugares = $resul['data'];
        //var_dump ($lugares);
        echo '<div class="container">
                <div id="products" class="row list-group d-flex" style="float-right">';
                    foreach($lugares as $row => $item){
                    echo'<div class="items col-lg-4 col-md-6 grid-group-item">
                        <div class="thumbnail card-01 col-12">
                            <img class="group list-group-image d-block img-fluid" src="'.$_ENV['API_IMG'].PUBLIC_.$item["foto_url"].'" alt="'.$item["titulo"].'"/>
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
           echo '</div>
        </div>
';

        // echo '<main class="container d-flex flex-wrap justify-content-center align-content-center align-items-center text-justify">
        //         <div class="well well-sm">
        //                     <strong>Display</strong>
        //                     <div class="btn-group">
        //                         <a href="#"'; $clink='list'; echo'id="list" class="btn btn-default">
        //                         <span class="fa fa-list"></span>List</a>
        //                         <a href="#"'; $clink='grid'; echo' id="grid" class="btn btn-default">
        //                         <span class="fa fa-address-card"></span>Grid</a>
        //                     </div>
        //                 </div>
        //             <section class="lugares">
        //                 <div class="row">
        //                 ';
        //                 foreach($resul as $row => $item){
        //                     echo '<div class="row carousel-row">
        //                     <div class="col-12 slide-row">
        //                             <div id="carousel-'.$item["id"].'" class="carousel slide slide-carousel" data-ride="carousel">
        //                                 <ol class="carousel-indicators">
        //                                     <li data-target="#carousel-'.$item["id"].'" data-slide-to="0" class="active"></li>
        //                                     <li data-target="#carousel-'.$item["id"].'" data-slide-to="1"></li>
        //                                     <li data-target="#carousel-'.$item["id"].'" data-slide-to="2"></li>
        //                                 </ol>
        //                                 <div class="carousel-inner" role="listbox">
        //                                     <div class="carousel-item active">
        //                                         <img class="d-block img-thumbnail" src="http://moqueguaturismo.gob.pe/'.$item["foto_url"].'" alt="Image">
        //                                     </div>
        //                                     <div class="carousel-item">
        //                                         <img class="d-block img-thumbnail" src="http://moqueguaturismo.gob.pe/'.$item["foto_url"].'" alt="Image">
        //                                     </div>
        //                                     <div class="carousel-item">
        //                                         <img class="d-block img-thumbnail" src="http://moqueguaturismo.gob.pe/'.$item["foto_url"].'" alt="Image">
        //                                     </div>
        //                                 </div>
        //                             </div>
        //                             <div class="slide-content">
        //                                 <h4>'.$item["titulo"].'</h4>
        //                                 <p>'.$item ["descripcion"].'</p>
        //                             </div>
        //                             <div class="slide-footer">
        //                                 <span class="pull-right buttons">
        //                                     <a href="index.php?action=lugares&id='.$item["id"].'"class="btn btn-outline-primary">Más</a>
        //                                 </span>
        //                             </div>
        //                         </div>
        //                     </div>';
        //                     //foreach($resul as $row => $item){
        //                         echo '<div class="col-md-4 d-flex" id="caja'.$item["id"].'">
        //                         <div class="card card-01">
        //                             <div id="carouselExampleControls'.$item["id"].'" class="carousel slide" data-ride="carousel">
        //                                 <div class="carousel-inner" role="listbox">
        //                                     <div class="carousel-item active">
        //                                         <img class="d-block img-fluid" src=http://moqueguaturismo.gob.pe/'.$item["foto_url"].'></li>
        //                                     </div>
        //                                     <div class="carousel-item">
        //                                         <img class="d-block img-fluid" src=http://moqueguaturismo.gob.pe/'.$item["foto_url"].'></li>
        //                                     </div>
        //                                     <div class="carousel-item">
        //                                         <img class="d-block img-fluid" src=http://moqueguaturismo.gob.pe/'.$item["foto_url"].'></li>
        //                                     </div>
        //                                 </div>
        //                             </div>
        //                             <div class="card-body">
        //                                 <h4 class="card-title">'.$item["titulo"].'</h4>
        //                                 <p class="card-text">'.$item ["descripcion"].'</p>
        //                                 <a href="index.php?action=lugares&id='.$item["id"].'"class="btn btn-outline-primary">Más</a>
        //                             </div>
        //                         </div>
        //                     </div>';
        //                     //}
        //                 }
        //                     echo'</div>
        //         </section>
        // </main>';

    }

    static public function serviceAtractivoController($id){
        if(preg_match('/^[0-9]+$/',$id)){
            $result = (new AtractivosModels)->serviceAtractivoModels($id);
            //echo '<h2 class="text-center mt-2">'.$result["titulo"].'</h2>';
            return $result;
        }
    }
}
