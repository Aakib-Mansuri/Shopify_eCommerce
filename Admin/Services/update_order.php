<?php
  require('../../Utilities/_LoginAccess.php');
  require('../../Utilities/_AdminLoginAccess.php');
  require('../../Utilities/_ConnectDatabase.php');

  $q = $_GET['q'];
  $id = intval($_GET['id']);
  $status = $_GET['status'];

  if($status == 'Transit')
  {
    $status = 'In Transit';
  }
  $query = "UPDATE salesorder SET OrderStatus='$status' WHERE OrderId = $id";

  if(mysqli_query($user,$query))
  {
    if($status == 'Cancelled'){
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
    }
    header ("location: ../order display.php?q=$q");
  }
  else 
  {
    echo"<script> 
            alert('Something went wrong. please retry after some time..!')
            window.location = `../order display.php?q=$q`;
        </script>";
    exit();
  }
?>