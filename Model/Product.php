<?php
class Product
{
    protected float $price;
    private int $sconto = 0;
    protected int $quantity;

    function __construct($price, $quantity)
    {
        $this->price = $price;
        $this->quantity = $quantity;

    }

    public function setDiscount($title)
    {
        if ($title == 'Gunfight at Rio Bravo' || str_contains($title, 'Android') || str_contains($title, 'Half-Life')) {
            $this->sconto = 20;
            return $this->sconto . "$";
        } else {
            return $this->sconto;
        }
    }
}


?>