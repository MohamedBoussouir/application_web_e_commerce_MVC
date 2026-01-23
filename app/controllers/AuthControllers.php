<?php

namespace App\controllers;

use App\models\Repository\UserRepository;
use App\models\User;

class AuthControllers
{
    public static function indix_login()
    {
        include_once("./app/views/auth/login.php");
    }
    public static function indix_register()
    {
        include_once("./app/views/auth/register.php");
    }
    public static function login(User $User) {}
    public static function register(User $User)
    {
        return UserRepository::create($User);
    }
    public static function Logout()
    {
        session_start();
        foreach ($_SESSION['product_id'] as $key => $vale) {
            setcookie($key, "", time() - 3600, "/");
            break;
        }
        session_destroy();
        header("Location:?Accueil");
    }
}
