<?php

class Car {
    private $targa;

    function __construct($targa) {
      $this->targa = $targa;
    }

}

class Suv extends Car {
    public $cilindrata;
    function __construct($targa, $cilindrata) {
        parent::__construct($targa);
        $this->cilindrata = $cilindrata;
    }
}

$s = new Suv('ACSDF3', '1200');

var_dump($s);