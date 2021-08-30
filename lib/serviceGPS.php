<?php
class serviceGPS implements serviceInterface
{
    private $priceForHour = 15;

    public function applyService($tariff, &$price)
    {
        $hours = ceil($tariff->getMinutes() / 60);
        $price +=$this->priceForHour*$hours;

    }
}