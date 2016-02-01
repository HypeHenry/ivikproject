<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'template/header.php';
include 'template/footer.php';

session_start();
session_destroy();

header('location:index.php');
exit();
