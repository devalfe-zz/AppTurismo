<div class="internas">
    <section class="bienvenidos">
        <?php include "views/templates/header.php";?>
        <div class="text-encabezado text-center">
            <div class="container">
                <?php
                $id_atractivo = $_GET["id"];
                if (is_numeric($id_atractivo)){
                    $view = (new Atractivos)->serviceAtractivoController($id_atractivo);
                    $foto = $view['fotos'];
                }
                else{
                    header("location:index");
                    //echo '<script> window.location = "index"</script>';
                }
                echo '<h1 class="display- 4 wow bounceIn">'.$view["titulo"].'</h1>
                <p class="wow bounceIn" data-wow-delay=".3s">'.$view["direccion"].' - '.$view["ubicacion"].' </p>
            </div>
        </div>
    </section>
    <div class="ruta">
        <div class="container">
            <div class="bar col-12 text-right">
                <a href="index.php">Inicio</a> » '.$view["titulo"].'
            </div>
        </div>
    </div>
    <main class="atractivos">
        <div class="container">
            <div class="row">
            <p class="text-justify mt-2">'.$view["detalle"].'</p>
            <div id="map" style="width:100%;height:360px;"></div>';?>
            <?php
            foreach($foto as $row => $item){
                echo '<div class="col-lg-3 col-sm-3 col-6 pb-3"  style="float: left;">
                    <a class="" href="'.$_ENV['API_IMG'].PUBLIC_.$item["foto_url"].'" data-fancybox="group" data-caption="'.$item["titulo"].'">
                    	<img class="w-100 img-thumbnail" data-position="'.$item["id"].'" src="'.$_ENV['API_IMG'].PUBLIC_.$item["foto_url"].'" alt="'.$item["titulo"].'">
			        </a>
		        </div>';
            }
            ?>
        <?php echo'
            </div>
            <div class="embed-responsive embed-responsive-16by9">
			    <video autoplay loop class="embed-responsive-item" controls="false">
				<source src="'.$_ENV['API_IMG'].PUBLIC_.$view["video_url"].'" allowfullscreen></source>
			</video></div>
        </div>
    </main>'?>
    <?php
    echo '
    <script>
        function initMap() {
            var point = {lat:'.$view["latitud"].', lng:'.$view["longitud"].'};
            var map = new google.maps.Map(document.getElementById("map"), {
                zoom: 16,
                center: point
            });
            var marker = new google.maps.Marker({
                position: point,
                map: map
            });
        }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD5zckljcogOGoZ0dKc0Lkefncg4GFUzyE&callback=initMap">
    </script>';?>
</div>
