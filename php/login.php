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
    // echo "Connected Properly";
//LOGIN
    session_start();
    if (isset($_POST['username']) and isset($_POST['password']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "SELECT * FROM users WHERE username='$username' and password='$password'";
        // $sql = "SELECT username, password FROM users";
        // $result1 = $conn->query($sql);
        // if ($result1->num_rows > 0) 
        // {
        //     while($row = $result1->fetch_assoc()) 
        //     {
        //         echo "User: " . $row["username"]. " - Password: " . $row["password"]. " " . "<br>";
        //     }
        // }
        $result = $conn->query($query) or die($conn->connect_error);
        echo "This is ".$result->fetch_assoc()["username"]."<br>";
        $count = $result->num_rows;
        if ($count == 1){
            $_SESSION['username'] = $username;
        }
        else
        {
            $fmsg = "Invalid Login Credentials.";
        }
    }
    if (isset($_SESSION['username']))
    {
        $username = $_SESSION['username'];
        echo "Hai " . $username . "";
    }else{
        echo "This is the Members Area";
    } 
    $conn->close();
?>