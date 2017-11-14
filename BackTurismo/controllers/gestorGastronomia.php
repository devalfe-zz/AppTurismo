<?php
class GestorGastronomia{

	#MOSTRAR IMAGEN ARTÍCULO
	#------------------------------------------------------------
	public function mostrarImagenController($datos){
        
		list($ancho, $alto) = getimagesize($datos);
		if($ancho < 800 || $alto < 400){

			echo 0;

		}

		else{

			$aleatorio = mt_rand(100, 999);
			$ruta = "../../themes/admin/images/gastronomia/temp/gastro".$aleatorio.".jpg";
			$origen = imagecreatefromjpeg($datos);
			$destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>800, "height"=>400]);
			imagejpeg($destino, $ruta);
           	echo $ruta;
		}
	}
	#GUARDAR ARTICULO
	#-----------------------------------------------------------
	public function guardarGastronomiaController(){
		if(isset($_POST["tituloGastronomia"])){
            $color = array("primary", "success", "success1", "warning", "warning1", "danger", "info", "info1");
			$ruta = array("","");
            $longitud = count($ruta);
            $colorx = array_rand($color, 1);

            echo $colorx[0];
    
            for($i=0; $i<$longitud; $i++)
            {
            $imagen[$i] = $_FILES["imagen".$i]["tmp_name"];
			$borrar = glob("themes/admin/images/gastronomia/temp/*");
			foreach($borrar as $file){
				unlink($file);
			}
                $aleatorio = mt_rand(100, 999);
    			$ruta[$i] = "themes/admin/images/gastronomia/gastro".$aleatorio.".jpg";
            
            $origen = imagecreatefromjpeg($imagen[$i]);
            $destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>800, "height"=>400]);
            imagejpeg($destino,$ruta[$i]);
           
            }
			$datosController = array("titulo"=>$_POST["tituloGastronomia"], 
                                     "introduccion"=>$_POST["introGastronomia"]."...",
                                     "ruta"=>$ruta[0],
                                   "rutai"=>$ruta[1],
                                   "contenido"=>$_POST["contenidoGastronomia"],
                                    "color"=>$color[array_rand($color)]);
            
			$respuesta =  (new GestorGastronomiaModel)->guardarGastronomiaModel($datosController, "dev7_gastro_turismo");
          
			if($respuesta == "ok"){
				echo "<script>
					swal({
						  title: '¡OK!',
						  text: '¡ha sido creado correctamente!',
						  type: 'success',
						  confirmButtonText: 'Cerrar',
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = 'gastronomia';
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
	public function mostrarGastronomiasController(){
		$respuesta = (new GestorGastronomiaModel)->mostrarGastronomiaModel("dev7_gastro_turismo");		
		foreach($respuesta as $row => $item) {
			echo ' <li id="'.$item["id"].'" class="bloqueGastro">
					<span class="handleGastro">
					<a href="index.php?action=gastronomia&idBorrar='.$item["id"].'&rutaImagen='.$item["ruta"].'&rutaImageni='.$item["rutai"].'">
						<i class="fa fa-times btn btn-danger"></i>
					</a>
					<i class="fa fa-pencil btn btn-primary editarGastro"></i>	
					</span>
                    <div class="imgMostrar">
					<img id="img" src="'.$item["ruta"].'" class="img-thumbnail">
                    <img id="imgi" src="'.$item["rutai"].'" class="img-thumbnail">
                    
                    </div>
					<h1>'.$item["titulo"].'</h1>
					<p>'.$item["introduccion"].'</p>
					<input type="hidden" value="'.$item["contenido"].'">
					<a href="#gastro'.$item["id"].'" data-toggle="modal">
					<button class="btn btn-default">Leer Más</button>
					</a>

					<hr>

				</li>

				<div id="gastro'.$item["id"].'" class="modal fade">
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
	public function borrarGastronomiaController(){

		if(isset($_GET["idBorrar"])){

			unlink($_GET["rutaImagen"]);
            unlink($_GET["rutaImageni"]);
            
			$datosController = $_GET["idBorrar"];

			$respuesta = GestorGastronomiaModel::borrarGastronomiaModel($datosController, "dev7_gastro_turismo");

			if($respuesta == "ok"){

					echo'<script>

					swal({
						  title: "¡OK!",
						  text: "¡se ha borrado correctamente!",
						  type: "success",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = "gastronomia";
							  } 
					});


				</script>';

			}
		}

	}

	#ACTUALIZAR ARTICULO
	#-----------------------------------------------------------
	public function editarGastronomiaController(){

		//$ruta = "";
        $ruta = array("","","");
		if(isset($_POST["editarTitulo"])){

			if(isset($_FILES["editarImagen"]["tmp_name"])){	

				$imagen[0] = $_FILES["editarImagen"]["tmp_name"];
               
               
                    $aleatorio = mt_rand(100, 999);
                    $ruta[0] = "themes/admin/images/gastronomia/gastro".$aleatorio.".jpg";
                    $origen = imagecreatefromjpeg($imagen[0]); 
                    $destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>800, "height"=>400]);
                    imagejpeg($destino, $ruta[0]);
                    
                    $borrar = glob("themes/admin/images/gastronomia/temp/*"); 
                    foreach($borrar as $file){ unlink($file); }
               

			}
            if(isset($_FILES["editarImageni"]["tmp_name"])){	

				$imagen[1] = $_FILES["editarImageni"]["tmp_name"];
                
               
                    $aleatorio = mt_rand(100, 999);
                    $ruta[1] = "themes/admin/images/gastronomia/gastro".$aleatorio.".jpg";
                    $origen = imagecreatefromjpeg($imagen[1]); 
                    $destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>800, "height"=>400]);
                    imagejpeg($destino, $ruta[1]);
                    
                    $borrar = glob("themes/admin/images/gastronomia/temp/*"); 
                    foreach($borrar as $file){ unlink($file); }
               
			}
            
           
            for($i=0; $i<2; $i++) {
                if($ruta[$i]=="" ){ 
                    $ruta[$i] = $_POST["fotoAntigua".(string)$i]; 
                } else{
                    unlink($_POST[ "fotoAntigua".(string)$i]); 
                }
            }

			$datosController = array("id"=>$_POST["id"],
			                         "titulo"=>$_POST["editarTitulo"],
								     "introduccion"=>$_POST["editarIntroduccion"],
								     "ruta"=>$ruta[0],
                                     "rutai"=>$ruta[1],
                                  
								     "contenido"=>$_POST["editarContenido"]);

			$respuesta = GestorGastronomiaModel::editarGastronomiaModel($datosController, "dev7_gastro_turismo");

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  title: "¡OK!",
						  text: "¡ha sido actualizado correctamente!",
						  type: "success",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = "gastronomia";
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

		GestorGastronomiaModel::actualizarOrdenModel($datos, "dev7_gastro_turismo");
		$respuesta = GestorGastronomiaModel::seleccionarOrdenModel("dev7_gastro_turismo");

		foreach($respuesta as $row => $item){

			echo ' <li id="'.$item["id"].'" class="bloqueGastro">
					<span class="handleGastro">
					<a href="index.php?action=gastronomia&idBorrar='.$item["id"].'&rutaImagen='.$item["ruta"].'&rutaImageni='.$item["rutai"].'">
						<i class="fa fa-times btn btn-danger"></i>
					</a>
					<i class="fa fa-pencil btn btn-primary editarGastro"></i>	
					</span>
                    <div class="imgMostrar">
					<img id="img" src="'.$item["ruta"].'" class="img-thumbnail">
                    <img id="imgi" src="'.$item["rutai"].'" class="img-thumbnail">
                    
                    </div>
					<h1>'.$item["titulo"].'</h1>
					<p>'.$item["introduccion"].'</p>
					<input type="hidden" value="'.$item["contenido"].'">
					<a href="#gastro'.$item["id"].'" data-toggle="modal">
					<button class="btn btn-default">Leer Más</button>
					</a>

					<hr>

				</li>

				<div id="gastro'.$item["id"].'" class="modal fade">
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
