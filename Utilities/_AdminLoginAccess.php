<?php
    require('_ConnectDatabase.php');
    if(!isset($_SESSION))
    {
      session_start();
    }

    $id = $_SESSION['Id'];
    $query = mysqli_query($user,"select * from logindetails where UserId = $id");

    if(mysqli_fetch_assoc($query)['UserType'] != 0)
    {
        header("location: ../User/index.php");    
        exit();
    }
?>