<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);


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

class PersonDecorator{

    private $Person;

    public function __construct (Person $person){

        $this->Person = $person;
    }

    // TODO FIX THIS SHIT
//    public function __call($method, $args)
//    {
//        $result = call_user_func_array(array()$this->Person, $method)
////        $result = call_user_func_array(array($this->Person, $method) $args);
//
//        return "Decorcator says: $result";
//    }

    public function  getAge(){
        return "The age of {$this->Person->name} is {$this->Person->age}";
    }
}

 $student = new PersonDecorator(new Person("John", 34));

echo $student->getAge();
//echo $student->sayHello();