<?php
$userName = "root";
$password = "";
$conn = new PDO('mysql:host=localhost;dbname=final;charset=utf8', $userName, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
?>