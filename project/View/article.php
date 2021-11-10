<?php
include('Controller/PostC.php');
include('Controller/commentC.php');
$indexA = $_GET['indexA'];
$PostC = new PostC();
$PostC->readArticle($indexA);
$CommentC = new CommentC();
$CommentC->newComment();