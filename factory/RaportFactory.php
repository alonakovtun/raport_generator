<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/factory/GraphicCardsRaport.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/factory/ProcessorsRaport.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/factory/MemoryRaport.php');

class RaportFactory
{
    public function createRaport($category)
    {
        $raport = $category . "Raport";

        return new $raport();
    }
}


$raportFactory = new RaportFactory();
$raport = $raportFactory->createRaport($_POST['category']);
$raport->generate();

