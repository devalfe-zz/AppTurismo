<div class="internas">
    <section class="bienvenidos">
        <?php include "views/templates/header.php";?>
            <div class="text-encabezado text-center">
                <div class="container">
                    <h1 class="display-4 wow slideInLeft">Galeria</h1>
                    <p class="wow bounceIn" data-wow-delay=".3s">Moquegua - Galeria multimedia</p>
                </div>
            </div>
    </section>
    <div class="ruta">
        <div class="container">
            <div class=" bar col-12 text-right">
                <a href="index.html">Inicio</a> » Galeria
            </div>
        </div>
    </div>
    <section class="imagenes py-2">
        <div class="container-fluid">
            <h2 class="text-center font-weight-bold">Galeria multimedia</h2>
            <p class="text-center">Amantes de las playas, aficionados a la historia, apasionados de la tradición vitivinícola y la naturaleza.</p>
            <div class="row" id="galeria">
                <ul>
                    <?php $link = (new Galeria) -> selecionarGaleriaController(); ?>

            </div>
        </div>
    </section>
</div>
