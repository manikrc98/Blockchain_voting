<?php
	require_once 'connection.php';
	$user=$_POST['name'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$password1=$_POST['password1'];
	$country=$_POST['country'];
	$REG="";
	if($password===$password1)
	{
		$querry="insert into users values('$user','$email','$password','$country')";
		if($conn->query($querry) === true)
		{
				//header('Location: ../signup.php');
			$Reg="New user Registered";
			echo "New User registered"; 
			
		}
		else {
			//header('Location: ../signup.php');
			$Reg="Error Occured".$conn->error;
			echo "Error Occured" . $conn->error;
		}
	}
	else
	{
		header('Location: ../signup.php');
		echo "Password did not match";
	}
	
	$conn->close();
?>