<?php
    if(!isset($_SESSION))
    {
      session_start();
    }
    
    if(isset($_SESSION['Name']))
    {
        echo $_SESSION['Name'];
    }
    else 
    {
        echo false;
    }
?>