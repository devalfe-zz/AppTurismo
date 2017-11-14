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
GALERIA ADMINISTRABLE          
======================================-->

    <div id="seccionGaleria" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
        <button id="btnAgregarImagen" class="btn btn-info btn-lg">Agregar Imagenes</button>
        <div id="agregarImagen" style="display:none">
            <form method="post" enctype="multipart/form-data">
                <input name="tituloImagen" type="text" placeholder="Título de la imagen" class="form-control" required>
                <textarea name="introImagen" id="" cols="30" rows="5" placeholder="Descripción de la imagen" class="form-control" maxlength="170" required></textarea>
                <input type="file" name="imagen" class="form-control-file btn btn-default" id="subirImagen" required>
                <p><span class="fa fa-arrow-down"></span>(Tamaño recomendado: 1024px * 768px, peso permitido: 2Mb)</p>
                <div id="arrastreImagenGaleria"></div>
                <input type="submit" id="guardarGaleria" value="Guardar Galeria" class="btn btn-lg btn-primary">

            </form>
        </div>
        <?php 
            $imagenes = new GestorGaleria();
            $imagenes -> guardarGaleriaController();
        ?>
            <hr>
            <ul id="editarGaleria">
                <?php 
                $mostrarGaleria = new GestorGaleria();
                $mostrarGaleria -> mostrarGaleriaController();
                $mostrarGaleria -> borrarGaleriaController();
                $mostrarGaleria -> editarGaleriaController();
            ?>
            </ul>

            <button id="ordenarGaleria" class="btn btn-warning pull-right" style="margin:10px 30px">Ordenar Imágenes</button>

            <button id="guardarGaleria" class="btn btn-primary pull-right" style="margin:10px 30px; display:none">Guardar Orden Imágenes</button>

    </div>

    <!--====  Fin de GALERIA ADMINISTRABLE  ====-->
