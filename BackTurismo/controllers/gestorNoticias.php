<?php

class GestorNoticias{
	#MOSTRAR IMAGEN AJAX
	#------------------------------------------------------------
	public function mostrarImagenController($datos){
        list($ancho, $alto) = getimagesize($datos["imagenTemporal"]);
        
		if($ancho < 1024 || $alto < 768){
			echo 0;
		}
		else{
			$aleatorio = mt_rand(100, 999);
            $ruta = $datos["root"];
            $ruta .= $datos["theme"];
            $ruta .= $datos["temp"];
            $ruta .= $aleatorio;
            $ruta .= ".jpg";
            $origen = imagecreatefromjpeg($datos["imagenTemporal"]);
			$destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>1024, "height"=>768]);
			imagejpeg($destino, $ruta);
           	echo $ruta;
		}

    }
    
    public function guardarNoticiasController($datos){
        if(isset($_POST["tituloNoticias"])){
            $imagen = $_FILES["imagen"]["tmp_name"];
            $borrar = glob("themes/admin/images/noticias/temp/*");
            foreach($borrar as $file){
                unlink($file);
            }
            $aleatorio = mt_rand(100,999);
            $ruta = $datos[0];
            $ruta .= substr($datos[2],0,-12);
            $ruta .= substr($datos[2],22);
            $ruta .= $aleatorio;
            $ruta .= ".jpg";
            //print_r($ruta);
            
            $origen = imagecreatefromjpeg($imagen);
            $destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>1024, "height"=>768]);
            imagejpeg($destino,$ruta);
            $datosController = array("titulo"=>$_POST["tituloNoticias"],
                                     "introduccion"=>$_POST["introNoticias"]."...",
                                     "ruta"=>$ruta,
                                    "contenido"=>$_POST["contenidoNoticias"]);
			$respuesta = GestorNoticiasModel::guardarNoticiasModel($datosController, "dev7_noticias_turismo");
            
            if($respuesta == "ok"){
				echo "<script>
					swal({
						  title: '¡OK!',
						  text: '¡La noticia ha sido creado correctamente!',
						  type: 'success',
						  confirmButtonText: 'Cerrar',
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = 'noticias';
							  } 
					});
				</script>";
			}
			else{
				echo $respuesta;
			}

        }

    }
    
    public function mostrarNoticiasController(){
        $respuesta = (new GestorNoticiasModel)->mostrarNoticiasModel("dev7_noticias_turismo");
        foreach($respuesta as $row => $item){
            echo '<li id="'.$item["id"].'" class="bloqueNoticias">
                    <span class="handleNoticias">
					<a href="index.php?action=noticias&idBorrar='.$item["id"].'&rutaImagen='.$item["ruta"].'">
					<i class="fa fa-times btn btn-danger"></i>
					</a>
					<i class="fa fa-pencil btn btn-primary editarNoticia"></i>	
					</span>
                    <div class="imgMostrar">
					<img id="img" src="'.$item["ruta"].'" class="img-thumbnail">
                    </div>
                    <h1>'.$item["titulo"].'</h1>
					<p>'.$item["introduccion"].'</p>
                    <input type="hidden" value="'.$item["contenido"].'">
					<a href="#noticia'.$item["id"].'" data-toggle="modal">
					<button class="btn btn-default">Leer Más</button>
					</a>
					<hr>

				</li>
				<div id="noticia'.$item["id"].'" class="modal fade">
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
    
    public function borrarNoticiasController(){
        if(isset($_GET["idBorrar"])){
            unlink($_GET["rutaImagen"]);
            $datosController = $_GET["idBorrar"];
            $respuesta = GestorNoticiasModel::borrarNoticiasModel($datosController, "dev7_noticias_turismo");
            
            if($respuesta == "ok"){

					echo'<script>

					swal({
						  title: "¡OK!",
						  text: "¡La noticia se ha borrado correctamente!",
						  type: "success",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = "noticias";
							  } 
					});


				</script>';

			}

        }
    }
    
    
     public function editarNoticiasController($datos){
        if(isset($_POST["editarTitulo"])){
            if(isset($_FILES["editarImagen"]["tmp_name"])){
                $imagen = $_FILES["editarImagen"]["tmp_name"];
                $aleatorio = mt_rand(100, 999);
                $ruta = $datos[0];
                $ruta .= substr($datos[2],0,-12);
                $ruta .= substr($datos[2],22);
                $ruta .= $aleatorio;
                $ruta .= ".jpg";
                #$ruta = "themes/admin/images/galeria/galeria".$aleatorio.".jpg";
                $origen = imagecreatefromjpeg($imagen); 
                $destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>1024, "height"=>768]);
                imagejpeg($destino, $ruta);
                
                $borrar = glob("themes/admin/images/noticias/temp/*"); 
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
                                     "ruta"=>$ruta,
                                     "contenido"=>$_POST["editarContenido"]);
            $respuesta = GestorNoticiasModel::editarNoticiasModel($datosController,"dev7_noticias_turismo");
            if($respuesta == "ok"){

				echo'<script>

					swal({
						  title: "¡OK!",
						  text: "¡la Noticia ha sido actualizada correctamente!",
						  type: "success",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = "noticias";
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

		GestorNoticiasModel::actualizarOrdenModel($datos, "dev7_noticias_turismo");
		$respuesta = GestorNoticiasModel::seleccionarOrdenModel("dev7_noticias_turismo");

		foreach($respuesta as $row => $item){ 
			 echo '<li id="'.$item["id"].'" class="bloqueNoticias">
                    <span class="handleNoticias">
					<a href="index.php?action=noticias&idBorrar='.$item["id"].'&rutaImagen='.$item["ruta"].'">
					<i class="fa fa-times btn btn-danger"></i>
					</a>
					<i class="fa fa-pencil btn btn-primary editarNoticia"></i>	
					</span>
                    <div class="imgMostrar">
					<img id="img" src="'.$item["ruta"].'" class="img-thumbnail">
                    </div>
                    <h1>'.$item["titulo"].'</h1>
					<p>'.$item["introduccion"].'</p>
                    <input type="hidden" value="'.$item["contenido"].'">
					<a href="#noticia'.$item["id"].'" data-toggle="modal">
					<button class="btn btn-default">Leer Más</button>
					</a>
					<hr>

				</li>
				<div id="noticia'.$item["id"].'" class="modal fade">
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
