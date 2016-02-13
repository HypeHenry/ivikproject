<?php
/**
 * Created by PhpStorm.
 * User: henrymacbook1
 * Date: 13-02-16
 * Time: 11:03
 */

include 'person.class.php';
include 'teacher.class.php';
include 'student.class.php';

$Visitor = new Person("tim",  25);
$Student = new Student("kanye", 26, ['math', 'sciens', 'english']);
$Teacher = new teacher("4head", 38, ['german']);

var_dump($Visitor);
var_dump($Student);
var_dump($Teacher);