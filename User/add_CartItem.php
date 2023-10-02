<?php
    require('../Utilities/_LoginAccess.php');
    require('../Utilities/_ConnectDatabase.php');
    
    $ProductId = $_POST['Id'];
    $Price = $_POST['Price'];
    $Qty = $_POST['Qty'];
    $UserId = $_SESSION['Id'];

    
    $query = "SELECT * FROM cartdetails WHERE UserId = $UserId and ProductId = $ProductId";
    $result = mysqli_query($user,$query);
    if(mysqli_num_rows($result) < 1)
    {
        $query = "INSERT INTO cartdetails VALUE ($UserId,$ProductId,$Qty,$Qty*$Price)";
    }     
    
    else 
    {
        $query = "UPDATE cartdetails SET Quantity=Quantity+$Qty, Amount=Amount+($Qty*$Price) WHERE UserId = $UserId and ProductId=$ProductId";
    }

    if(mysqli_query($user,$query))
    {
        echo"<script> 
                alert('Product included in cart successfully.!!')
                window.location = `item display.php?pid=$ProductId`;    
                exit();
            </script>";
    }
    else 
    {
    echo"<script> 
            alert('There was an error to add product. please retry after some time..!')
            window.location = `item display.php?pid=$ProductId`;    
            exit();
        </script>";
    } 
?>