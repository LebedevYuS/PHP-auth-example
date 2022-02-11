<?php 
require __DIR__ . '/header.php';
require "dbconnection.php";
unset($_SESSION['logged_user']);
header('Location: index.php');
?>
