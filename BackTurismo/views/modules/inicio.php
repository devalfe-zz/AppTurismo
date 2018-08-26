<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:ingreso");

	exit();

}

include "views/modules/botonera.php";

include "views/modules/cabezote.php";

?>



    <!--=====================================

INICIO

======================================-->



    <div id="inicio" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">



        <div class="jumbotron">

            <h1>Bienvenidos</h1>

            <p>Bienvenidos al panel de control.</p>

        </div>



        <hr>



        <ul>
            <li class="botonesInicio">
                <a href="slide">
                    <div style="background:#e74c3c">
                        <span class="fa fa-toggle-right"></span>
                        <p>Slide</p>
                    </div>
                </a>
            </li>

            <li class="botonesInicio">
                <a href="articulos">
                    <div style="background:#2ecc71">
                        <span class="fa fa-file-text-o"></span>
                        <p>Atractivos Turisticos</p>
                    </div>
                </a>
            </li>

            <li class="botonesInicio">



                <a href="galeria">

                    <div style="background:#e67e22">

                        <span class="fa fa-image"></span>

                        <p>Imágenes</p>

                    </div>

                </a>



            </li>
            <li class="botonesInicio">



                <a href="videos">

                    <div style="background:#1abc9c">

                        <span class="fa fa-film"></span>

                        <p>Videos</p>

                    </div>

                </a>



            </li>
            <li class="botonesInicio">



                <a href="noticias">

                    <div style="background:#9b59b6">

                        <span class="fa fa-film"></span>

                        <p>Noticias</p>

                    </div>

                </a>



            </li>
            <li class="botonesInicio">



                <a href="gastronomia">

                    <div style="background:rgb(91, 192, 222)">

                        <span class="fa fa-film"></span>

                        <p>gastronomia</p>

                    </div>

                </a>



            </li>
            <li class="botonesInicio">



                <a href="servicios">

                    <div style="background:rgb(63, 144, 63)">

                        <span class="fa fa-film"></span>

                        <p>Servicios</p>

                    </div>

                </a>



            </li>
            <li class="botonesInicio">



                <a href="festividad">

                    <div style="background:rgb(46, 109, 164)">

                        <span class="fa fa-film"></span>

                        <p>Festival</p>

                    </div>

                </a>



            </li>
            <li class="botonesInicio">
                <a href="artesania">
                    <div style="background:rgb(245, 175, 75)">
                        <span class="fa fa-users"></span>
                        <p>Artesania</p>
                    </div>
                </a>
            </li>
            <li class="botonesInicio">



                <a href="suscriptores">

                    <div style="background:rgb(240, 173, 78)">

                        <span class="fa fa-users"></span>

                        <p>Suscriptores</p>

                    </div>

                </a>



            </li>
        </ul>



    </div>





    <!--====  Fin de INICIO  ====-->

