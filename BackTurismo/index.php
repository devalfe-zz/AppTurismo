<?php 
//ob_start();
//session_start();
define ('THEME_FOLDER','themes/admin');

require_once "controllers/ingreso.php";
require_once "controllers/gestorArticulos.php";
require_once "controllers/gestorGaleria.php";
require_once "controllers/gestorVideos.php";
require_once "controllers/gestorSlide.php";
require_once "controllers/gestorNoticias.php";
require_once "controllers/gestorGastronomia.php";
require_once "controllers/gestorServicios.php";
require_once "controllers/gestorFestividad.php";
require_once "controllers/gestorMensajes.php";
require_once "controllers/gestorSuscriptores.php";
require_once "controllers/gestorPerfiles.php";

require_once "models/gestorPerfiles.php";
require_once "models/gestorSuscriptores.php";
require_once "models/gestorMensajes.php";
require_once "models/gestorFestividad.php";
require_once "models/gestorServicios.php";
require_once "models/gestorGastronomia.php";
require_once "models/gestorNoticias.php";
require_once "models/gestorSlide.php";
require_once "models/gestorVideos.php";
require_once "models/gestorGaleria.php";
require_once "models/gestorArticulos.php";
require_once "models/ingreso.php";

require_once "models/enlaces.php";
require_once "controllers/template.php";
require_once "controllers/enlaces.php";

$template = (new TemplateController) -> template();
//ob_end_flush();
