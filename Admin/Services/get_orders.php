<?php
    require('../../Utilities/_LoginAccess.php');
    require('../../Utilities/_AdminLoginAccess.php');
    require('../../Utilities/_ConnectDatabase.php');
    $status = $_GET['q'];
    $flag = false;

    if($status == 'all')
    {
        $query = "SELECT * FROM salesorder";
    }

    else if($status == 'transit')
    {
        $query = "SELECT * FROM salesorder WHERE OrderStatus = 'In Transit'";
    }
    else {
        $query = "SELECT * FROM salesorder WHERE OrderStatus = '$status'";
    }
    
    $query = mysqli_query($user,$query);
    if(mysqli_num_rows($query) > 0)
    {
        $result = array();
        while($assoc = mysqli_fetch_assoc($query))
        {
            $order = [
                "OrderId"=>$assoc['OrderId'],
                "DateTime"=>$assoc['DateTime'],
                "Amount"=>$assoc['Amount'],
                "BillStatus"=>$assoc['BillStatus'],
                "OrderStatus"=>$assoc['OrderStatus'],
                "Products"=> array()
            ];

            $UserId = $assoc['UserId'];
            $subquery = mysqli_query($user,"SELECT * FROM userdetails WHERE UserId = $UserId");
            if(mysqli_num_rows($subquery) > 0)
            {
                $subassoc = mysqli_fetch_assoc($subquery);
                $order["UserName"]= $subassoc['Name'];
                $order["UserCno"]= $subassoc['ContactNumber'];
                $order["UserAdd"]= $subassoc['Address'];
            }
            else {
                $flag = true;
                break;
            }
            
            $OrderId = $assoc['OrderId'];
            $subquery = mysqli_query($user,"SELECT * FROM salesorderdetails WHERE OrderId = $OrderId");
            if(mysqli_num_rows($subquery) > 0)
            {
                while($subassoc = mysqli_fetch_assoc($subquery))
                {
                    $ProductId = $subassoc['ProductId'];
                    $Productquery = mysqli_query($user,"SELECT cat.Name as cname,cat.SubCategory, pr.Name as pname, pr.Description FROM productdetails pr join categorydetails cat on pr.CategoryId = cat.CategoryId WHERE pr.ProductId = $ProductId");
                    if(mysqli_num_rows($Productquery) > 0)
                    {
                        $productassoc = mysqli_fetch_assoc($Productquery);
                        array_push($order['Products'],[
                        'Category'=> $productassoc['cname'],
                        'ProductId'=> $ProductId,
                        'ProductName'=> $productassoc['pname'],
                        'SubCategory'=> $productassoc['SubCategory'],
                        'Description'=> $productassoc['Description'],
                        "Quantity"=> $subassoc['Quantity'],
                        "Amount"=> $subassoc['Amount']
                    ]);
                    }
                    else {
                        $flag = true;
                        break;
                    }
                }
            }
            else {
                $flag = true;
                break;
            }
            array_push($result,$order);
        }
    }
    else {
        $flag = true;
    }

    if($flag){
        echo false;
    }
    else {
        echo json_encode($result);
    }
?>