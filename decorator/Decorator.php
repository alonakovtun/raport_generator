<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/interfaces/RaportFactoryInterface.php');

class Decorator implements CsvFormatterInterface
{
    protected $raport;

    public function __construct($raport)
    {
        $this->raport = $raport;
    }

    public function appendComputedData($data)
    {
        return $this->raport->appendComputedData($data);
    }
}