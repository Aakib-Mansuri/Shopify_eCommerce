<?php
  require('../../Utilities/_ConnectDatabase.php');

  $id = intval($_GET['id']);
  $Category = $_POST['itemcat'];
  $SubCat = $_POST['subcat'];
   
  $query = 'UPDATE categorydetails SET Name="'.$Category.'",SubCategory="'.$SubCat.'" WHERE CategoryId = '.$id;

  if(mysqli_query($user,$query))
  {
    header ("location: ../category display.php");
  }
  else 
  {
    echo"<script> 
    alert('Something went wrong. please retry after some time..!')
    window.location = `../category display.php`;
    </script>";
    exit();
  }
?>