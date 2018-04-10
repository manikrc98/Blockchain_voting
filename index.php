<?php include "backend/connection.php";?>
<?php
    include "backend/functions.php";
    session_start();
    if(isset($_COOKIE['name']))
    {
      echo "<script>window.location.assign('loginSuccess.php'); </script>";
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <title>Voting with Blockchain</title>
    <style>
      .fstyle{
        font-family: lato;
        margin-top:70px;
      }
      .error{
          color: red;
          text-align: center;
          font-weight: bold;
          /*font-family:Arial;*/
      }
      .gold
      {
        background-color: #FFC107;
        color:white;
        padding: 0 4px 0 4px;
        font-size: 3rem;
        box-shadow: 2px 4px 3px #888888;
      }
      .gold:hover
      {
        box-shadow: 2px 6px 4px #888888;
        cursor: pointer;        
      }
      .head
      {
        background-color: #FFFFFF;
        color:#343A40;
        padding: 0 4px 0 4px;
        font-size: 3rem;
        box-shadow: 2px 4px 3px #888888;
      }
      .head:hover
      {
        box-shadow: 2px 6px 4px #888888;
        cursor: pointer;        
      }

            .display-1{
                  font-size: 3rem;
                }
            @media (min-width: 576px) {
              .display-1{
                  font-size: 4rem;
                }
              .gold{
                  font-size: 4rem;
                }
            }
  
            @media (min-width: 768px) {
                  .display-1{
                  font-size: 4.5rem;
                }
                .gold{
                    font-size: 4.5rem;
                  }
                  
              .head{
                  border: solid #343A40 5px; 
              } 
            }

            @media (min-width: 992px) {
              .display-1{
                  font-size: 5.5rem;
                }
                .gold{
                    font-size: 6rem;
                  } 
            }

            @media (min-width: 1200px) {
              .display-1{
                  font-size: 7rem;
                }
                .gold{
                    font-size: 7rem;
                  } 
            }
     </style>
  </head>
  <body background="web-b1g.png">
    <!-- NAVBAR -->
    <nav class="col-12 navbar navbar-expand-sm bg-dark navbar-dark sticky-top">

        <a href="index.php" class="col-3 col-sm-5 col-md-3 col-lg-2 navbar-brand mr-3">Voting with Blockchain</a> <!-- LOGO -->
        
        <button class="col-2 navbar-toggler navbar-toggler-icon" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">   
        </button>

        <div class="collapse navbar-collapse offset-md-1" id="collapsibleNavbar">  <!-- Collapsible Navbar -->
          <ul class="navbar-nav col-12">
          <li class="nav-item mr-2">
            <a href="index.php" class="nav-link">Home</a>
          </li>
          <li class="nav-item mr-2">
            <a href="#" class="nav-link">About us</a>
          </li>
          <li class="nav-item mr-2">
            <a href="login.php" class="nav-link d-lg-block" data-toggle="collapse" data-target="#demo">Login Now</a>
          </li>
          <li class="nav-item mr-2">
            <a href="signup.php" class="nav-link">Sign Up</a>
          </li>
          </li>
          <li class="nav-item mr-2">
            <?php
              // if(isset($_COOKIE['name']))
              {
                if(isset($_POST['login'])) {
                  login($_POST['username'],$_POST['password']);
              }
                // rememberme();
                // setcookie("test","abc",(time()+(60*60*1)));
                // test();
                // echo "welcome ". $_COOKIE['name'];
                // echo $_COOKIE['test'];
              }
            ?>
          </li>
          </ul>  
        </div> 
        
    </nav>
    
<!-- Login -->
    <div class="collapse" id="demo">
     <form class="col-xl-12 form-inline d-none d-lg-block bg-info pt-2 pb-2" action="index.php" method="post">
         <div class="offset-xl-2 row">
          <label for="usr" class="mr-2 text-white">Email:</label>
         <input type="text"  id="usr" name="username">
         <label for="pwd" class="ml-4 mr-2 text-white">Password:</label>
         <input type="Password" class="form-control" id=pwd name="password">
         <button type="submit" class="btn btn-warning ml-4" name="login" value="Submit">Login</button>
         <a href="signup.php"><button type="button" class="btn btn-light ml-2">Signup</button></a>
         <!-- <input type="form-checkbox" name="rm">Remember me</input> -->
         <div class="form-check ml-2">
          <label class="form-check-label text-white">
            <input type="checkbox" name="rm" class="form-check-input" value="">Remember Me
          </label>
        </div>
         <!-- <?php //rememberme(); ?> -->
          </div>
      </form>

    </div>
    <?php print_r($_COOKIE); ?>
    <div class="container-fluid">
        <div class="display-1 fstyle text-center">
            <span class="display-1 head">Your vote counts,</span><br> <span class="gold">with blockchain</span>
        </div>
        <div class="row mt-5 col-12 mb-4"> 
        <a href="create_camp.php" role="button" class="btn btn-primary offset-2 col-9 offset-sm-2 col-sm-4 offset-md-3 col-md-3 col-lg-3 offset-xl-4 col-xl-2">Start New Campaign</a>         
        <div class="col-12 col-sm-1 offset-sm-0 text-center mt-2 "><em><strong>or</strong></em></div>
        <a href="login.php" class="btn btn-dark offset-4 col-5 offset-sm-0 col-sm-3 col-md-3 col-lg-2 col-xl-1" role="button">Vote Now</a>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>