<?php

namespace App\controllers;

use App\models\Products;
use App\models\Repository\ProductsRepository;

class AdminController
{
    public static function indix()
    {
        session_start();
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] == 'admin') {
                $_POST["data"] = ProductsRepository::read();
                include_once("./app/views/admin/dashboard.php");
                exit();
            } else {
                header("Location:?Accueil");
            }
        } else {

            header("Location:?Accueil");
        }
    }
    public static function add_Produit()
    {
        $commande = new Products($_POST['title'], $_POST['description'], $_POST['price'], $_POST['ImageURL'], $_POST['stock_quantity']);
        ProductsRepository::create($commande);
        // var_dump($commande);
        header("Location:?admin");
    }
    public static function Products_Delete()
    {
        // var_dump($_GET);
        ProductsRepository::Delete($_GET['Products_Delete']);
        header("Location:?admin");
    }
    public static function Products_Edit()
    {
        // var_dump($_POST);
        $Products = new Products($_POST['title'], $_POST['description'], $_POST['price'], $_POST['ImageURL'], $_POST['stock_quantity']);
        ProductsRepository::Edit($_POST['Products_Edit_id'], $Products);
        header("Location:?admin");
    }
    public static function Products_Edit_views()
    {

        // header("Location:?Products_Edit_views");
        $_POST["data"] = ProductsRepository::read();

        include_once("./app/views/admin/Products_Edit_views.php");
    }
}
