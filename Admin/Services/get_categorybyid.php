<?php
    require('../../Utilities/_ConnectDatabase.php');
    $id = $_GET['id'];

    $query = mysqli_query($user,"select * from categorydetails where CategoryId = $id");

    $result = array();

    while($assoc = mysqli_fetch_assoc($query))
    {
        array_push($result,[
            "SubCat"=>$assoc['SubCategory'],
            "Name"=>$assoc['Name']
        ]);
    }
    echo json_encode($result);
?>