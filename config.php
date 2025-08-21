<?php
    $serverName="localhost";
    $userName ="root";
    $password="";
    $db ="crud_php";

 $conn=new mysqli($serverName,$userName,$password,$db);

    if ($conn->connect_error) {
        die("Connection Not Succeed".$conn->connect_error);
    }

    else
        echo "Connected successfully";
?>