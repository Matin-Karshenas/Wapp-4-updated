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
        $query = "SELECT `Name`,`Admin` FROM `website` WHERE `Email` = '$Email'";
        $result = mysqli_query($data_sa, $query);
        echo("You are logged");
        $Action = "Logged";
        $Row = mysqli_fetch_assoc($result);
        $NameOf_Client = $Row["Name"];
        $Admin_statue = $Row["Admin"];

        session_start();

        $_SESSION["Action"] = $Action;
        $_SESSION["Name"] = $NameOf_Client;
        $_SESSION["Admin"] = $Admin_statue;
        header("Location: Trump.php?cameFromLogin=true&actionw=".$Action."&NAME=".$NameOf_Client."&Admin=".$Admin_statue."#contact");
        exit();
    }
    else
    {
        echo("You are not logged");
        $Action = "Not Logged";
        header("Location: Trump.php?cameFromLogin=true&actionw=".$Action."#contact");
        exit();
    }

    mysqli_close($data_sa);
?>