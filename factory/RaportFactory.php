<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/factory/GraphicCardsRaport.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/factory/ProcessorsRaport.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/factory/MemoryRaport.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/factory/Creator.php');

class RaportFactory extends Creator
{
    public function createRaport($category): RaportFactoryInterface
    {
        $raport = $category . "Raport";

        return new $raport();
    }
}


$raportFactory = new RaportFactory();
$raport = $raportFactory->createRaport($_POST['category']);
$raport->generate();

