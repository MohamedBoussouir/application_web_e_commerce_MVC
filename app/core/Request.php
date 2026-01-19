<?php

namespace App\core;

use App\models\User;
use App\controllers\AuthControllers;




class Request
{
    public static function Post()
    {

        if ($_POST['submit'] == "register") {
            session_start();
            // var_dump($_POST);
            if ($_POST['password'] == $_POST['confirm_password']) {
            } else {
                $_SESSION['error'] = 1;
                header("Location:?Register");
            }
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error'] = 2;
                header("Location:?Register");
            }
            $check_auth = new check_auth();
            if (count($check_auth->check_email_username())) {
                $_SESSION['error'] = 3;
                header("Location:?Register");
            }

            // header("Location:?Register");
            echo "yesssssssssssssssssssssssssssssssssssssssssss";
            $User = new User($_POST['username'], $_POST['email'], $_POST['password']);
            echo AuthControllers::register($User);
            exit();
        }

        if ($_POST['submit'] == "login") {
            session_start();
            $User = new User("", $_POST["email"], $_POST["password"]);
            AuthControllers::login($User);
            $check_auth = new check_auth();
            if (!count($check_auth->check_email_password())) {
                echo"hu";
               $_SESSION['error']=5;
                header("Location:?Login");
                }else{
                echo"Welcome";
            }




















            exit();
        }
    }
}
