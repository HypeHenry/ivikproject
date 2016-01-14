<?php

/* 
this file will show list of messages 
 */

include 'header.php';
session_start();

$id = $_GET['id'];

foreach ($_SESSION['messages'] as $key => $message){
    
    if($key == $id){
                        
            echo "<div id=\"message\" class=\"list-group\">";
            echo "<a class=\"list-group-item\"><h4> Title: ". $message['title'] . "</h4></a>";
            echo "<textarea name=\"content\" type=\"text\" class=\"form-control\" id=\"content\">". $message['content'] . "</textarea>";
            echo "<br>";
            echo "</div>";
            }
             
}
include 'footer.php';
