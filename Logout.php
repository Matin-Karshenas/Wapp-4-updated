<?php 
session_start();

unset($_SESSION["Action"]);
unset($_SESSION["Name"]);
unset($_SESSION["Admin"]);

header("Location: Trump.php");
?>