<?php
    require('../../Utilities/_ConnectDatabase.php');
    
    $query = "SELECT * FROM userdetails join logindetails on logindetails.UserId = userdetails.UserId where logindetails.UserType != 0";
    $query = mysqli_query($user,$query);
    $result = array();

    while($assoc = mysqli_fetch_assoc($query))
    {
        array_push($result,[
                    "Id"=>$assoc['UserId'],
                    "Name"=>$assoc['Name'],
                    "Cno"=>$assoc['ContactNumber'],
                    "Mail"=>$assoc['Email'],
                    "Add"=>$assoc['Address']
                ]);
    }
    echo json_encode($result);
?>