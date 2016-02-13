<?php
/**
 * Created by PhpStorm.
 * User: henrymacbook1
 * Date: 13-02-16
 * Time: 11:03
 */

class Person{

    public $name;
    public $age;

    public function __construct($name, $age){

        $this->name                 = $name;
        $this->age                  = $age;
    }

    public function __destruct(){
//        echo __CLASS__ . "Is destroyed";
    }

    public function  __get($var){
        return "$var is a private property, it's vaulue = {$this->$var}";
    }

    public function __set($var, $value){
        $this->$var = $value;
    }

    public function sayHello(){

        return 'Hi, my name is ' . $this->name;
    }

    public function getAge(){
        return $this->age;
    }
}