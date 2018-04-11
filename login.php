<?php include "backend/connection.php"; ?>
<?php
    include "backend/functions.php";
    session_start();
    if(isset($_COOKIE['name']))
    {
      echo "<script>window.location.assign('loginSuccess.php'); </script>";
    }
    // if(!isset($_POST['login']))
      // $_SESSION['crPage']="login.php";
    // include "backend/index.php";
    // print_r($_SESSION);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
      .sstyle{
        font-family: lato;
        margin-top:30px;
      }
      .error{
          color: red;
          text-align: center;
      }
    </style>

    <title>Sign Up</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">

        <a href="index.php" class="navbar-brand">Voting with Blockchain</a> <!-- LOGO -->
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">   <span class="navbar-toggler-icon"></span> 
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">  <!-- Collapsible Navbar -->
          <ul class="offset-sm-1 navbar-nav">
          <li class="nav-item">
            <a href="index.php" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">About us</a>
          </li>
          </ul>  
        </div>
        
      </nav>
    <div class="error">
     <?php
     // if(isset($_POST['signup']))
     {
         // register();
     }
    ?>
    </div>
    <div class="error">
        <?php
        if(isset($_POST['login']))
        {
            login($_POST['username'],$_POST['password']);

            // if($_SESSION['flag']==1){
            //    $_SESSION['crPage']="loginSuccess.php";
            // }
            
        }
        ?>
    </div>
      <!-- LOGIN FORM -->
      <div class="container">
        <div class="display-2 sstyle col-12 text-center">Log In</div>
        <form class="form offset-3 col-6" action="login.php" method="post">
          <div class="form-group">
            <label for="usr">Email</label>
            <input type="email" class="form-control" id="usr" name="username">
          </div>
          <div class="form-group">
            <label for="pwd">Password</label>
            <input type="Password" class="form-control" id="pwd" name="password">
          </div>
          <button type="submit" class="btn btn-primary offset-4 col-4" name="login">Log In</button>
        </form>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>