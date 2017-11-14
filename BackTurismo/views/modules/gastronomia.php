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
    <div id="seccionGastronomia" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
        <button id="btnAgregarGastronomia" class="btn btn-info btn-lg">Agregar Gastronomia</button>
        <!--==== AGREGAR ARTÍCULO  ====-->
        <div id="agregarGastronomia" style="display:none">

            <form method="post" enctype="multipart/form-data">

                <input name="tituloGastronomia" type="text" placeholder="Título Gastronomico" class="form-control" required>
                <textarea name="introGastronomia" id="" cols="30" rows="5" placeholder="Descripcioin Gastronomica" class="form-control" maxlength="170" required></textarea>

                <input type="file" name="imagen0" class="form-control-file btn btn-default" id="subirGastro" required>
                <p>Tamaño recomendado: 800px * 400px, peso máximo 2MB</p>
                <div id="arrastreImagenGastronomia"></div>

                <input type="file" name="imagen1" class="form-control-file btn btn-default" id="subirGastro1" required>
                <p>Tamaño recomendado: 800px * 400px, peso máximo 2MB</p>
                <div id="arrastreImagenGastronomia1"></div>

                <textarea name="contenidoGastronomia" id="" cols="30" rows="10" placeholder="Contenido Gastronomico" class="form-control" required></textarea>

                <input type="submit" id="guardarGastronomia" value="Guardar Gastronomia" class="btn btn-lg btn-primary">
            </form>
        </div>
        <?php
            $crearGastronomia = new GestorGastronomia();
            $crearGastronomia -> guardarGastronomiaController();
        ?>
            <hr>
            <!--==== EDITAR ARTÍCULO  ====-->
            <ul id="editarGastro">
                <?php
            $mostrarGastronomia = new GestorGastronomia();
            $mostrarGastronomia -> mostrarGastronomiasController();
            $mostrarGastronomia -> borrarGastronomiaController();
            $mostrarGastronomia -> editarGastronomiaController();
        ?>
            </ul>
            <button id="ordenarGastronomia" class="btn btn-warning pull-right" style="margin:10px 30px">Ordenar Contenido</button>
            <button id="guardarOrdenGastronomia" class="btn btn-primary pull-right" style="display:none; margin:10px 30px">Guardar Orden </button>
    </div>
    <!--====  Fin de ARTÍCULOS ADMINISTRABLE  ====-->
