<?php
    $value = $_GET['query'];
    $formfield = $_GET['field'];

    if($formfield == "Username")
    {
        require('../../_ConnectDatabase.php');
        $query = mysqli_query($user,"select * from logindetails where Username like '$value'");
        $rows = mysqli_num_rows($query);
        if($rows == 0)
        {
            echo "*enter a valid username";
        }
        else
        {
            echo False;
        }
    }
    
    if($formfield == "Password")
    {
        if(!preg_match('/[A-Za-z]+[0-9^\w]/', $value) or strlen($value) < 8 or strlen($value) > 16)
        {
            echo "*enter a valid password";
        }

        else
        {
            echo False;
        }
    } 
?>