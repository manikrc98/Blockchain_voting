<?php
// echo "test";
include 'connection.php';
//                                          USERS TABLE
$query = "CREATE TABLE if not exists users (
    userid int(5) AUTO_INCREMENT UNIQUE NOT NULL,
    name varchar(100) NOT NULL,
    gender varchar(6) NOT NULL,
    email varchar(200) PRIMARY KEY,
    password TEXT(200) NOT NULL,
    phone bigint(50) NOT NULL UNIQUE,
    age int(3) NOT NULL,
    country TEXT(50) NOT NULL,
    uwaddress varchar(150) NOT NULL,
    time_stamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
//available ids not normalised
$conn->query($query);

$query = "CREATE TABLE if not exists interest(
    intid int(5) AUTO_INCREMENT PRIMARY KEY,
    userid int(5) NOT NULL,
    iName varchar(15) NOT NULL
)";
query_test($conn->query($query));

//                       INSERT INTO interest values($uid,'$i')                   POLL TABLE
// noc = number of candidates
$query = "CREATE TABLE if not exists campaign(
    campId int(5) AUTO_INCREMENT UNIQUE NOT NULL,
    campName varchar(100) NOT NULL,
    campCat varchar(20) NOT NULL,
    candUa varchar(10) NOT NULL,
    campDd date NOT NULL,
    candNum int(5) NOT NULL,
    campDesc text(50) NOT NULL,
    userVP TEXT(100)
)";
$conn->query($query);

//                                          CANDIDATE TABLE
$query = "CREATE TABLE if not exists candidate(
    candId int(5) AUTO_INCREMENT UNIQUE NOT NULL,
    campId int(5) NOT NULL,
    candName varchar(100) NOT NULL ,
    candAge int(3) NOT NULL,
    candPic TEXT(300),
    cwAddress varchar(150)
)";
$conn->query($query);

// $query = "show tables";
// $result = $conn->query($query);
// foreach($result as $i)
//     print_r($i);
// if(!$result){ die(("Error") . $conn->error());}
// if($result){ echo "sucess";}

//  Add two primary key to Candidate
$query = "alter table candidate add Unique key(campId,candName)";
$conn->query($query);

// Foreign key for poll and candidate
$query = "alter table candidate add constraint camp_cand_campid foreign key(campId) references campaign(campId) ON DELETE CASCADE";
$conn->query($query);

// adding interest primary key
$query = "alter table interest add UNIQUE KEY uk_uid_iName(userid,iName)";
$conn->query($query);

$query = "alter table interest add constraint interest_users_uid foreign key(userid) references users(userid) ON DELETE CASCADE";
$conn->query($query);
//Drop tables using -  drop table users2,poll,candidate;