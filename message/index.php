<?php
session_start();
/* 
 * this file will show list of messages
*/
    include 'header.php';
    
    if (empty($_SESSION)){
          echo "The array is currently empty.";
        }
    else{
        foreach ($_SESSION['messages']  as $key => $message){
            echo "<a  id=\"message\" href=\"show.php?id=$key\" class=\"list-group-item\">";
            echo "<h4 class=\"list-group-item-heading\"> Title: " . $message['title'] . "</h4>";
            echo "Content: ";
            echo substr($message['content'], 0, 77);
            echo "</a></div>";          
            }
        }

        include 'footer.php';