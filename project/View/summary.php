<?php
include('Controller/postC.php');

$PostC = new PostC();
$PostC->searchFunction();
$PostC->postCollection();
$PostC->newPost();