<?php
include('Controller/commentC.php');
$indexR = $_GET['indexR'];
$CommentC = new CommentC();
$CommentC->changeComment();