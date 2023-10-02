<?php
  require('../../Utilities/_ConnectDatabase.php');

  $q = $_GET['q'];
  $id = intval($_GET['id']);
  $Name = $_POST['itemname'];
  $Description = $_POST['itemdesc'];
  $Category = $_POST['itemcat'];
  $Price = floatval($_POST['itemprice']);
  $Inventory = intval($_POST['iteminv']);
  $Status = 'Out of stock';
 
  if($Inventory > 0)
  {
    $Status = 'Live';
  }

  $query = 'UPDATE productdetails SET CategoryId='.$Category.',Name="'.$Name.'",Description="'.$Description.'",Price='.$Price.',Quantity='.$Inventory.',Status="'.$Status.'" WHERE ProductId = '.$id;

  if(mysqli_query($user,$query))
  {
    header ("location: ../product display.php?q=$q");
  }
  else 
  {
    echo"<script> 
    alert('Something went wrong. please retry after some time..!')
    window.location = `../edit product.php?q=$q&value=$id`;
    </script>";
    exit();
  }
?>