<?php
namespace App\views;

use App\core\Router;

require_once("./vendor/autoload.php");
session_start();


Router::dispatcher();
