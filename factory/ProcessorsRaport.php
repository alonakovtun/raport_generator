<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/classes/CsvGenerator.php');

class ProcessorsRaport implements RaportFactoryInterface
{
    public function generate() 
    {
        CsvGenerator::generateCsv('Processors');

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
