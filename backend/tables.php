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
$query = "CREATE TABLE if not exists poll(
    pid int(5) AUTO_INCREMENT UNIQUE NOT NULL,
    name varchar(100) NOT NULL,
    resdate date NOT NULL,
    NOC int(5) NOT NULL,
    reqid TEXT(100),
    cid int(5)
)";
//req ids not noemalised
$conn->query($query);

//                                          CANDIDATE TABLE
$query = "CREATE TABLE if not exists candidate(
    cid int(5) NOT NULL,
    name varchar(100) NOT NULL ,
    photo TEXT(300)
)";
$conn->query($query);

// $query = "show tables";
// $result = $conn->query($query);
// foreach($result as $i)
//     print_r($i);
// if(!$result){ die(("Error") . $conn->error());}
// if($result){ echo "sucess";}

//  Add two primary key to Candidate
$query = "alter table candidate add primary key(cid,name)";
$conn->query($query);

// Foreign key for poll and candidate
$query = "alter table poll add constraint poll_candidate_cid foreign key(cid) re ferences candidate(cid) ON DELETE CASCADE";
$conn->query($query);

//Drop tables using -  drop table users2,poll,candidate;