<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/decorator/RaportData.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/decorator/DecoratedRaportData.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/config/DatabaseConnection.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/interfaces/RaportFactoryInterface.php');

class CsvGenerator
{
    public static function generateCsv($category)
    {
        $databaseConnectionion = DatabaseConnection::getInstance();
        $itemsQuery = $databaseConnectionion->prepare("
            SELECT items.id as id, items.name as item_name, price, total_amount, sold_amount, categories.name as category_name from items
            inner join item_categories on items.id = item_categories.item_id
            inner join categories on item_categories.category_id = categories.id
            where categories.name = '".$category."'
        ");
        $itemsQuery->execute();
        $data = "ID,NAME,PRICE($),TOTAL,SOLD,INCOME($),PERCENTAGE SOLD(%), LEFT IN STOCK\n";

        while($items = $itemsQuery->fetchAll(PDO::FETCH_ASSOC)) {
            foreach ($items as $item) {
                $raportData = new RaportData();
                $decoratedRaportData = new DecoratedRaportData($raportData);
                $result = $decoratedRaportData->appendComputedData($item);

                $data .= $result['id'].",".$result['item_name'].",".$result['price'].",".$result['total_amount'].",".$result['sold_amount'].",".$result['income'].",".$result['percentage_sold'].",".$result['left_in_stock']."\n";
            }
        }

        header('Content-Type: application/csv');
        header('Content-Disposition: attachment; filename="'.$category.' raport.csv"');

        echo $data; 

        exit();
    }
}