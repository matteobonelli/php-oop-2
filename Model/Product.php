<?php
include __DIR__.'/../Traits/DrawCard.php';
class Product {
    use DrawCard;
    protected float $price;
    private int $sconto = 0;
    protected int $quantity;

    function __construct($price, $quantity) {
        $this->price = $price;
        $this->quantity = $quantity;

    }

    public function setDiscount(int $discount) {
        if($discount > 90 || $discount < 10) {
            throw new Exception('Discount out of range');
        } else {
            $this->sconto = $discount;
        }


    }

    public function getDiscount() {
        return $this->sconto;
    }
}


?>