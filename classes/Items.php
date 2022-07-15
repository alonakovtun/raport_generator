<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/config/DatabaseConnection.php');

class Items
{
    public function list()
    {
        $databaseConnectionion = DatabaseConnection::getInstance();
        $itemsQuery = $databaseConnectionion->prepare("
            SELECT items.id as id, items.name as item_name, price, total_amount, sold_amount, categories.name as category_name from items
            inner join item_categories on items.id = item_categories.item_id
            inner join categories on item_categories.category_id = categories.id
        ");
        $itemsQuery->execute();
        $items = $itemsQuery->fetchAll(PDO::FETCH_ASSOC);

        return $items;
    }
}
