<?php

namespace App\models\Repository;

use PDO;
use App\models\User;
use App\core\Database;
use App\models\Products;




class ProductsRepository
{
    public PDO $bd;
    public function __construct()
    {
        $this->bd = Database::connect();
    }
    public static function read()
    {
        $SQL = "SELECT * FROM `products`";
        $k = new self;
        $stm = $k->bd->prepare($SQL);
        // $stm->setFetchMode(PDO::FETCH_CLASS, Products::class);
        $stm->execute();
        return $stm->fetchAll();
    }
    public static function create(Products $entity)
    {
        $title = $entity->gettitle();
        $description = $entity->getdescription();
        $price = $entity->getprice();
        $ImageURL = $entity->getImageURL();
        $stock_quantity = $entity->getstock_quantity();
        $sql = "INSERT INTO products (`title`, `description`, `price`, `image_url` , `stock_quantity`) VALUES (?,?,?,?,?);";
        $hy = new self;
        $stmt = $hy->bd->prepare($sql);
        $test = $stmt->execute([$title, $description, $price, $ImageURL, $stock_quantity]);
        return $test;
    }
    public static function Delete($id)
    {
        $sql = "DELETE FROM products WHERE `id` = ?;";
        $hy = new self;
        $stmt = $hy->bd->prepare($sql);
        $test = $stmt->execute([$id]);
        return $test;
    }
    public static function Edit($id, products $entity)

    {
        $title = $entity->gettitle();
        $description = $entity->getdescription();
        $price = $entity->getprice();
        $ImageURL = $entity->getImageURL();
        $stock_quantity = $entity->getstock_quantity();
        $sql = "UPDATE `products` SET `title`=?,`description`=?,`price`=?,`image_url`=?,`stock_quantity`=? WHERE id=?;";
        $hy = new self;
        $stmt = $hy->bd->prepare($sql);
        $test = $stmt->execute([$title, $description, $price, $ImageURL, $stock_quantity, $id]);
        return $test;
    }
}
