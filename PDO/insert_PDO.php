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

try{
    var_dump($_POST);
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
