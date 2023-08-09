<?php

namespace Source\Models;

class Address
{
    private $street;
    private $number;
    private $complement;

    public function __construct($street = null, $number = null, $complement = null)
    {
        $this->street = $street;
        $this->number = $number;
        $this->complement = $complement;
    }

    public function getStreet()
    {
        return $this->street;
    }

    public function setStreet($street): void
    {
        $this->street = $street;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function setNumber($number): void
    {
        $this->number = $number;
    }

    public function getComplement()
    {
        return $this->complement;
    }

    public function setComplement($complement): void
    {
        $this->complement = $complement;
    }

}
