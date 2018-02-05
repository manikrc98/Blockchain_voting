<?php
    include "connection.php";

    function login(){
            global $conn;
           if(isset($_POST['username']) and isset($_POST['password'])){
               $username = $_POST['username'];
               $password = $_POST['password'];
               $hash = "$2y$10$";
               $salt = "thisisjustatwentytwo22";
               $hash = $hash . $salt;
               $enc_pass = crypt($password,$hash);
               $query = "SELECT * FROM users WHERE ";
               $query .= "email = '$username' and password = '$enc_pass'";
               $result = $conn->query($query);
               if(!$result){die(('Query Failed') . $conn->error());}
               elseif ($result->num_rows == 1)
               {

                    $_SESSION['$userName']=$result->fetch_assoc()['username'];
                    echo "Welcome " . $_SESSION['$userName'];
                    sleep(1);
                    echo " <script>window.location.assign('login_success.php'); </script>";
               }
               else
               {
                   echo "Error: Invalid Credentials!";
                   session_destroy();
               }
           }
           else{
                echo "Error: Please Enter Username and Password";
           }
           $conn->close();
    }



    function register(){
        global $conn;
        $username=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $password1=$_POST['password1'];
        $country=$_POST['country'];
        if($password===$password1)
        {
            mysqli_real_escape_string($conn,$username);
            mysqli_real_escape_string($conn,$password);
            mysqli_real_escape_string($conn,$password1);
            mysqli_real_escape_string($conn,$email);
            mysqli_real_escape_string($conn,$country);
            //Hashing Function
            $hash = "$2y$10$";
            $salt = "thisisjustatwentytwo22";
            $hash = $hash . $salt;
            $enc_pass = crypt($password,$hash);
            $querry="insert into users values('$username','$email','$enc_pass','$country')";
            if($conn->query($querry) === true)
            {
                echo "Welcome $username , please Login to continue.";
            }
            else {
                echo "Error Occured " . $conn->error . " please Signup Again with valid details.";
            }
        }
        else
        {
            echo "Password did not match, Please enter the details again.";
        }

        $conn->close();
    }

    function logout()
    {
        echo "<center>Loging Out of " .$_SESSION['$userName']  . " account</center>";
        session_destroy();
        sleep(1.5);
        echo " <script>window.location.assign('index.php'); </script>";
    }
?>