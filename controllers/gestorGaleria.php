<?php

class Galeria
{
    public static function selecionarGaleriaController()
    {
        $repuesta = (new GaleriaModels())->selecionarGaleriaModels(
            "dev7_galeria_turismo"
        );
        foreach ($repuesta as $row => $item) {
            echo '<li>
                    <a  data-gallery="gallery" data-toggle="lightbox" data-title="' .
                $item["titulo"] .
                '" data-footer="' .
                $item["introduccion"] .
                '" href="BackTurismo/' .
                $item["ruta"] .
                '">
                    <img class="img-thumbnail" src="BackTurismo/' .
                $item["ruta"] .
                '">
                    </a>
                  </li>
            ';
        }
    }
}
