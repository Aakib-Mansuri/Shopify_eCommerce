<?php
    require('../../Utilities/_ConnectDatabase.php');
    $category = $_GET['category'];
    $query = mysqli_query($user,'select SubCategory from categorydetails where Name like "%'.$category.'%"');
    $result = array();

    while($assoc = mysqli_fetch_assoc($query))
    {
        array_push($result,$assoc['SubCategory']);
    }
    echo json_encode($result);
?>