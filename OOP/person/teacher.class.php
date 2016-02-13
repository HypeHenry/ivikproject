<?php

/**
 * Created by PhpStorm.
 * User: henrymacbook1
 * Date: 13-02-16
 * Time: 11:08
 */
class teacher extends Person
{
    public $teachers;

    public  function __construct($name, $age, $teachers){

        $this->teachers = $teachers;

        parent::__construct($name, $age);
    }
}