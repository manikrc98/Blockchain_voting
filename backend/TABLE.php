<?php
    include "connection.php";
    $query = "CREATE TABLE if NOT EXISTS ";
    $query .= "users(username text not null,email varchar(80) PRIMARY KEY, ";
    $query .=  "password varchar(200) not null,country varchar(25) default='India')";
    $conn->query($query);
?>