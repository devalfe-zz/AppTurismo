<?php
define ('PUBLIC_','/public/dist/');
define('DEV_ENV', 'development');

require_once 'vendor/autoload.php';

require_once "models/model.php";
require_once "models/gestoratractivos.php";
require_once "models/gestorGaleria.php";
require_once "models/gestorMensajes.php";
require_once "models/ServiceApi.php";
//require_once "models/gestorPrograma.php";

require_once "controllers/controller.php";
require_once "controllers/gestoratractivos.php";
require_once "controllers/gestorGaleria.php";
require_once "controllers/gestorMensajes.php";
require_once "controllers/gestorActualidad.php"; 
require_once "controllers/gestorServicio.php";

//require_once "controllers/gestorPrograma.php";

// if(DEV_ENV == 'development') {
//     $dotenv->load(dirname(__DIR__), 'dev.env');
// }
//$dotenv = new Dotenv\Dotenv($_SERVER['DOCUMENT_ROOT']);
$dotenv = new Dotenv\Dotenv( __DIR__ );
$dotenv->overload();
$cIndex = (new C_Controller)->C_f_Plantilla();
