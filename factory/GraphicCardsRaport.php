<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/classes/CsvGenerator.php');

class GraphicCardsRaport implements RaportFactoryInterface
{
    public function generate()
    {
        CsvGenerator::generateCsv('Graphic cards');

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
