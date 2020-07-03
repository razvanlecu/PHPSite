<?php

class FoodEntity
{
    public $id;
    public $name;
    public $type;
    public $price;
    public $fabdate;
    public $company;
    public $image;
    public $review;


    public function __construct($id, $name, $type, $price, $fabdate, $company, $image, $review)
    {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->price = $price;
        $this->fabdate = $fabdate;
        $this->company = $company;
        $this->image = $image;
        $this->review = $review;
    }


}
