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
	    mysqli_real_escape_string($conn,$user);
	    mysqli_real_escape_string($conn,$password);
	    mysqli_real_escape_string($conn,$password1);
	    mysqli_real_escape_string($conn,$email);
	    mysqli_real_escape_string($conn,$country);
	    //Hashing Function
	    $hash = "$2y$10$";
	    $salt = "thisisjustatwentytwo22";
	    $hash = $hash . $salt;
        $enc_pass = crypt($password,$hash);
		$querry="insert into users values('$user','$email','$enc_pass','$country')";
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