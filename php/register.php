<?php
	require_once 'connection.php';
	$user=$_POST['name'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$password1=$_POST['password1'];
	$country=$_POST['country'];
	$REG="";
	if($password!=$password1)
	{
		header('Location: signup.php');
		echo "Password did not match";
	}
	$querry="insert into users values('$user','$email','$password','$country','getdate()')";
	if($conn->query($querry) === true)
	{
		$Reg="New user Registered";
		echo "New User registered"; 
		
	}
	else {
		$Reg="Error Occured".$conn->error;
		echo "Error Occured" . $conn->error;
	}
	$conn->close();
?>