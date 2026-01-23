<?php
namespace App\models;

class commande
{
    private int $id;
    private int $UserID;
    private int $ProductID;
    private int $Quantity;
    private int $AddedDate;
    public function __construct($UserID, $ProductID, $Quantity)
    {
        $this->UserID = $UserID;
        $this->ProductID = $ProductID;
        $this->Quantity = $Quantity;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
    public function getUserID()
    {
        return $this->UserID;
    }
    public function setUserID($UserID)
    {
        $this->UserID = $UserID;

        return $this;
    }
    public function getProductID()
    {
        return $this->ProductID;
    }
    public function setProductID($ProductID)
    {
        $this->ProductID = $ProductID;

        return $this;
    }
    public function getQuantity()
    {
        return $this->Quantity;
    }
    public function setQuantity($Quantity)
    {
        $this->Quantity = $Quantity;

        return $this;
    }
    public function getAddedDate()
    {
        return $this->AddedDate;
    }
    public function setAddedDate($AddedDate)
    {
        $this->AddedDate = $AddedDate;

        return $this;
    }
}
