<?php

namespace App\core;

use App\core\Request;
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
                AccueilControllers::indix();
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
                case 'Request':
                Request::Post();
                break;
            default: {
                    ErreurControllers::indix();
                }
        }
    }
}
