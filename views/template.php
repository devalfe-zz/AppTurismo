<!DOCTYPE html>
<html lang="es">
<?php 
    include "templates/head.php"
?>

<body>
    <?php     
            $link = (new C_Controller) -> C_f_linkPages();
            //$link = (new Atractivos) -> selecionarAtractivosController();
            include "templates/footer.php";
    ?>
    <a data-scroll class="ir-arriba" href="#encabezado"><i class="fa fa-chevron-circle-up" aria-hidden="true"></i></a>
    <?php //include "templates/script.php"
            $link = (new C_Controller) -> C_f_scriptPages();
            ?>
</body>

</html>
