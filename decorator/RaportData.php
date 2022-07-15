<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/interfaces/CsvFormatterInterface.php');

class RaportData implements CsvFormatterInterface
{
    public function appendComputedData($data)
    {
        return $data;
    }
}