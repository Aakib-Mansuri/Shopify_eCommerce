<?php
    require('../../Utilities/_LoginAccess.php');
    require('../../Utilities/_ConnectDatabase.php');
    
    $Action = $_GET['Action'];
    $ProductId = $_GET['Id'];
    $UserId = $_SESSION['Id'];
    $query='';

    if ($Action == 'delete')
    {
        $query = "DELETE FROM cartdetails WHERE UserId = $UserId and ProductId=$ProductId";
    }

    else if($Action == 'add')
    {
        $Price = $_GET['Price'];
        $query = "UPDATE cartdetails SET Quantity=Quantity+1, Amount=Amount+$Price WHERE UserId = $UserId and ProductId=$ProductId";
    }

    else
    {
        $Price = $_GET['Price'];
        $query = "UPDATE cartdetails SET Quantity=Quantity-1, Amount=Amount-$Price WHERE UserId = $UserId and ProductId=$ProductId";
    }

    mysqli_query($user,$query);
    header("location: ../cart display.php");
    exit();
?>