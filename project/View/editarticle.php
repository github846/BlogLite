<?php
include('Controller/PostC.php');
$indexA = $_GET['indexA'];
$PostC = new PostC();
$PostC->editArticle($indexA);