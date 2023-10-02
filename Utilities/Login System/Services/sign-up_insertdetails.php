<?php
    require('../../_ConnectDatabase.php');
    $Name = $_POST['Name'];
    $ContactNumber = $_POST['ContactNumber'];
    $Email = $_POST['Email'];
    $Address = $_POST['Add'];
    $Username = $_POST['Username'];
    $Password = password_hash($_POST['Password'],PASSWORD_DEFAULT);
    
    $query = "INSERT INTO `logindetails`(`UserName`, `Password`, `UserType`) VALUES ('$Username','$Password','1')";
    if(mysqli_query($user,$query))
    {
        $UserId = mysqli_fetch_assoc(mysqli_query($user,"select * from logindetails where UserName like '$Username'"))['UserId'];
        $query = "insert into Userdetails values ('$UserId','$Name','$ContactNumber','$Email','$Address')";
        if(mysqli_query($user,$query))
        {
            header("location: ../login page.php");
        }
        else 
        {
            header("location: ../Sign-up page.php");
            echo"<script> alert('Technical error phase two');</script>";     
        }
    }

    else 
    {
        header("location: ../Sign-up page.php");
        echo"<script> alert('Technical error phase one');</script>";    
    }
?>