<?php

/* 
insert messages in to the session 
 */
session_start();

$_SESSION['messages'][] = $_POST;

header('location:index.php');
exit;
?>