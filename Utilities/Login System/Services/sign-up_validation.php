<?php
    $value = $_GET['query'];
    $formfield = $_GET['field'];

    if($formfield == "Name")
    {
        if(strlen($value) <= 0)
        {
            echo "*enter a valid name";
        }

        else
        {
            echo False;
        }
    }
    
    if($formfield == "ContactNumber")
    {
        if(strlen($value) != 10 || !preg_match("/[0-9]/", $value))
        {
            echo "*enter a valid contact";
        }

        else
        {
            echo False;
        }
    }

    if($formfield == "Email")
    {
        if(!preg_match("/[a-z0-9]+@[a-z]+\.[a-z]{2,3}/", $value))
        {
            echo "*enter a valid email";
        }
        else
        {
            echo False;
        }
    }

    if($formfield == "Add")
    {
        if(strlen($value) <= 0)
        {
            echo "*enter a valid address";
        }
        else
        {
            echo False;
        }
    } 

    if($formfield == "Username")
    {
        if(!preg_match('/[a-z]+[0-9_.]/', $value) or strlen($value) < 5 or strlen($value) > 20)
        {
            echo "*enter a valid username";
        }
        else
        {
            require('../../_ConnectDatabase.php');
            $query = mysqli_query($user,"select * from logindetails where Username like '$value'");
            $rows = mysqli_num_rows($query);
            if($rows != 0)
            {
                echo "*username not available try another.";
            }
            else
            {
                echo False;
            }
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