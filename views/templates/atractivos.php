<div class="internas">
    <section class="bienvenidos">
        <?php include "views/templates/header.php";?>
        <div class="text-encabezado text-center">
            <div class="container">
                <h1 class="display-4 wow bounceIn">Atractivos turísticos</h1>
                <p class="wow bounceIn" data-wow-delay=".3s"></p>
            </div>
        </div>
    </section>
    <div class="ruta">
        <div class="container">
            <div class="bar col-12 text-right">
                <a href="index.php">Inicio</a> » Atractivos turísticos
            </div>
        </div>
    </div>
    <main class="atractivos">
        <div class="container">
            <h2 class="text-center">Atractivos turísticos</h2>
            <p class="text-justify">Moquegua es una tierra gentil, apacible y hospitalaria, amante de su historia y pujante por su porvenir. Su pasado se ve reflejado en los viejos muros, portadas, ventanas, balcones y techos de mojinete, en sus calles arqueadas y estrechas, iglesias, conventos y plazas.</p>

            <p class="text-justify">Moquegua posee una rica tradición gastronómica, por lo que podemos asegurar que en Moquegua se come bien, la más fina pastelería e incomparables piscos, vinos, licores y macerados. De fe religiosa, se venera a Santa Fortunata, virgen mártir del cristianismo (Moquegua), la Inmaculada Concepción (Samegua), la Virgen de la Candelaria (Torata) y a San Isidro Labrador (el valle del Ticsani). Posee un clima espectacular, considerado como el mejor del país. Es la ciudad ideal para el reposo y la contemplación. Su geografía, aunque agreste, es única e impresionante por el contraste de sus paisajes desde soleadas playas, finos arenales y estrechos valles, hasta tundras, nevados, volcanes, geiseres y lagunas. En ellas podremos observar la flora y fauna de cada piso altitudinal peruano.</p>
            <!-- Section Header End -->
        </div>
        <?php //$link = (new Atractivos) -> selecionarAtractivosController(); 
            $view = (new Atractivos)->serviceAtractivosController();
        ?>

</div>
</main>
</div>
