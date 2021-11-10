<?php
include('Controller/UserC.php');
include('Controller/PostC.php');
/*$UserC = new UserC();*/
$dingus = new UserC();
$dingus->viewUser();
$blink = new PostC();
$blink->postInventory();