<?php

namespace App\controllers;




use App\models\Repository\ProductsRepository;

class UserController
{

    public static function indix()
    {
        include("./app/views/Accueil.php");
    }
    public static function indix_Boutique()
    {
        $_POST["data"] = ProductsRepository::read();

        include("./app/views/Boutique.php");
    }
    public static function indix_Categories()
    {
        include("./app/views/Categories.php");
    }
    public static function indix_panier()
    {
        if (!empty($_GET['panier'])) {
            self::indix_panier_Delete();
            exit();
        }
        $_POST["data"] = ProductsRepository::read();
        include("./app/views/panier.php");
    }
    public static function indix_panier_add()
    {
        session_start();
        $chek = false;
        foreach ($_SESSION['product_id'] as $vale) {
            if ($vale == $_GET['panier_add']) {
                $chek = true;
            }
        }
        if (!$chek) {
            array_push($_SESSION['product_id'], $_GET['panier_add']);
        }
        var_dump($_SESSION);
        header("Location:?panier");
    }
    public static function indix_panier_Delete()
    {
        foreach ($_SESSION['product_id'] as $key => $vale) {
            if ($vale == $_GET['panier']) {
                unset($_SESSION['product_id'][$key]);
                setcookie($key, "", time() - 3600, "/");
                break;
            }
        }

        $_POST["data"] = ProductsRepository::read();
        include("./app/views/panier.php");
    }
    public static function confirm_order()
    {
        $commande=new commande();
       var_dump($_SESSION['product_id']);
       var_dump($_POST["data"]);

    }

    public static function indix_success()
    {
        include("./app/views/success.php");
    }
}
