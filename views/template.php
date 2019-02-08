
<?php
echo'<!DOCTYPE html>
<html lang="es">';
include "templates/head.php";
echo'<body>';
    $link = (new C_Controller) -> C_f_linkPages();
    include "templates/footer.php";
    $link = (new C_Controller) -> C_f_scriptPages();
echo'<a data-scroll class="ir-arriba" href="#encabezado"><i class="fa fa-chevron-circle-up" aria-hidden="true"></i></a>
</body>';
