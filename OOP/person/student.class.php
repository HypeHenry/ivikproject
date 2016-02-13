<?php

/**
 * Created by PhpStorm.
 * User: henrymacbook1
 * Date: 13-02-16
 * Time: 11:05
 */
class student extends Person
{
    public $books;

    public function __construct ($name, $age, $books){

    $this->books = $books;

        parent:: __construct($name, $age);
}
    public function SayHello(){

        $bookCount = count($this->books);

        return "I have $bookCount books";
    }
}