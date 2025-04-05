<?php
$Name = $_POST["Name"];
$Email = $_POST["email"];
$Password = $_POST["password"];
$data_sa = mysqli_connect("localhost","root","","website_database");
mysqli_query($data_sa,"INSERT INTO `website`(`Name`, `Email`, `Password`) VALUES ('$Name','$Email','$Password')");
mysqli_close($data_sa);
header("Location: Trump.php#Login");
exit();

?>