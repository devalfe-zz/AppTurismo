<?php
class GestorArticulos{

	#MOSTRAR IMAGEN ARTÍCULO
	#------------------------------------------------------------
	public function mostrarImagenController($datos){
        
		list($ancho, $alto) = getimagesize($datos);
		if($ancho < 800 || $alto < 400){

			echo 0;

		}

		else{

			$aleatorio = mt_rand(100, 999);
			$ruta = "../../themes/admin/images/articulos/temp/atractivo".$aleatorio.".jpg";
			$origen = imagecreatefromjpeg($datos);
			$destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>800, "height"=>400]);
			imagejpeg($origen, $ruta);
           	echo $ruta;
		}
	}
	#GUARDAR ARTICULO
	#-----------------------------------------------------------
	public function guardarArticuloController(){
		if(isset($_POST["tituloArticulo"])){
            $color = array("primary", "success", "success1", "warning", "warning1", "danger", "info", "info1");
			$ruta = array("","","");
            $longitud = count($ruta);
            $colorx = array_rand($color, 1);

            echo $colorx[0];
    
            for($i=0; $i<$longitud; $i++)
            {
            $imagen[$i] = $_FILES["imagen".$i]["tmp_name"];
			$borrar = glob("themes/admin/images/articulos/temp/*");
			foreach($borrar as $file){
				unlink($file);
			}
                $aleatorio = mt_rand(100, 999);
    			$ruta[$i] = "themes/admin/images/articulos/atractivo".$aleatorio.".jpg";
            
            $origen = imagecreatefromjpeg($imagen[$i]);
            $destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>800, "height"=>400]);
            imagejpeg($destino,$ruta[$i]);
           
            }
			$datosController = array("titulo"=>$_POST["tituloArticulo"],
                                     "direccion"=>$_POST["direccionArticulo"],
                                     "introduccion"=>$_POST["introArticulo"]."...",
                                     "ruta"=>$ruta[0], 
                                     "rutai"=>$ruta[1],
                                     "rutaii"=>$ruta[2],
                                     "contenido"=>$_POST["contenidoArticulo"],
                                     "color"=>$color[array_rand($color)]);
			$respuesta = GestorArticulosModel::guardarArticuloModel($datosController, "dev7_atractivos_turismo");
          
			if($respuesta == "ok"){
				echo "<script>
					swal({
						  title: '¡OK!',
						  text: '¡El Atractivos turísticos ha sido creado correctamente!',
						  type: 'success',
						  confirmButtonText: 'Cerrar',
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = 'articulos';
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
	public function mostrarArticulosController(){
		$respuesta = (new GestorArticulosModel)->mostrarArticulosModel("dev7_atractivos_turismo");		
		foreach($respuesta as $row => $item) {
			echo ' <li id="'.$item["id"].'" class="bloqueArticulo">
					<span class="handleArticle">
					<a href="index.php?action=articulos&idBorrar='.$item["id"].'&rutaImagen='.$item["ruta"].'&rutaImageni='.$item["rutai"].'&rutaImagenii='.$item["rutaii"].'">
						<i class="fa fa-times btn btn-danger"></i>
					</a>
					<i class="fa fa-pencil btn btn-primary editarArticulo"></i>	
					</span>
                    <div class="imgMostrar">
					<img id="img" src="'.$item["ruta"].'" class="img-thumbnail">
                    <img id="imgi" src="'.$item["rutai"].'" class="img-thumbnail">
                    <img id="imgii" src="'.$item["rutaii"].'" class="img-thumbnail">
                    </div>
					<h1>'.$item["titulo"].'</h1>
                    <h4>'.$item["direcion"].'</h4>
					<p>'.$item["introduccion"].'</p>
					<input type="hidden" value="'.$item["contenido"].'">
					<a href="#articulo'.$item["id"].'" data-toggle="modal">
					<button class="btn btn-default">Leer Más</button>
					</a>

					<hr>

				</li>

				<div id="articulo'.$item["id"].'" class="modal fade">
					<div class="modal-dialog modal-content">
						<div class="modal-header" style="border:1px solid #eee">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						 <h3 class="modal-title">'.$item["titulo"].'</h3>
			        	</div>

						<div class="modal-body" style="border:1px solid #eee">
			        
							<img src="'.$item["ruta"].'" width="100%" style="margin-bottom:20px">
							<p class="parrafoContenido">'.$item["contenido"].'</p>
			        
						</div>

						<div class="modal-footer" style="border:1px solid #eee">
			        
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        
						</div>

					</div>

				</div>';

		}

	}

	#BORRAR ARTICULO
	#------------------------------------
	public function borrarArticuloController(){

		if(isset($_GET["idBorrar"])){

			unlink($_GET["rutaImagen"]);
            unlink($_GET["rutaImageni"]);
            unlink($_GET["rutaImagenii"]);

			$datosController = $_GET["idBorrar"];

			$respuesta = GestorArticulosModel::borrarArticuloModel($datosController, "dev7_atractivos_turismo");

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
							    window.location = "articulos";
							  } 
					});


				</script>';

			}
		}

	}

	#ACTUALIZAR ARTICULO
	#-----------------------------------------------------------
	public function editarArticuloController(){

		//$ruta = "";
        $ruta = array("","","");
		if(isset($_POST["editarTitulo"])){

			if(isset($_FILES["editarImagen"]["tmp_name"])){	

				$imagen[0] = $_FILES["editarImagen"]["tmp_name"];
               
               
                    $aleatorio = mt_rand(100, 999);
                    $ruta[0] = "themes/admin/images/articulos/atractivo".$aleatorio.".jpg";
                    $origen = imagecreatefromjpeg($imagen[0]); 
                    $destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>800, "height"=>400]);
                    imagejpeg($destino, $ruta[0]);
                    
                    $borrar = glob("themes/admin/images/articulos/temp/*"); 
                    foreach($borrar as $file){ unlink($file); }
               

			}
            if(isset($_FILES["editarImageni"]["tmp_name"])){	

				$imagen[1] = $_FILES["editarImageni"]["tmp_name"];
                
               
                    $aleatorio = mt_rand(100, 999);
                    $ruta[1] = "themes/admin/images/articulos/atractivo".$aleatorio.".jpg";
                    $origen = imagecreatefromjpeg($imagen[1]); 
                    $destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>800, "height"=>400]);
                    imagejpeg($destino, $ruta[1]);
                    
                    $borrar = glob("themes/admin/images/articulos/temp/*"); 
                    foreach($borrar as $file){ unlink($file); }
               
			}
            
            if(isset($_FILES["editarImagenii"]["tmp_name"])){	

				$imagen[2] = $_FILES["editarImagenii"]["tmp_name"];

               
                    $aleatorio = mt_rand(100, 999);
                    $ruta[2] = "themes/admin/images/articulos/atractivo".$aleatorio.".jpg";
                    $origen = imagecreatefromjpeg($imagen[2]); 
                    $destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>800, "height"=>400]);
                    imagejpeg($destino, $ruta[2]);
                    
                    $borrar = glob("themes/admin/images/articulos/temp/*"); 
                    foreach($borrar as $file){ unlink($file); }
               

			}
            for($i=0; $i<3; $i++) {
                if($ruta[$i]=="" ){ 
                    $ruta[$i] = $_POST["fotoAntigua".(string)$i]; 
                } else{
                    unlink($_POST[ "fotoAntigua".(string)$i]); 
                }
            }

			$datosController = array("id"=>$_POST["id"],
			                         "titulo"=>$_POST["editarTitulo"],
 			                         "direccion"=>$_POST["editarDireccion"],
								     "introduccion"=>$_POST["editarIntroduccion"],
								     "ruta"=>$ruta[0],
                                     "rutai"=>$ruta[1],
                                     "rutaii"=>$ruta[2],
								     "contenido"=>$_POST["editarContenido"]);

			$respuesta = GestorArticulosModel::editarArticuloModel($datosController, "dev7_atractivos_turismo");

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  title: "¡OK!",
						  text: "¡El Atractivos turísticos ha sido actualizado correctamente!",
						  type: "success",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = "articulos";
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

		GestorArticulosModel::actualizarOrdenModel($datos, "dev7_atractivos_turismo");
		$respuesta = GestorArticulosModel::seleccionarOrdenModel("dev7_atractivos_turismo");

		foreach($respuesta as $row => $item){

			echo ' <li id="'.$item["id"].'" class="bloqueArticulo">
					<span class="handleArticle">
					<a href="index.php?action=articulos&idBorrar='.$item["id"].'&rutaImagen='.$item["ruta"].'&rutaImageni='.$item["rutai"].'&rutaImagenii='.$item["rutaii"].'">
						<i class="fa fa-times btn btn-danger"></i>
					</a>
					<i class="fa fa-pencil btn btn-primary editarArticulo"></i>	
					</span>
                    <div class="imgMostrar">
					<img id="img" src="'.$item["ruta"].'" class="img-thumbnail">
                    <img id="imgi" src="'.$item["rutai"].'" class="img-thumbnail">
                    <img id="imgii" src="'.$item["rutaii"].'" class="img-thumbnail">
                    </div>
					<h1>'.$item["titulo"].'</h1>
					 <h4>'.$item["direcion"].'</h4>
					<p>'.$item["introduccion"].'</p>
					<input type="hidden" value="'.$item["contenido"].'">
					<a href="#articulo'.$item["id"].'" data-toggle="modal">
					<button class="btn btn-default">Leer Más</button>
					</a>
					<hr>
				</li>
				<div id="articulo'.$item["id"].'" class="modal fade">
					<div class="modal-dialog modal-content">
						<div class="modal-header" style="border:1px solid #eee">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						 <h3 class="modal-title">'.$item["titulo"].'</h3>

						</div>
						<div class="modal-body" style="border:1px solid #eee">
       
							<img src="'.$item["ruta"].'" width="100%" style="margin-bottom:20px">
							<p class="parrafoContenido">'.$item["contenido"].'</p>
       
						</div>
						<div class="modal-footer" style="border:1px solid #eee">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        	</div>

					</div>

				</div>';

		}


	}
	
}
