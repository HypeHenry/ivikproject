<?php
/**
 * Created by PhpStorm.
 * User: henrymacbook1
 * Date: 06-02-16
 * Time: 10:46
 */


$host       =   'localhost';
$dbname     =   'mp3shop';
$user       =   'root';
$password   =   'root';

try // try to connect
{
    // Connect with data source name (DSN)
    //username and password
    $db = new PDO('mysql:host='.$host.';dbname='.$dbname .'', $user, $password);

    // set PDO error mode
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get update records from the album table
    $sql = "UPDATE album SET genre = 'rap' WHERE albumcode = 'A2003'";
    $affectedRows = $db->exec($sql);



    // test the result
    echo $affectedRows;
}
catch (PDOException $e)
{
    echo $e->getMessage();

}