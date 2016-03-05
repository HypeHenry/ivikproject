<?php



$db =

// set PDO error mode
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

class Klant{

    public $klantnr;
    public $naam;
    public $adres;
    public $postcode;
    public $woontplaats;

public function __construct(){
    $this->conn = new PDO('mysql:host=localhost;dbname=mp3shop', 'root', 'root');

}

    public function getklant(){
        return;
    }
}