<?php
    require('../../Utilities/_ConnectDatabase.php');
    $q = $_GET['q'];
    $value = $_GET['value'];

    if($q == 'all')
    {
        $query = "SELECT cat.Name as cname,cat.SubCategory, pr.ProductId, pr.Name as pname, pr.Description, pr.Price, pr.Quantity, pr.Status FROM productdetails pr join categorydetails cat on pr.CategoryId = cat.CategoryId";

        $query = mysqli_query($user,$query);
        $result = ["Head"=>"Product list","Body"=> array()];
        while($assoc = mysqli_fetch_assoc($query))
        {
            array_push($result['Body'],[
                "Id"=> $assoc['ProductId'],
                "Name"=> $assoc['pname'],
                "Price"=> $assoc['Price'],
                "Qty"=> $assoc['Quantity'],
                "Status"=> $assoc['Status'],
                "Category"=> $assoc['cname'],
                "Des"=> $assoc['Description'],
                "Subcat"=> $assoc['SubCategory']
            ]);
        }
    }

    else if($q == 'id')
    {
        $query = "SELECT CategoryId, Name, Description, Price, Quantity FROM productdetails where ProductId = $value";

        $query = mysqli_query($user,$query);
        $result = ["Head"=>"Search By $q","Body"=> array()];
        while($assoc = mysqli_fetch_assoc($query))
        {
            array_push($result['Body'],[
                "CatId"=> $assoc['CategoryId'],
                "Name"=> $assoc['Name'],
                "Des"=> $assoc['Description'],
                "Price"=> $assoc['Price'],
                "Qty"=> $assoc['Quantity']
            ]);
        }
    }

    else
    {
        $query = "SELECT cat.Name as cname,cat.SubCategory, pr.ProductId, pr.Name as pname, pr.Description, pr.Price, pr.Quantity, pr.Status FROM `productdetails` pr join categorydetails cat on pr.CategoryId = cat.CategoryId where cat.Name like '%$value%' or cat.SubCategory like '%$value%' or pr.Name like '%$value%' or pr.Description like '%$value%'";

        $query = mysqli_query($user,$query);
        $result = ["Head"=>"Search results for $value","Body"=> array()];

        while($assoc = mysqli_fetch_assoc($query))
        {
            array_push($result['Body'],[
                "Id"=> $assoc['ProductId'],
                "Name"=> $assoc['pname'],
                "Price"=> $assoc['Price'],
                "Qty"=> $assoc['Quantity'],
                "Status"=> $assoc['Status'],
                "Category"=> $assoc['cname'],
                "Des"=> $assoc['Description'],
                "Subcat"=> $assoc['SubCategory']
            ]);
        }
    }
    echo json_encode($result);
?>