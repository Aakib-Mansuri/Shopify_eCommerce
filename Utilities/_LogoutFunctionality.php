<?php
    if(!isset($_SESSION))
    {
      session_start();
    }
    
    if(isset($_GET['logout']))
    {
        // destry cockees
        setcookie("Name",$name,time()-3600,'/');
        setcookie("Id",$id,time()-3600,'/');
        session_unset();
        header("location: index.php");
        exit();
    }
?>