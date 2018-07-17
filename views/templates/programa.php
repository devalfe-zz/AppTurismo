   <section class="container">
    <h2 class="text-center font-weight-bold mt-2">Personajes <spam> Ilustres</spam></h2>
        <div class="turismo">
            <div class="row">
                <div class="owl-carousel">
                <?php 
                        //$view = (new ProgramaController)->serviceProgramaController();
                        $view = (new ServicioController)->ApiServices('3');

                        foreach ($view as $key => $item) {
                            echo '
                            <article class="card-programa d-flex">
                                <div class="card">
                                    <img class="card-img-top" src='.$_ENV['API_IMG'].PUBLIC_.$item['foto_url'].' alt="">
                                    <div class="card-body m-2">
                                        <h5 class="card-title text-gray-dark">'.$item['titulo'].'</h5>
                                        <h6 class="card-subtitle mb2 text-muted">'.$item['descripcion'].'</h6>                   
                                        <hr/>
                                        <p class="card-text text-gray-dark">Lugar: '.$item['direccion'].'</p>
                                        <p class="card-text text-gray-dark">Fecha: '.$item['created_at'].'</p>
                                        <p class="card-text text-gray-dark">Hora: '.$item['updated_at'].'</p>         
                                    </div>
                                </div>
                            </article>
                            ';
                        }
 
                ?>
                </div>
            </div>
        </div>
    </section> 