<?php
    $header = "location: ../User/index.php";

    if(isset($_COOKIE["Name"]) and isset($_COOKIE["Id"]))
    {
        $name = $_COOKIE["Name"];
        $id = $_COOKIE["Id"];

        if(!isset($_SESSION))
        {
         session_start();
        }

        $_SESSION['Name'] = $name;
        $_SESSION['Id'] = $id;

        require('_ConnectDatabase.php');
        $query = mysqli_query($user,"select * from logindetails where UserId = $id");
        if(mysqli_fetch_assoc($query)['UserType'] == 0)
        {
            $header = "location: ../Admin/index.php";
        }
    }
    header($header);    
?>