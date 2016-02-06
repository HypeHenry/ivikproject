<?php
/**
 * Created by PhpStorm.
 * User: henrymacbook1
 * Date: 06-02-16
 * Time: 10:07
 */

$host = 'localhost';
$dbname = 'mp3shop';
$user =  'root';
$password = '1234';

try
{
    $db = new PDO('mysql:host='.$host.';dbname='.$dbname .'', $user, $password);
}
catch (PDOException $e)
{
    echo $e->getMessage();

}

