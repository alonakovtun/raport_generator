<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/decorator/Decorator.php');

class DecoratedRaportData extends Decorator
{
    public function appendComputedData($data)
    {
        $income = $data['sold_amount'] * $data['price'];
        $percentageSold = (100 * $data['sold_amount']) / $data['total_amount'];
        $itemsLeftInStock = $data['total_amount'] - $data['sold_amount'];
        $data['income'] = $income;
        $data['percentage_sold'] = $percentageSold;
        $data['left_in_stock'] = $itemsLeftInStock;

        return $data;
    }
}