<?php

namespace App\models;

class Products
{
    public int $id;
    public string $title;
    public string $description;
    public float $price;
    public string $ImageURL;
    public  $AddedDate;
    public int $stock_quantity;

    public function __construct($title, $description, $price,$ImageURL,$stock_quantity)
    {
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
        $this->ImageURL = $ImageURL;
        $this->stock_quantity = $stock_quantity;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
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
    public function getAddedDate()
    {
        return $this->AddedDate;
    }
    public function setAddedDate($AddedDate)
    {
        $this->AddedDate = $AddedDate;

        return $this;
    }
    public function getImageURL()
    {
        return $this->ImageURL;
    }
    public function setImageURL($ImageURL)
    {
        $this->ImageURL = $ImageURL;

        return $this;
    }
    public function getStock_quantity()
    {
        return $this->stock_quantity;
    }
    public function setStock_quantity($stock_quantity)
    {
        $this->stock_quantity = $stock_quantity;

        return $this;
    }
}
