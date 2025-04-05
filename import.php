<?php 
$data = $_FILES["IMAGE"]["name"];
$Imageurl="images/".$data;
move_uploaded_file(from: $_FILES["IMAGE"]["tmp_name"],to: $Imageurl);
$Text = $_POST["message"];
$data_sa = mysqli_connect("localhost","root","","website_database");
mysqli_query($data_sa, "INSERT INTO `new_data`(`row`, `image`, `text`) VALUES ('[value-1]','$Imageurl','$Text')");
mysqli_close($data_sa);

header("Location: Trump.php#new");
exit();




?>