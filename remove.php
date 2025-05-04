<?php
    $data_sa = mysqli_connect("localhost","root","","website_database");
    $Title_target = $_GET["row"];
    $result = mysqli_query($data_sa, "SELECT `image` FROM new_data WHERE `row` = '$Title_target'");
    $row = mysqli_fetch_assoc($result);
    $image_name = $row['image']; 


    $image_path = $image_name;

    unlink($image_path);
    
    mysqli_query($data_sa,"DELETE FROM `new_data` WHERE `row` = '$Title_target'" );
    mysqli_close($data_sa);
    

    header("Location: Trump.php#new");
    exit();

?>