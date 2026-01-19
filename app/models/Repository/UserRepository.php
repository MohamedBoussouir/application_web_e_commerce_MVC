<?php

namespace App\models\Repository;

use PDO;
use App\models\User;
use App\core\Database;



class UserRepository
{
    public PDO $bd;
    public function __construct()
    {
        $this->bd = Database::connect();
    }



    public static function read()
    {
        $SQL = "SELECT * FROM `users`";
        $k = new self;
        $stm = $k->bd->prepare($SQL);
        $stm->setFetchMode(PDO::FETCH_CLASS, User::class);
        $stm->execute();
        return $stm->fetchAll();
    }
    public static function create(User $entity)
    {
        $name = $entity->getusername();
        $email = $entity->getEmail();
        $password = $entity->getPassword();
        $sql = "INSERT INTO users (`username`, `email`, `password`) VALUES (?,?,?)";
        $hy = new self;
        $stmt = $hy->bd->prepare($sql);
        $test = $stmt->execute([$name, $email, $password]);
        return $test;
    }
    public static function login(User $entity)
    {
        $name = $entity->getusername();
        $email = $entity->getEmail();
        $password = $entity->getPassword();
        $sql = "INSERT INTO users (`username`, `email`, `password`) VALUES (?,?,?)";
        $hy = new self;
        $stmt = $hy->bd->prepare($sql);
        $test = $stmt->execute([$name, $email, $password]);
        return $test;
    }

}
