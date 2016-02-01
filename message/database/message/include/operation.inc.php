<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getHeader(){

        $header = include_once "template/header.php";
                
        echo $header;
}

function getFooter(){

        $footer = include_once "template/footer.php";
                
        echo $footer;
}