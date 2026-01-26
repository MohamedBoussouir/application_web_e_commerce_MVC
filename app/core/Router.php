<?php

namespace App\core;

use App\core\Request;
use App\controllers\UserController;
use App\controllers\AdminController;
use App\controllers\AuthControllers;
use App\controllers\ErreurControllers;
use App\controllers\AccueilControllers;


include_once("./vendor/autoload.php");
class Router
{
    public static function dispatcher()
    {
        if (empty($_GET)) {
            include_once("./app/views/Accueil.php");
            exit();
        } else {
            $controllers = array_keys($_GET)[0];
        }
        $new = new self();
        $new->controllers($controllers);
    }
    public function controllers($kay)
    {
        switch ($kay) {
            case 'Accueil':
                UserController::indix();
                break;
            case 'Login':
                AuthControllers::indix_login();
                break;
            case 'Register':
                AuthControllers::indix_register();
                break;
            case 'Request':
                Request::Post();
                break;
            case 'Boutique':
                UserController::indix_Boutique();
                break;
            case 'Categories':
                UserController::indix_Categories();
                break;
            case 'panier':
                UserController::indix_panier();
                break;
            case 'panier_add':
                UserController::indix_panier_add();
                break;
            case 'success':
                UserController::indix_success();
                break;
            case 'admin':
                AdminController::indix();
                break;
            case 'Logout':
                AuthControllers::Logout();
                break;
            case 'Products_Delete':
                AdminController::Products_Delete();
                break;
            case 'Products_Edit_views':
                AdminController::Products_Edit_views();
                break;
            case 'user':
                UserController::indix();
                break;
            case 'confirm_order':
                UserController::confirm_order();
                break;
            case 'btn_n9s':
                UserController::btn_n9s();
                break;
            case 'btn_zyad':
                UserController::btn_zyad();
                break;
            default: {
                    ErreurControllers::indix();
                }
        }
    }
}
