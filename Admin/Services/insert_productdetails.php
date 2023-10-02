<?php
    require('../../Utilities/_ConnectDatabase.php');
    
    $Category = intval($_POST['itemcat']);
    $Name = $_POST['itemname'];
    $Description = $_POST['itemdesc'];
    $Price = floatval($_POST['itemprice']);
    $Inventory = intval($_POST['iteminv']);

    $extension = pathinfo($_FILES['itemfile']['name'][0],PATHINFO_EXTENSION);
    $New_Path = '../Product Images/'.date("Y-m-d",time()).' '.$Name.'.'.$extension;
    $Image = $New_Path;
    move_uploaded_file($_FILES['itemfile']['tmp_name'][0],'../'.$New_Path);

    $query = 'insert into productdetails (CategoryId, Name, Description, Price, Quantity, ImageUrl, Status) value ('.$Category.',"'.$Name.'","'.$Description.'",'.$Price.','.$Inventory.',"'.$Image.'","Live")';

    if(mysqli_query($user,$query))
    {
        echo"<script>
                let confirmation = confirm('Product has been added successfuly. Do you want to add more product','Yes');
                if(confirmation)
                {
                    window.location = `../add item.php`;    
                    exit();    
                }

                else
                {
                    window.location= `../index.php`;    
                    exit();
                }
                </script>";
    }
    else 
    {
    echo"<script> 
            alert('There was an error to add product. please retry after some time..!')
            window.location = `../add item.php`;    
            exit();
        </script>";
    } 
?>