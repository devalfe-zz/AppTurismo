<?php
class GestorGaleria{
	#MOSTRAR IMAGEN GALERIA AJAX
	#------------------------------------------------------------
	public function mostrarImagenController($datos){
        list($ancho, $alto) = getimagesize($datos);
        //print_r($datos);
		if($ancho < 1024 || $alto < 768){
			echo 0;
		}
		else{
			$aleatorio = mt_rand(100, 999);
			$ruta = "../../themes/admin/images/galeria/temp/galeria".$aleatorio.".jpg";
            $origen = imagecreatefromjpeg($datos);
			$destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>1024, "height"=>768]);
			imagejpeg($destino, $ruta);
           	echo $ruta;
		}

    }
    
    public function  guardarGaleriaController(){
        if(isset($_POST["tituloImagen"])){
            $imagen = $_FILES["imagen"]["tmp_name"];
            $borrar = glob("themes/admin/images/galeria/temp/*");
            foreach($borrar as $file){
                unlink($file);
            }
            $aleatorio = mt_rand(100,999);
            $ruta = "themes/admin/images/galeria/galeria".$aleatorio.".jpg";
            $origen = imagecreatefromjpeg($imagen);
            $destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>1024, "height"=>768]);
            imagejpeg($destino,$ruta);
            
            $datosController = array("titulo"=>$_POST["tituloImagen"],
                                     "introduccion"=>$_POST["introImagen"]."...",
                                     "ruta"=>$ruta);
            $respuesta = GestorGaleriaModel::guardarGaleriaModel($datosController,"dev7_galeria_turismo");
            
            if($respuesta == "ok"){
				echo "<script>
					swal({
						  title: '¡OK!',
						  text: '¡La imagen ha sido creado correctamente!',
						  type: 'success',
						  confirmButtonText: 'Cerrar',
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = 'galeria';
							  } 
					});
				</script>";
			}
			else{
				echo $respuesta;
			}
        }
        
    }
    
    
	#MOSTRAR IMAGENES EN LA VISTA
	//#------------------------------------------------------------
    public function mostrarGaleriaController(){
        $respuesta = (new GestorGaleriaModel)->mostrarGaleriaModel("dev7_galeria_turismo");
        foreach($respuesta as $row => $item){
            echo '<li id="'.$item["id"].'" class="bloqueGaleria">
                    <span class="handleGaleria">
					<a href="index.php?action=galeria&idBorrar='.$item["id"].'&rutaImagen='.$item["ruta"].'">
					<i class="fa fa-times btn btn-danger"></i>
					</a>
					<i class="fa fa-pencil btn btn-primary editarGaleria"></i>	
					</span>
                    <div class="imgMostrar">
					<img id="img" src="'.$item["ruta"].'" class="img-thumbnail">
                    </div>
                    <h1>'.$item["titulo"].'</h1>
					<p>'.$item["introduccion"].'</p>';
        }
    }
    
    public function borrarGaleriaController(){
        if(isset($_GET["idBorrar"])){
            unlink($_GET["rutaImagen"]);
            $datosController = $_GET["idBorrar"];
            $respuesta = GestorGaleriaModel::borrarGaleriaModel($datosController, "dev7_galeria_turismo");
            
            if($respuesta == "ok"){

					echo'<script>

					swal({
						  title: "¡OK!",
						  text: "¡La imagen se ha borrado correctamente!",
						  type: "success",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = "galeria";
							  } 
					});


				</script>';

			}

        }
    }
    
    public function editarGaleriaController(){
        if(isset($_POST["editarTitulo"])){
            if(isset($_FILES["editarImagen"]["tmp_name"])){
                $imagen = $_FILES["editarImagen"]["tmp_name"];
                $aleatorio = mt_rand(100, 999);
                $ruta = "themes/admin/images/galeria/galeria".$aleatorio.".jpg";
                $origen = imagecreatefromjpeg($imagen); 
                $destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>1024, "height"=>768]);
                imagejpeg($destino, $ruta);
                
                $borrar = glob("themes/admin/images/galeria/temp/*"); 
                foreach($borrar as $file){ unlink($file); }
            }
            if($ruta=="" ){ 
                $ruta = $_POST["fotoAntigua"]; 
            } else{
                unlink($_POST["fotoAntigua"]); 
            }
            
            $datosController = array("id"=>$_POST["id"],
                                     "titulo"=>$_POST["editarTitulo"],
                                     "introduccion"=>$_POST["editarIntroduccion"]."...",
                                     "ruta"=>$ruta);
            $respuesta = GestorGaleriaModel::editarGaleriaModel($datosController,"dev7_galeria_turismo");
            if($respuesta == "ok"){

				echo'<script>

					swal({
						  title: "¡OK!",
						  text: "¡la Galeria ha sido actualizado correctamente!",
						  type: "success",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = "galeria";
							  } 
					});


				</script>';

			}

			else{

				echo $respuesta;

			}

        }
    }

    public function actualizarOrdenController($datos){
        GestorGaleriaModel::actualizarOrdenModel($datos, "dev7_galeria_turismo");
		$respuesta = GestorGaleriaModel::seleccionarOrdenModel("dev7_galeria_turismo");

		foreach($respuesta as $row => $item){
            echo '<li id="'.$item["id"].'" class="bloqueGaleria">
                    <span class="handleGaleria">
					<a href="index.php?action=galeria&idBorrar='.$item["id"].'&rutaImagen='.$item["ruta"].'">
					<i class="fa fa-times btn btn-danger"></i>
					</a>
					<i class="fa fa-pencil btn btn-primary editarGaleria"></i>	
					</span>
                    <div class="imgMostrar">
					<img id="img" src="'.$item["ruta"].'" class="img-thumbnail">
                    </div>
                    <h1>'.$item["titulo"].'</h1>
					<p>'.$item["introduccion"].'</p>';
        }
    }
    
    
    
}
