<?php
class serviceDriver implements serviceInterface
{
    private $price = 100;

    public function applyService($tariff, &$price)
    {
        $price +=$this->price;

    }
}