<?php
    if(!isset($_SESSION))
    {
      session_start();
    }
    
    if(!isset($_SESSION['Name']) or !isset($_SESSION['Id']))
    {
      header("location: ../Utilities/Login System/login page.php");    
      exit();
    }
?>