<?php
 //form submition
 if($_SERVER['REQUEST_METHOD'] == 'POST')
 {
    if(!isset($_POST['Password']))
    {
        $Username = $_POST['Username'];
        header("location: ../forgot pass.php?Username=$Username");
    }
    
    else
    {
        require('../../_ConnectDatabase.php');
        $Username = $_POST['Username'];
        $Password = password_hash($_POST['Password'],PASSWORD_DEFAULT);
        $query = "update logindetails set Password = '$Password' where UserName like '$Username'";

        if(mysqli_query($user,$query))
        {
            header("location: ../login page.php");
        }

        else 
        {
            header("location: ../forgot pass.php");
        }
    }
  }
?>