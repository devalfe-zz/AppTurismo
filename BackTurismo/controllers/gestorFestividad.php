<?php
class GestorFestival{

	#MOSTRAR IMAGEN ARTÍCULO
	#------------------------------------------------------------
	public function mostrarImagenController($datos){
        
		list($ancho, $alto) = getimagesize($datos);
		if($ancho < 800 || $alto < 400){

			echo 0;

		}

		else{
			$aleatorio = mt_rand(100, 999);
			$ruta = "../../themes/admin/images/festival/temp/fes".$aleatorio.".jpg";
			$origen = imagecreatefromjpeg($datos);
			$destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>800, "height"=>400]);
			imagejpeg($destino, $ruta);
           	echo $ruta;
		}
	}
	#GUARDAR ARTICULO
	#-----------------------------------------------------------
	public function guardarFestivalController(){
		if(isset($_POST["tituloFestival"])){
            $color = array("primary", "success", "success1", "warning", "warning1", "danger", "info", "info1");
			$imagen = $_FILES["imagen"]["tmp_name"];
			$borrar = glob("themes/admin/images/festival/temp/*");
			foreach($borrar as $file){
				unlink($file);
			}
            $aleatorio = mt_rand(100, 999);
    		$ruta = "themes/admin/images/festival/fes".$aleatorio.".jpg";
            $origen = imagecreatefromjpeg($imagen);
            $destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>800, "height"=>400]);
            imagejpeg($destino,$ruta);
            $datosController = array("titulo"=>$_POST["tituloFestival"],                     
                                     "introduccion"=>$_POST["introFestival"]."...", 
                                     "ruta"=>$ruta,
                                     "inicio"=>$_POST["fechainiFestival"],
                                     "fin"=>$_POST["fechafinFestival"],
                                     "mes"=>$_POST["mesFestival"],
                                     "color"=>$color[array_rand($color)]);
			$respuesta = GestorFestivalModel::guardarFestivalModel($datosController, "dev7_festival_turismo");
          
			if($respuesta == "ok"){
				echo "<script>
					swal({
						  title: '¡OK!',
						  text: '¡El Festival turísticos ha sido creado correctamente!',
						  type: 'success',
						  confirmButtonText: 'Cerrar',
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = 'festividad';
							  } 
					});
				</script>";
			}
			else{
				echo $respuesta;
			}
		}
	}

	#MOSTRAR ARTICULOS
	#-----------------------------------------------------------
	public function mostrarFestivalsController(){
		$respuesta = (new GestorFestivalModel)->mostrarFestivalModel("dev7_festival_turismo");		
		foreach($respuesta as $row => $item) {
			echo '<li id="'.$item["id"].'" class="bloqueFestival">
					<span class="handleFestival">
					<a href="index.php?action=festividad&idBorrar='.$item["id"].'&rutaImagen='.$item["ruta"].'">
						<i class="fa fa-times btn btn-danger"></i>
					</a>
					<i class="fa fa-pencil btn btn-primary editarFestival"></i>	
					</span>
                    <div class="imgMostrar">
					<img id="img" src="'.$item["ruta"].'" class="img-thumbnail">
                    </div>
					<h1>'.$item["titulo"].'</h1>
					<p>'.$item["introduccion"].'</p>
                    <div>
					<p id="ini" class="bg-success">'.$item["inicio"].'</p>
					<p id="fin" class="bg-success">'.$item["fin"].'</p>
					<p id="mes" class="bg-success">'.$item["mes"].'</p>
                    </div>
                    <hr>
				</li>';

		}

	}

	#BORRAR ARTICULO
	#------------------------------------
	public function borrarFestivalController(){

		if(isset($_GET["idBorrar"])){

			unlink($_GET["rutaImagen"]);
          	$datosController = $_GET["idBorrar"];

			$respuesta = GestorFestivalModel::borrarFestivalModel($datosController, "dev7_festival_turismo");

			if($respuesta == "ok"){

					echo'<script>

					swal({
						  title: "¡OK!",
						  text: "¡El Atractivos turísticos se ha borrado correctamente!",
						  type: "success",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = "festividad";
							  } 
					});


				</script>';

			}
		}

	}

	#ACTUALIZAR ARTICULO
	#-----------------------------------------------------------
	public function editarFestivalController(){

		//$ruta = "";
       
		if(isset($_POST["editarTitulo"])){

			if(isset($_FILES["editarImagen"]["tmp_name"])){	

				$imagen = $_FILES["editarImagen"]["tmp_name"];
               
               
                    $aleatorio = mt_rand(100, 999);
                    $ruta = "themes/admin/images/festival/fes".$aleatorio.".jpg";
                    $origen = imagecreatefromjpeg($imagen); 
                    $destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>800, "height"=>400]);
                    imagejpeg($destino, $ruta);
                    
                    $borrar = glob("themes/admin/images/festival/temp/*"); 
                    foreach($borrar as $file){ unlink($file); }
               

			}
          
           
            if($ruta=="" ){ 
                $ruta = $_POST["fotoAntigua"]; 
            } else{
                unlink($_POST[ "fotoAntigua"]); 
            }
           
			$datosController = array("id"=>$_POST["id"],
			                         "titulo"=>$_POST["editarTitulo"],
								     "introduccion"=>$_POST["editarIntroduccion"]."...",
								     "ruta"=>$ruta,
                                     "inicio"=>$_POST["editarInicio"],
                                     "fin"=>$_POST["editarFin"],
                                     "mes"=>$_POST["editarMes"]);

			$respuesta = GestorFestivalModel::editarFestivalModel($datosController, "dev7_festival_turismo");

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  title: "¡OK!",
						  text: "¡El festival turísticos ha sido actualizado correctamente!",
						  type: "success",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = "festividad";
							  } 
					});


				</script>';

			}

			else{

				echo $respuesta;

			}

		}

	}

	#ACTUALIZAR ORDEN 
	#---------------------------------------------------
	public function actualizarOrdenController($datos){

		GestorFestivalModel::actualizarOrdenModel($datos, "dev7_festival_turismo");
		$respuesta = GestorFestivalModel::seleccionarOrdenModel("dev7_festival_turismo");

		foreach($respuesta as $row => $item){

			echo '<li id="'.$item["id"].'" class="bloqueFestival">
					<span class="handleFestival">
					<a href="index.php?action=festividad&idBorrar='.$item["id"].'&rutaImagen='.$item["ruta"].'">
						<i class="fa fa-times btn btn-danger"></i>
					</a>
					<i class="fa fa-pencil btn btn-primary editarFestival"></i>	
					</span>
                    <div class="imgMostrar">
					<img id="img" src="'.$item["ruta"].'" class="img-thumbnail">
                    </div>
					<h1>'.$item["titulo"].'</h1>
					<p>'.$item["introduccion"].'</p>
                    <div>
					<p id="ini" class="bg-success">'.$item["inicio"].'</p>
					<p id="fin" class="bg-success">'.$item["fin"].'</p>
					<p id="mes" class="bg-success">'.$item["mes"].'</p>
                    </div>
                    <hr>
				</li>';
		}

	}
	
}
