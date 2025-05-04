<?php
    $data = $_FILES["IMAGE1"]["name"];
    $Imageurl = "images/" . $data;
    $Title_target = $_GET["row"];
    $Text = $_POST["message1"];
    $data_sa = mysqli_connect("localhost", "root", "", "website_database");
    $result = mysqli_query($data_sa, "SELECT image FROM new_data WHERE row = '$Title_target'");
    $row = mysqli_fetch_assoc($result);
    $old_image = $row['image'];
    if (file_exists($old_image)) {
        unlink($old_image);
    }
    move_uploaded_file($_FILES["IMAGE1"]["tmp_name"], $Imageurl);
    mysqli_query($data_sa, "UPDATE new_data SET image = '$Imageurl', text = '$Text' WHERE row = '$Title_target'");
    mysqli_close($data_sa);
    header("Location: Trump.php#new");
    exit();
?>