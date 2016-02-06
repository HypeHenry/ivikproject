<?php
/**
 * Created by PhpStorm.
 * User: henrymacbook1
 * Date: 06-02-16
 * Time: 11:00
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

    // Get all records from the user table
    $sql = "SELECT * FROM album";
    $results = $db->query($sql);

    $stmt = $db->query($sql, PDO::FETCH_ASSOC);

    // Test it
    foreach($stmt as $row)
    {
        echo $row['albumcode']. ' - ' . $row['titel']. '<br />';


    }
}
catch (PDOException $e)
{
    echo $e->getMessage();

}

