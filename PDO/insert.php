<?php
/**
 * Created by PhpStorm.
 * User: henrymacbook1
 * Date: 06-02-16
 * Time: 10:07
 */
//    var_dump($_POST);

error_reporting(E_ALL);
ini_set("display_errors", 1);

$host       =   'localhost';
$dbname     =   'mp3shop';
$user       =   'root';
$password   =   'root';

// Connect with data source name (DSN)
//username and password
$db = new PDO('mysql:host=' . $host . ';dbname=' . $dbname . '', $user, $password);

// set PDO error mode
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (!empty($_POST)) {
    // Do the insert
    $albumcode      = $db->quote($_POST['albumcode']);
    $titel          = $db->quote($_POST['titel']);
    $artiest        = $db->quote($_POST['artiest']);
    $genre          = $db->quote($_POST['genre']);
    $prijs          = $db->quote($_POST['prijs']);

    $sql = "INSERT INTO album(
                albumcode, titel, artiest, genre, prijs)
                VALUE (
                $albumcode,
                $titel,
                $artiest,
                $genre,
                $prijs) ";


// The exec method return number of row affected by the query
    $affactedRows = $db->exec($sql);

// insert
    $insertId = $db->lastInsertId();

}

?>

<html
<body>
<form action="index.php" method="post">
    <label>Albumcode</label><br>
    <input type="text" name="albumcode" value=""><br>
    <br />

    <label>titel</label><br>
    <input type="text" name="titel" value=""><br>
    <br />

    <label>artiest</label><br>
    <input type="text" name="artiest" value=""><br>
    <br />

    <label>genre</label><br>
    <input type="text" name="genre" value=""><br>
    <br />

    <label>prijs</label><br>
    <input type="text" name="prijs" value="">
    <br />

    <button type="submit">submit</button>
</form>
</body>
