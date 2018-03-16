<?php
// echo "test";
include 'connection.php';
//                                          USERS TABLE
$query = "CREATE TABLE if not exists users2 (
    userid int(5) AUTO_INCREMENT UNIQUE NOT NULL,
    name varchar(100) NOT NULL,
    gender varchar(6) NOT NULL,
    email varchar(200) PRIMARY KEY,
    password TEXT(200) NOT NULL,
    phone int(10) NOT NULL,
    age int(3) NOT NULL,
    interest TEXT(200) NOT NULL,
    time_stamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    country TEXT(50) NOT NULL,
    availids TEXT(100)
)";
//available ids not normalised
$conn->query($query);

//                                          POLL TABLE
// noc = number of candidates
$query = "CREATE TABLE if not exists campaign(
    campId int(5) AUTO_INCREMENT UNIQUE NOT NULL,
    campName varchar(100) NOT NULL,
    campCat varchar(20) NOT NULL,
    candUa varchar(10) NOT NULL,
    campDd date NOT NULL,
    candNum int(5) NOT NULL,
    userVP TEXT(100)
)";
//req ids not noemalised
$conn->query($query);

//                                          CANDIDATE TABLE
$query = "CREATE TABLE if not exists candidate(
    campID int(5) NOT NULL,
    candName varchar(100) NOT NULL ,
    candAge int(3) NOT NULL,
    candPic TEXT(300)
)";
$conn->query($query);

// $query = "show tables";
// $result = $conn->query($query);
// foreach($result as $i)
//     print_r($i);
// if(!$result){ die(("Error") . $conn->error());}
// if($result){ echo "sucess";}

//  Add two primary key to Candidate
$query = "alter table candidate add primary key(campID,candN)";
$conn->query($query);

// Foreign key for poll and candidate
$query = "alter table candidate add constraint camp_cand_campid foreign key(campId) references campaign(campId) ON DELETE CASCADE";
$conn->query($query);

//Drop tables using -  drop table users2,poll,candidate;