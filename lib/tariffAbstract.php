<?php

abstract class tariffAbstract implements tariffInterface
{
    protected $priceForMinute;
    protected $priceForKm;
    protected $minutes;
    protected $distance;
    protected $services = [];

    public function __construct($minutes, $distance)
    {
        $this->minutes = $minutes;
        $this->distance = $distance;
    }

    public function calculatePrice()
    {
        $price = $this->minutes * $this->priceForMinute + $this->distance * $this->priceForKm;
        if ($this->services) {
            foreach ($this->services as $service) {
                $service->applyService($this, $price);
            }
        }
        return $price;
    }

    public function addService($service)
    {
        array_push($this->services, $service);
        return $this;
    }

    public function getMinutes()
    {
        return $this->minutes;
    }

    public function getDistance()
    {
        return $this->distance;
    }

}