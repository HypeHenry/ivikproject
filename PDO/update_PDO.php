<?php
/**
 * Created by PhpStorm.
 * User: henrymacbook1
 * Date: 13-02-16
 * Time: 10:07
 */

$host       =   'localhost';
$dbname     =   'mp3shop';
$user       =   'root';
$password   =   'root';

// Connect with data source name (DSN)
//username and password
$db = new PDO('mysql:host=' . $host . ';dbname=' . $dbname . '', $user, $password);

// set PDO error mode
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try{
    var_dump($_POST);
    // TODO Maak update
    $sql = "INSERT INTO album( albumcode, titel, artiest, genre, prijs)
            VALUES (:albumcode, :titel, :artiest, :genre, :prijs)";

    // prepaird the query
    $stmt = $db->prepare($sql);

    //excute the query inserting one album
    $stmt->execute($_POST);

    //the lasti nser ID method get the new record is you've just inserted
    $insertId = $db->lastInsertId();

    echo $insertId;
}
catch(PDOexception $e)
{
    echo $e->getMessage();
}

?>
