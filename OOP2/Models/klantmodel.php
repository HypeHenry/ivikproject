<?php

$host       =   'localhost';
$dbname     =   'mp3shop';
$user       =   'root';
$password   =   'root';

$db = new PDO('mysql:host=' . $host . ';dbname=' . $dbname . '', $user, $password);

// set PDO error mode
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

class Klant
{

    public $klantnr;
    public $naam;
    public $adres;
    public $postcode;
    public $woonplaats;


    public function __construct($klantnr, $naam, $adres, $postcode, $woonplaats){
        $this->klantnr     = $klantnr;
        $this->naam         = $naam;
        $this->adres        = $adres;
        $this->postcode     = $postcode;
        $this->woonplaats   = $woonplaats;
    }
}