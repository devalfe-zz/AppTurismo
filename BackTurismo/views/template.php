<!DOCTYPE html>
<html lang="en">
<?php include('modules/head.php');?>
    <!---->

    <body oncontextmenu="return false" onkeydown="return true">
        <div class="container-fluid">
            <section class="row">
                <?php $modulos = (new Enlaces) -> enlacesController();?>
            </section>
        </div>
        <?php include ("modules/script.php");?>
    </body>

</html>
