<?php
interface tariffInterface
{
    public function calculatePrice();

    public function addService($service);

    public function getMinutes();

    public function getDistance();
}