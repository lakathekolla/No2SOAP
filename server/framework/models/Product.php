<?php
/**
 * ==========================================================
 * Product Class - No2NOSOAP Project
 * ==========================================================
 * Author: R M Lakruwan@Noone
 * Description: This class represents the `Product` entity:
 * - ID
 * - Title
 * - Description
 * - Price
 * ==========================================================
 */

class Product
{
    public $id, $title, $description, $price;

    public function __construct($id, $title, $description, $price)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
    }
}
