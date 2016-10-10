<?php 
 session_start(); 
  //unset session variables 
 unset($_SESSION['login']); 
  session_regenerate_id();
  session_destroy(); 
 //the name of your preferred redirect page 
 header('Location: ../index.php');
?> 
