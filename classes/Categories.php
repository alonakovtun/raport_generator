<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/config/DatabaseConnection.php');

class Categories
{
    public function list()
    {
        $databaseConnectionion = DatabaseConnection::getInstance();
        $categoriesQuery = $databaseConnectionion->prepare("
            SELECT name, slug from categories
        ");
        $categoriesQuery->execute();
        $categories = $categoriesQuery->fetchAll(PDO::FETCH_ASSOC);

        return $categories;
    }
}
