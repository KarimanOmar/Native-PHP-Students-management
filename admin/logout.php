<?php 
session_start();
unset($_SESSION['username']);
session_regenerate_id();
session_destroy();
header("Location: login.php");
?>