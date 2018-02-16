<?php include "backend/connection.php";?>
<?php include
    "backend/functions.php";
    session_start();
?>
<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Blockchain Voting</title>
  </head>
  <body>
     <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">

        <a href="index.php" class="navbar-brand text-center">Voting with Blockchain</a> <!-- LOGO -->
        
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
          <li class="nav-item">
            <a href="#" class="offset-6 font-weight-bold nav-link text-warning ">Your Campaigns</a>
          </li>
          </ul>
        </div>
         <form action="loginSuccess.php" method="post">
         <div class="dropdown">
        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['$userName']; ?></button>
        <div class="dropdown-menu dropdown-menu-right">
            <button class="dropdown-item" type="submit" name="edit">Edit Profile</button>
            <button class="dropdown-item" type="submit" name="logout">Logout</button>
        </div>
        </div>
         </form>

      </nav>


      

      <!-- CAMPAIGN CARDS -->
      <div class="row m-0 mb-5">
        <div class="col-sm-4 mt-3">
          <div class="card h-100 bg-warning">
            <div class="card-header">Recently Added</div>
            <!-- <img class="card-img-top p-2" src="images/university.jpg" style="width:400px;height:250px" alt="Card image cap"> -->
              <div class="card-body">
                <h5 class="card-title">University Course Voting</h5>
                <p class="card-text h-50">A voting campaign to understand student's opinions for introducing a new subject in their designated course.</p>
                <a href="#" class="btn btn-light w-25">Vote</a>
              </div>
          <div class="card-footer">79 Responses</div>
        </div>
          </div>

          <div class="col-sm-4 mt-3">
          <div class="card h-100 bg-success">
            <div class="card-header">Recently Added</div>
            <!--<img class="card-img-top" src="..." alt="Card image cap"> -->
              <div class="card-body">
                <h5 class="card-title">State Election Voting</h5>
                <p class="card-text h-50">Voting campaign to choose our chief minister from the participating candidates.</p>
                <a href="election.php" class="btn btn-light w-25">Vote</a>
              </div>
              <div class="card-footer">1449 Responses</div>
              </div>
          </div>

          <div class="col-sm-4 mt-3">
          <div class="card h-100 bg-dark text-white">
            <div class="card-header">Last Week</div>
            <!--<img class="card-img-top" src="..." alt="Card image cap"> -->
              <div class="card-body">
                <h5 class="card-title">Global Policy Voting</h5>
                <p class="card-text h-50">Voting campaign to elevate the concern regarding the change in climate</p>
                <a href="#" class="btn btn-light w-25">Vote</a>
              </div>
              <div class="card-footer">14249 Responses</div>
              </div>
          </div>

          <div class="col-sm-4 mt-3">
          <div class="card h-100 bg-primary">
            <div class="card-header">Last Week</div>
            <!--<img class="card-img-top" src="..." alt="Card image cap"> -->
              <div class="card-body">
                <h5 class="card-title">Vote for special women law </h5>
                <p class="card-text h-50">Voting campaign to support women, by introducing a special law for them.</p>
                <a href="#" class="btn btn-light w-25">Vote</a>
              </div>
              <div class="card-footer">139 Responses</div>
              </div>
          </div>
      </div>

         <?php
         if(isset($_POST['logout']))
             logout();
         ?>
    <!-- Optional JavaScript -->
    <script src="./index.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>