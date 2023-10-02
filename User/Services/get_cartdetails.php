<?php
    require('../../Utilities/_LoginAccess.php');
    require('../../Utilities/_ConnectDatabase.php');

    $id = $_SESSION['Id'];
    $query = "SELECT pr.ProductId,pr.Name, cat.SubCategory, pr.Description, pr.Price, pr.Quantity AS AvailableQty, pr.ImageUrl, cart.Quantity AS CartQty, cart.Amount 
        FROM productdetails pr
        JOIN categorydetails cat
        ON cat.CategoryId = pr.CategoryId
        JOIN cartdetails cart
        ON cart.ProductId = pr.ProductId
        WHERE cart.UserId = $id AND pr.Status = 'Live'";
    
    $query = mysqli_query($user,$query);
    $result = ["Head"=>"Cart list","Body"=> array()];
    while($assoc = mysqli_fetch_assoc($query))
    {
        array_push($result['Body'],[
            "Id"=> $assoc['ProductId'],
            "Name"=> $assoc['Name'],
            "Subcat"=> $assoc['SubCategory'],
            "Des"=> $assoc['Description'],
            "Price"=> $assoc['Price'],
            "AvailableQty"=> $assoc['AvailableQty'],
            "Image"=>$assoc['ImageUrl'],
            "CartQty"=> $assoc['CartQty'],
            "Amount"=> $assoc['Amount']
        ]);
    }
    echo json_encode($result);
?>