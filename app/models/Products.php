<?php

namespace App\models;

use App\core\Database;



class Products extends Database
{
    public int $id;
    public string $title;
    public string $description;
    public float $price;
    public int $user_id;
    public int $db;
    public function __construct($title, $description, $price, ?string $user_id)
    {
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
        $this->user_id = $user_id;
        $this->db = Database::connect(); 
    }
    public function getUser_id()
    {
        return $this->user_id;
    }
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
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
}
