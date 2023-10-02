<?php
    require('../../Utilities/_ConnectDatabase.php');

    $q = $_GET['q'];
    $id = $_GET['id'];
    $query = mysqli_query($user,"select * from productdetails where ProductId = $id");

    $imgpath = mysqli_fetch_assoc($query)['ImageUrl'];
    unlink("../".$imgpath);
    $query = "delete from productdetails where ProductId = $id";
    
    if(mysqli_query($user,$query))
    {
        $mssg = 'product removed sucessfuly';
    }
    else 
    {
        $mssg = 'Something went wrong. please try after some time';
    }
    
    echo "<script>
            window.location = `../product display.php?q=$q`;
            alert('$mssg');
            exit();
        </script>";
?>
