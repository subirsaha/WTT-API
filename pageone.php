<?php
session_start();
$url="http://esolzdemos.com/lab1/whatthetrucks/pagetwo.php";
$_SESSION['testvar']="1111";
	 header('Location: ' . $url); 

?>