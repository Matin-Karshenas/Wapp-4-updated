<?php
    
    $Email = $_POST["email"];
    $Password = $_POST["password"];

    if($Email == "")
    {
        echo("You are not logged");
        $Action = "Not Logged";
        header("Location: Trump.html?actionw=".$Action."#contact");
        exit();
    }

    if($Password == "")
    {
        echo("You are not logged");
        $Action = "Not Logged";
        header("Location: Trump.html?actionw=".$Action."#contact");
        exit();
    }

    $data_sa = mysqli_connect("localhost","root","","website_database");
    $FIND = mysqli_query($data_sa, "SELECT `Email`, `Password` FROM `website` WHERE `Email`  = '$Email' AND `Password` = '$Password'");
    $data = mysqli_fetch_array($FIND);
    $Action = "";



    if($data)
    {
        echo("You are logged");
        $Action = "Logged";
        header("Location: Trump.html?cameFromLogin=true&actionw=".$Action."#contact");
        exit();
    }
    else
    {
        echo("You are not logged");
        $Action = "Not Logged";
        header("Location: Trump.html?cameFromLogin=true&actionw=".$Action."#contact");
        exit();
    }

    mysqli_close($data_sa);
?>