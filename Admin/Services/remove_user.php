<?php
    require('../../Utilities/_ConnectDatabase.php');

    $id = $_GET['id'];
    $query = "delete from userdetails where UserId = $id";
    mysqli_query($user,$query);
    $query = "delete from logindetails where UserId = $id";
    mysqli_query($user,$query);
    header ("location: ../user display.php");
    exit();
?>
