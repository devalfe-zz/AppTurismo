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
    </main>
    <?php //?$link = (new Atractivos) -> selecionarAtractivosController();
        if(!$_GET){
            echo '<script> window.location = "index.php?action=atractivos&page=1"</script>';
            //?header('location:index');
        }
        echo '
        <main class="lugar py-2">
            <div class="container">
                <div class="row">';
                    $view = (new Atractivos)->serviceAtractivosController($_GET["page"]);
                    $prev_page_url = $view['prev_page_url'];
                    $next_page_url = $view['next_page_url'];
                    $current_page = $view['current_page'];
                    $last_page = $view['last_page'];
                    $total = $view['total'];
                    $per_page = $view['per_page'];
                    $page = $total/$per_page;
                    $page = ceil($page);
                    $lugares = $view['data'];
                    if($_GET['page']>$page || $_GET['page']<=0){
                        echo '<script> window.location = "index.php?action=atractivos&page=1"</script>';
                        //?header("location:atractivos");
                        exit();
                    }
                    foreach($lugares as $row => $item){
                    echo'<article class="col-lg-4 col-md-6">
                            <div class="card card-01">
                                <img class="card-img-top" src="'.$_ENV['API_IMG'].PUBLIC_.$item['foto_url'].'" alt="">
                                <div class="card-body">
                                    <h4 class="card-title">'.$item["titulo"].'</h4>
                                    <p class="card-text d-flex">'.$item["descripcion"].'</p>
                                </div>
                                <a href="index.php?action=lugares&id='.$item["id"].'" class="btn btn-secondary">Mas Informacion</a>
                            </div>
                        </article>';
                    }
                echo'
                </div>
                <nav aria-label="Page">
                        <ul class="pagination">
                            <li class="page-item';
                                if ( $prev_page_url == null ){ echo ' disabled'; }
                            echo'">
                                <a class="page-link" href="index.php?action=atractivos&page=';
                                echo $_GET["page"]-1; echo'" tabindex="-1">Previous</a>
                            </li>';
                            for ($i=0; $i < $page; $i++) {
                                echo'<li class="page-item ';
                                    echo $_GET["page"]==$i+1 ? ' active': ''; echo'">
                                     <a class="page-link"
                                        href="index.php?action=atractivos&page='; print ($i+1); echo'">';
                                            print ($i+1);
                                echo'</a>
                                </li>';
                            }
                            echo'<li class="page-item';
                                if ( $next_page_url == null ){ echo ' disabled'; }
                                echo '">
                                <a class="page-link" href="index.php?action=atractivos&page=';
                                echo $_GET["page"]+1; echo'">Next</a>
                            </li>
                        </ul>
                </nav>
            </div>
        </main>';
    ?>
</div>
