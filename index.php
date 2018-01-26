<?php
require_once "models/model.php";
require_once "models/gestoratractivos.php";
require_once "models/gestorGaleria.php";
require_once "models/gestorMensajes.php";
//require_once "models/gestorPrograma.php";

require_once "controllers/controller.php";
require_once "controllers/gestoratractivos.php";
require_once "controllers/gestorGaleria.php";
require_once "controllers/gestorMensajes.php";
//require_once "controllers/gestorPrograma.php";

$cIndex = (new C_Controller) -> C_f_Plantilla();
