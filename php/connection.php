<?php
	$server = "localhost";
	$username = "Voting";
	$password = "akshatah";
	$database="votingDB";
	$conn = new mysqli($server,$username,$password,$database);
	if($conn->connect_error)
	{
		die("Error in connecting" . $conn->connect_error);
	}
	
?>