<?php
    require('../../Utilities/_ConnectDatabase.php');
    
    $Category = $_POST['itemcat'];
    $subcat = $_POST['subcat'];

    $query = 'INSERT INTO categorydetails (Name,SubCategory) VALUE ("'.$Category.'","'.$subcat.'")';

    if(mysqli_query($user,$query))
    {
        echo"<script>
                let confirmation = confirm('Category has been added successfuly. Do you want to add more Category','Yes');
                if(confirmation)
                {
                    window.location = `../add category.php`;    
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
            window.location = `../add category.php`;    
            exit();
        </script>";
    } 
?>