<?php
require "lib/rb-mysql.php";
R::setup( 'mysql:host=localhost;dbname=dbsite','root', '' );
if(!R::testConnection()) die('Отсутствует подключение к базе данных!');
session_start();
?>