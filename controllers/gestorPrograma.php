<?php
class ProgramaController{
    static public function serviceProgramaController(){
        $api = "programa-todo";
        $programa = (new ProgramaModels)->serviceProgramaModels($api);
        //print_r($programa[0]);
        //$evento = $programa['evento'];       
        foreach ($programa as $evento) {
            
            foreach ($evento as $key => $value) {
                 //echo $value['title'];
                $image = $value['field_imagen_programa'];                 
                //print_r ($value['field_imagen_programa']);
                echo '
                <article class="card-programa d-flex">
                    <div class="card">
                        <img class="card-img-top" src='.$image['src'].' alt="">
                        <div class="card-body m-2">
                            <h5 class="card-title text-gray-dark">'.$value['title'].'</h5>
                            <h6 class="card-subtitle mb2 text-muted">'.$value['field_organiza_programa'].'</h6>                   
                            <hr/>
                            <p class="card-text text-gray-dark">Lugar: '.$value['field_lugar_programa'].'</p>
                            <p class="card-text text-gray-dark">Fecha: '.$value['field_fecha_programa'].'</p>
                            <p class="card-text text-gray-dark">Hora: '.$value['field_fecha_programa_1'].'</p>         
                        </div>
                    </div>
                </article>
                ';
            }
        }
        
    }
}