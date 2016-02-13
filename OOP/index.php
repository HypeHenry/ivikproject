<?php

class Person{

    public $name;
    private $age;

    public function __construct($name, $age){

        $this->name                 = $name;
        $this->age                  = $age;
    }

    public function sayHello(){

        return 'Hi, my name is ' . $this->name;
    }

    public function getAge(){
        return $this->age;
    }
}

$student = new Person('john', 34);
$teacher = new Person('Mary', 27);

//echo $student->name;
//echo $teacher->name;

$teacher ->name = 'jane';

echo $teacher->sayHe llo();