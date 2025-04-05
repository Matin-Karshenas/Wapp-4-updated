<?php

    $Title_target = $_GET["row"];

    $data_sa = mysqli_connect("localhost","root","","website_database");
    mysqli_query($data_sa,"DELETE FROM `new_data` WHERE `row` = '$Title_target'" );
    mysqli_close($data_sa);
    header("Location: Trump.php#new");
    exit();

?>