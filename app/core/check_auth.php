<?php

namespace App\core;

use PDO;
use App\models\User;
use App\core\Database;

class check_auth
{
    public PDO $db;
    public function __construct()
    {
        $this->db = Database::connect();
    }
    public  function  check_email_username()
    {
        $email = $_POST['email'];
        $username = $_POST['username'];
        $SQL = "SELECT * FROM `users` WHERE `email`=? and `username`=?";
        $stmt = $this->db->prepare($SQL);
        $stmt->execute([$email, $username]);
        return $stmt->fetchAll();
    }
    public function check_email_password(){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $SQL = "SELECT * FROM `users` WHERE `email`=? and `password`=?";
        $stmt = $this->db->prepare($SQL);
        // $stmt->setFetchMode(PDO::FETCH_CLASS, User::class);
        $stmt->execute([$email, $password]);
        return $stmt->fetchAll();
    }

}
