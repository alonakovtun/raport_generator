<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/classes/CsvGenerator.php');

class MemoryRaport implements RaportFactoryInterface
{
    public function generate() 
    {
        CsvGenerator::generateCsv('Memory');

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
