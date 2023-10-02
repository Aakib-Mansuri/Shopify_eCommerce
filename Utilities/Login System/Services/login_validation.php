<?php
    require('../../_ConnectDatabase.php');
    $inputElement = $_GET['inputElement'];
    $inputValue = $_GET['inputValue'];
    $Username = $_GET['Username'];
    $query = "select * from logindetails where UserName like '$Username'";
    $query = mysqli_query($user,$query);
    $rows = mysqli_num_rows($query);

    if($inputElement == 'Username')
    {
        if($rows == 1)
        {
            echo "";
        }

        else 
        {
            echo "*enter a valid username";    
        }
    }

    if($inputElement == 'Password')
    {
        if($rows == 1)
        {
            $associate = mysqli_fetch_assoc($query);
            $result = $associate['Password'];
            if(password_verify($inputValue,$result))
            {
                echo "";
            }

            else 
            {
                echo "*enter a valid password";    
            }
        }
        else 
        {
            echo "*enter a valid details";    
        }
    }
?>