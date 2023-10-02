<?php
    require('../../Utilities/_ConnectDatabase.php');
    $query = mysqli_query($user,"select distinct(Name) from categorydetails order by Name");
    $result = array();

    while($assoc = mysqli_fetch_assoc($query))
    {
        array_push($result,$assoc['Name']);
    }
    echo json_encode($result);
?>