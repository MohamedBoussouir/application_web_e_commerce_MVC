<?php
namespace App\models\Repository;

use PDO;
use App\models\User;
use App\core\Database;





class ProductsRepository
{
    public PDO $bd;
    public function __construct()
    {
        $this->bd = Database::connect();
    }
    public static function read()
    {
        $SQL = "SELECT * FROM `commande`";
        $k = new self;
        $stm = $k->bd->prepare($SQL);
        $stm->setFetchMode(PDO::FETCH_CLASS, User::class);
        $stm->execute();
        return $stm->fetchAll();
    }
    public static function create(User $entity)
    {
        $UserID = $entity->getusername();
        $ProductID = $entity->getEmail();
        $Quantity = $entity->getPassword();
        $Quantity = $entity->getPassword();
        $sql = "INSERT INTO commande (`UserID`, `ProductID`, `Quantity`,`image_url`) VALUES (?,?,?,?);";
        $hy = new self;
        $stmt = $hy->bd->prepare($sql);
        $test = $stmt->execute([$UserID, $ProductID, $Quantity]);
        return $test;
    }

}
