<?php
	require 'connection.php';
//LOGIN
    session_start();
    if (isset($_POST['user']) and isset($_POST['password']))
    {
        $user = $_POST['user'];
        $password = $_POST['password'];
        $query = "SELECT * FROM users WHERE email='$user' and password='$password'";
        $conn->query($query);
        //$sql = "SELECT email, password FROM users";
        //$result1 = $conn->query($sql);
        // if ($result1->num_rows > 0) 
        // {
        //     while($row = $result1->fetch_assoc()) 
        //     {
        //         echo "User: " . $row["email"]. " - Password: " . $row["password"]. " " . "<br>";
        //     }
        // }
        $result = $conn->query($query) or die($conn->connect_error);
        //echo "This is ".$result->fetch_assoc()["username"]."<br>";
        $count = $result->num_rows;
        if ($count == 1){
            $_SESSION['user'] = $result->fetch_assoc()["username"];
        }
        else
        {
            $fmsg = "Invalid Login Credentials.";
        }
    }
    if (isset($_SESSION['user']))
    {
        $user = $_SESSION['user'];
        echo "Hey " . $user . " ,you have successfully logged in.";
    }else{
        echo "Invalid Login";
    } 
    $conn->close();
?>