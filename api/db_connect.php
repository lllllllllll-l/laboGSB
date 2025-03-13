<?php 
$sv_name = 'localhost';
$user = 'root';
$pwd = '';
$conn = new PDO("mysql:host=$sv_name;dbname=bd_labo", $user,$pwd);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>