<?php 


$Text = $_POST["message"];
$Name = $_GET["Name"];
$data_sa = mysqli_connect("localhost","root","","website_database");
mysqli_query($data_sa, "INSERT INTO `reviews` (`id`, `Name`, `Text`) VALUES (NULL, '$Name', '$Text')");
mysqli_close($data_sa);

header("Location: Trump.php#Contact");
exit();
?>