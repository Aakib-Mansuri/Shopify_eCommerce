<?php
    require('../../Utilities/_ConnectDatabase.php');
    $query = mysqli_query($user,"select * from categorydetails order by Name");
    $result = array();

    while($assoc = mysqli_fetch_assoc($query))
    {
        array_push($result,[
                    "Id"=> $assoc['CategoryId'],
                    "Name"=>$assoc['Name'],
                    "SubCategory"=>$assoc['SubCategory']]);
    }
    echo json_encode($result);
?>