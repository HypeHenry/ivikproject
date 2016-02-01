<?php
session_start();
/* 
 * this file will show list of messages
*/
    include '../template/header.php';
    include_once '../operations.inc.php';
    indexMessages();
    include '../template/footer.php';