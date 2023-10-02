<?php
    require('../../Utilities/_ConnectDatabase.php');
    $id = $_GET['id'];
    $query = "SELECT cat.Name as cname,cat.SubCategory, pr.Name as pname, pr.Description, pr.Price, pr.Quantity, pr.ImageUrl, pr.Status FROM productdetails pr join categorydetails cat on pr.CategoryId = cat.CategoryId WHERE pr.ProductId = $id";

    $query = mysqli_query($user,$query);
    $result = ["Head"=>"Product list","Body"=> array()];
    $assoc = mysqli_fetch_assoc($query);
    array_push($result['Body'],[
    "cat"=> $assoc['cname'],
    "Subcat"=> $assoc['SubCategory'],
    "Name"=> $assoc['pname'],
    "Price"=> $assoc['Price'],
    "Qty"=> $assoc['Quantity'],
    "Image"=>$assoc['ImageUrl'],
    "Status"=> $assoc['Status'],
    "Des"=> $assoc['Description'],
    ]);
    echo json_encode($result);
?>