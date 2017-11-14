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
ARTÍCULOS ADMINISTRABLE          
======================================-->
    <div id="seccionFestival" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
        <button id="btnAgregarFestival" class="btn btn-info btn-lg">Agregar Festival turísticos</button>
        <!--==== AGREGAR ARTÍCULO  ====-->
        <div id="agregarFestival" style="display:none">

            <form method="post" enctype="multipart/form-data">
                <input name="tituloFestival" type="text" placeholder="Título del Festival turísticos" class="form-control" required>
                <textarea name="introFestival" id="" cols="30" rows="5" placeholder="Introducción del Festival turísticos" class="form-control" maxlength="500" required></textarea>
                <input type="file" name="imagen" class="form-control-file btn btn-default" id="subirFes" required>
                <p>Tamaño recomendado: 800px * 400px, peso máximo 2MB</p>
                <div id="arrastreImagenFestival"></div>
                <input name="fechainiFestival" id="" type="text" placeholder="Fecha de inicio del festival turísticos" class="form-control" required>
                <input name="fechafinFestival" id="" type="text" placeholder="Fecha de final del festival turísticos" class="form-control" required>
                <input name="mesFestival" id="" type="text" placeholder="mes del festivall turísticos" class="form-control" required>
                <input type="submit" id="guardarFestival" value="Guardar Festival" class="btn btn-lg btn-primary">
            </form>
        </div>
        <?php
            $crearFestival = new GestorFestival();
            $crearFestival -> guardarFestivalController();
        ?>
            <hr>
            <!--==== EDITAR ARTÍCULO  ====-->
            <ul id="editarFestival">
                <?php
            $mostrarFestival = new GestorFestival();
            $mostrarFestival -> mostrarFestivalsController();
            $mostrarFestival -> borrarFestivalController();
            $mostrarFestival -> editarFestivalController();
        ?>
            </ul>
            <button id="ordenarFestival" class="btn btn-warning pull-right" style="margin:10px 30px">Ordenar Festival</button>
            <button id="guardarOrdenFestival" class="btn btn-primary pull-right" style="display:none; margin:10px 30px">Guardar Orden Festival</button>
    </div>
    <!--====  Fin de ARTÍCULOS ADMINISTRABLE  ====-->
