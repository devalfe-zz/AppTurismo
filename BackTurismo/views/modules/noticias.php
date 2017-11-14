<?php
include "variables.php";
$theme = THEMEX; 
$root = ROOT; 
$temp = TEMP_N;
session_start();
if(!$_SESSION["validar"]){
	header("location:ingreso");
	exit();
}
include "views/modules/botonera.php";
include "views/modules/cabezote.php";
$datos = array($theme, $root, $temp);
?>
    <div id="seccionNoticias" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
        <button id="btnAgregarNoticias" class="btn btn-info btn-lg">Agregar Noticias</button>
        <div id="agregarNoticias" style="display:none">

            <form method="post" enctype="multipart/form-data">

                <input name="tituloNoticias" type="text" placeholder="Título de las Noticias" class="form-control" required>
                <textarea name="introNoticias" id="" cols="30" rows="5" placeholder="Descripcion de las Noticias" class="form-control" maxlength="170" required></textarea>
                <input type="file" name="imagen" class="form-control-file btn btn-default" id="subirNoticia" required>
                <p>Tamaño recomendado: 800px * 400px, peso máximo 2MB</p>
                <div id="arrastreImagen"></div>
                <textarea name="contenidoNoticias" id="" cols="30" rows="10" placeholder="Contenido de la Noticias" class="form-control" required></textarea>
                <input type="submit" id="guardarNoticias" value="Guardar Noticias" class="btn btn-lg btn-primary">
            </form>
        </div>
        <?php
            //echo THEME_FOLDER;
            $crearNoticias = new GestorNoticias();
            $crearNoticias -> guardarNoticiasController($datos);
        ?>
            <hr>
            <!--==== EDITAR ARTÍCULO  ====-->
            <ul id="editarNoticias">
                <?php
            $mostrarNoticias = new GestorNoticias();
            $mostrarNoticias -> mostrarNoticiasController();
            $mostrarNoticias -> borrarNoticiasController();
            $mostrarNoticias -> editarNoticiasController($datos);
        ?>
            </ul>
            <button id="ordenarNoticias" class="btn btn-warning pull-right" style="margin:10px 30px">Ordenar Noticias</button>
            <button id="guardarOrden" class="btn btn-primary pull-right" style="display:none; margin:10px 30px">Guardar Orden Noticias</button>
    </div>
    <!--====  Fin de ARTÍCULOS ADMINISTRABLE  ====-->
