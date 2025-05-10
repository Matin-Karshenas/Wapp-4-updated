<?php
$data_sa = mysqli_connect("localhost","root","","website_database");
$id = $_GET["id"];


mysqli_query($data_sa, "DELETE FROM `reviews` WHERE `id` = '$id'");
mysqli_close($data_sa);

header("Location: Trump.php#Reviews");
exit();

?>