<?php
    include "connection.php";
    include_once "tables.php";

    function login($username,$password){
            global $conn;
           if(isset($_POST['username']) and isset($_POST['password'])){
                // $username = $_POST['username'];
                // $password = $_POST['password'];
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
                   
                    // Cookie setting for Remeber ME
                    // ob_start();
                    $expiration = time() + (60*60*24*30*2);
                    $name=$result->fetch_assoc()['username'];
                    setcookie('name',$name,$expiration);     //name,value,expiration
                    // $_SESSION['$userName']=$result->fetch_assoc()['username'];   //not working, should work
                    setcookie('pass',$enc_pass,$expiration);
                    // ob_end_flush();
                   
                    
                    //Session Creation
                    // $_SESSION['$userName']=$result->fetch_assoc()['username'];
                    // echo "Welcome " . $_SESSION['$userName'];
                    // sleep(1);
                    echo "<script>window.location.assign('loginSuccess.php'); </script>";
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


    function rememberme()
    {
        // if(isset($_POST[rm])){
            // $expiration = time() + (60*60*24*30*2);
            // echo "test";
            // setcookie("test","abc",(time()+(60*60*1)));
            // setcookie("name",$_POST['username'],(time() + (60*60*24*30*2)));     //name,value,expiration
            // echo "hii " . $_COOKIE["name"] . " ";
            // setcookie('pass',$_POST['password']);
        // }
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
        echo "<center>Loging Out of " .$_COOKIE['name']  . " 's account</center>";
        $expiration = time() - (60*60*24*30*2);
        setcookie('name','',$expiration);
        setcookie('pass','',$expiration);
        sleep(1.5);
        session_destroy();
        echo " <script>window.location.assign('index.php'); </script>";
    }

    function camp_create($campDd)
    {
        global $conn;
        $campName = $_SESSION['campName'];
        $candNum  = $_SESSION['candNum'];
        $campCat  = $_SESSION['campCat'];
        $candUa   = $_SESSION['candUa'];
        // $campDd   = $_POST['campDd'];
        $querry = "insert into campaign(campName,candNum,campCat,candUa,campDd) values ('$campName',$candNum,'$campCat','$candUa','$campDd')";
        $result = $conn->query($querry);
        if($result === true)
            {
                echo "Working, insterted";
            }
            else {
                echo "Error Occured " . $conn->error ;
            }
        $query = "select campId from campaign where campName = '$campName' and campDd = '$campDd' and campCat = '$campCat' and candUa = '$candUa' and candNum = $candNum";
        $result = $conn->query($query);
        if($result === true)
            {
                echo "Working, insterted";
            }
            else {
                echo "Error Occured " . $conn->error ;
            }
        $_SESSION['campId'] = $result->fetch_assoc()['campId'];
        echo $result->fetch_assoc()['campId'];
    }

    function cand_ins()
    {
        
    }

    function query_test($result)
    {
        
    }
?>