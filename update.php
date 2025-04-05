<?php
    $data = $_FILES["IMAGE1"]["name"];
    $Imageurl="images/".$data;
    $Title_target = $_GET["row"];
    move_uploaded_file(from: $_FILES["IMAGE1"]["tmp_name"],to: $Imageurl);
    $Text = $_POST["message1"];
    $data_sa = mysqli_connect("localhost","root","","website_database");
    
    mysqli_query($data_sa,"UPDATE `new_data` SET `row`='$Title_target' ,`image`='$Imageurl',`text`='$Text' WHERE `row` = '$Title_target'");
    echo("hello".$Title_target);
    echo($Title_target);
    mysqli_close($data_sa);
    header("Location: Trump.php#new");
    exit();


?>