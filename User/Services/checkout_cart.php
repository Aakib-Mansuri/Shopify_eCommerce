<?php
    require('../../Utilities/_LoginAccess.php');
    require('../../Utilities/_ConnectDatabase.php');
    
    $Amount = $_GET['Amount'];
    $UserId = $_SESSION['Id'];
    $query = "INSERT INTO salesorder (`DateTime`,`UserId`,`Amount`,`BillStatus`,`OrderStatus`) VALUES ('".date('Y-m-d')."',$UserId,$Amount,'Not Generate','Pending')";
    
    if(mysqli_query($user,$query))
    {
        $query = "SELECT OrderId FROM salesorder WHERE UserId = $UserId AND OrderId NOT IN (SELECT OrderId FROM salesorderdetails)";
        $OrderId = mysqli_fetch_assoc(mysqli_query($user,$query))['OrderId'];

        $query = "INSERT INTO salesorderdetails SELECT $OrderId, ProductId, Quantity, Amount FROM cartdetails WHERE UserId = $UserId";
        if(mysqli_query($user,$query))
        {
            $query = mysqli_query($user,"SELECT ProductId, Quantity FROM cartdetails WHERE UserId = $UserId");
            while($assoc = mysqli_fetch_assoc($query))
            {
                $ProductId = $assoc['ProductId'];
                $subquery = mysqli_fetch_assoc(mysqli_query($user,"SELECT Quantity FROM productdetails WHERE ProductId = $ProductId"));

                if(intval($subquery['Quantity']) == intval($assoc['Quantity'])){
                    $subquery = "UPDATE productdetails SET Quantity=0, Status='Out of stock' WHERE ProductId=$ProductId";
                }
                else {
                    $subquery = "UPDATE productdetails SET Quantity=Quantity-".intval($assoc['Quantity'])." WHERE ProductId=$ProductId";
                }

                mysqli_query($user,$subquery);
                $subquery = "DELETE FROM cartdetails WHERE UserId = $UserId AND ProductId=$ProductId";
                mysqli_query($user,$subquery);
            }
        }
    }
    header("location: ../cart display.php");
    exit();
?>