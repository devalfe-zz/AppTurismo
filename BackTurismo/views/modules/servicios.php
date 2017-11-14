<?php
session_start();
if(!$_SESSION["validar"]){
	header("location:ingreso");
	exit();
}
include "views/modules/botonera.php";
include "views/modules/cabezote.php";
?>
    <div id="seccionServicios" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
        <button id="btnAgregarServicios" class="btn btn-info btn-lg">Agregar servicios turísticos</button>
        <!--==== AGREGAR ARTÍCULO  ====-->
        <div id="agregarServicios" style="display:none">

            <form method="post" enctype="multipart/form-data">

                <input name="tituloServicios" type="text" placeholder="Título del servicio" class="form-control" required>
                <textarea name="introServicios" id="" cols="30" rows="5" placeholder="Introducción Servicios turísticos" class="form-control" maxlength="170" required></textarea>

                <input type="file" name="imagen0" class="form-control-file btn btn-default" id="subirServ" required>
                <p>Tamaño recomendado: 800px * 400px, peso máximo 2MB</p>
                <div id="arrastreImagenServicios"></div>

                <input type="file" name="imagen1" class="form-control-file btn btn-default" id="subirServ1" required>
                <p>Tamaño recomendado: 800px * 400px, peso máximo 2MB</p>
                <div id="arrastreImagenServicios1"></div>

                <input type="file" name="imagen2" class="form-control-file btn btn-default" id="subirServ2" required>
                <p>Tamaño recomendado: 800px * 400px, peso máximo 2MB</p>
                <div id="arrastreImagenServicios2"></div>

                <textarea name="contenidoServicios" id="" cols="30" rows="10" placeholder="Contenido del servicio turísticos" class="form-control" required></textarea>

                <input type="submit" id="guardarServicios" value="Guardar Servicios" class="btn btn-lg btn-primary">
            </form>
        </div>
        <?php
            $crearServicios = new GestorServicios();
            $crearServicios -> guardarServiciosController();
        ?>
            <hr>
            <!--==== EDITAR ARTÍCULO  ====-->
            <ul id="editarServicios">
                <?php
            $mostrarServicios = new GestorServicios();
            $mostrarServicios -> mostrarServiciossController();
            $mostrarServicios -> borrarServiciosController();
            $mostrarServicios -> editarServiciosController();
        ?>
            </ul>
            <button id="ordenarServicios" class="btn btn-warning pull-right" style="margin:10px 30px">Ordenar Servicios</button>
            <button id="guardarOrdenServicios" class="btn btn-primary pull-right" style="display:none; margin:10px 30px">Guardar Orden Servicios</button>
    </div>
    <!--====  Fin de ARTÍCULOS ADMINISTRABLE  ====-->
