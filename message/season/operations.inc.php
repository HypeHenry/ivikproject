<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function indexMessages(){
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
}

function indexUsers()
{
            if (empty($_SESSION)){
          echo "The array is currently empty.";
        }
    else{
        foreach ($_SESSION['users']  as $key => $user){
            echo "<a  id=\"message\" href=\"show.php?id=$key\" class=\"list-group-item\">";
            echo "<h4 class=\"list-group-item-heading\"> username: " . $user['user'] . "</h4>";
            echo "email: ";
            echo substr($user['email'], 0, 77);
            echo "</a></div>";          
            }
        }
}

function showMessages(){
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
}

function showUsers(){
$id = $_GET['id'];

foreach ($_SESSION['users'] as $key => $user){
    
    if($key == $id){
                        
            echo "<div id=\"message\" class=\"list-group\">";
            echo "<a class=\"list-group-item\"><h4> user: ". $user['user'] . "</h4></a>";
            echo "<textarea name=\"content\" type=\"text\" class=\"form-control\" id=\"content\">". $user['content'] . "</textarea>";
            echo "<br>";
            echo "</div>";
            }
    }
}