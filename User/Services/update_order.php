<?php
  require('../../Utilities/_LoginAccess.php');
  require('../../Utilities/_ConnectDatabase.php');

  $id = intval($_GET['id']);

  $query = "UPDATE salesorder SET OrderStatus='Cancelled' WHERE OrderId = $id";
  if(mysqli_query($user,$query))
  {
    $query = mysqli_query($user,"SELECT ProductId, Quantity FROM salesorderdetails WHERE OrderId = $id");
    while($assoc = mysqli_fetch_assoc($query))
    {
      $ProductId = $assoc['ProductId'];
      $subquery = mysqli_fetch_assoc(mysqli_query($user,"SELECT Status FROM productdetails WHERE ProductId = $ProductId"));

      if($subquery['Status'] != 'Live'){
        $subquery = "UPDATE productdetails SET Quantity=".intval($assoc['Quantity']).", Status='Live' WHERE ProductId=$ProductId";
      }
      else {
        $subquery = "UPDATE productdetails SET Quantity=Quantity+".intval($assoc['Quantity'])." WHERE ProductId=$ProductId";
      }
      mysqli_query($user,$subquery);
    }
    header ("location: ../order display.php");
  }
  else 
  {
    echo"<script> 
            alert('Something went wrong. please retry after some time..!');
            window.location = `../order display.php`;
        </script>";
    exit();
  }
?>