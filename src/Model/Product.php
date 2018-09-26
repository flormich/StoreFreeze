<?php

namespace App\Model;

class Product 
{
    const NAME = "/^[A-Z][a-z]{2,16}/";
    const GRAM = "/^[0-9]{0,5}/";
    const UNIT = "/^[0-9]{0,5}/";
    const CAT_NAME = "/^[A-Z][a-z]{2,16}/";
    const CATEGORY_ID = "/^[1-9]{1,3}/";
    const ID = "/^[0-9]{0,5}/";

    private $unit;
    private $name;
    private $id;
    private $gram;
    private $cat_name;   
    private $category_id;  

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getUnit(): int
    {
        return $this->unit;
    } 

    public function setUnit(int $unit)
    {
        $this->unit = $unit;
    }

    public function getGram(): int
    {
        return $this->gram;
    }

    public function setGram(int $gram)
    {
        $this->gram = $gram;
    }

    public function getCategory(): string
    {
        return $this->cat_name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCategoryid(): int
    {
        return $this->category_id;
    }

    public function setCategoryid(int $category_id)
    {
        $this->category_id = $category_id;
    }


}