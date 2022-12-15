<?php

class FakerDataInstance
{
    public string $name;
    public string $surname;
    public string $date;
    public string $phoneNumber;
    public string $purchases;

    public function __construct(string $name, string $surname, string $date, string $phoneNumber, string $purchases)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->date = $date;
        $this->phoneNumber = $phoneNumber;
        $this->purchases = $purchases;
    }
}