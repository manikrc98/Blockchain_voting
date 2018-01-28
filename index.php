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
      .gold
      {
        background-color: #FFC107;
        color:white;
        padding: 0 4px 0 4px;
        font-size: 110px;
        box-shadow: 2px 4px 3px #888888;
      }
      .gold:hover
      {
        box-shadow: 2px 6px 4px #888888;
        cursor: pointer;        
      }
     </style>
  </head>
  <body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">

        <a href="#" class="navbar-brand">Voting with Blockchain</a> <!-- LOGO -->
        
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
        

        <form class="form-inline col-sm-8" action="/action_page.php">
         <label for="usr" class="text-white mr-2">Username:</label>
         <input type="text" name="form-control" id="usr">
         <label for="pwd" class="text-white ml-4 mr-2">Password:</label>
         <input type="Password" class="form-control" id=pwd>
         <a href="login_success.php"><button type="button" class="btn btn-warning ml-4">Login</button></a>
         <a href="signup.php"><button type="button" class="btn btn-light ml-2">Signup</button></a>
         </form>
      </nav>

    <div class="container-fluid">
        <div class="display-1 fstyle text-center">
          Your every vote counts,<br> <span class="gold">with blockchain</span>
        </div>
        <div class="mt-5 ml-5"> 
        <button type="button" class="btn btn-primary offset-4 mr-2">Start New Campaign</button>         
        <em><strong>or</strong></em>
        <button type="button" class="btn btn-dark ml-2">Vote Now</button>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>