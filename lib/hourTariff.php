<?php

class hourTariff extends tariffAbstract
{
    protected $priceForMinute = 200 / 60;
    protected $priceForKm = 0;

    public function __construct($minutes, $distance)
    {
        parent::__construct($minutes, $distance);
        $this->minutes = $this->minutes - $this->minutes % 60 + 60;
    }
}