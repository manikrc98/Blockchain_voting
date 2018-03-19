<?php
//namespace src\be\kunstmaan\multichain;
  include "backend/connection.php";
?>
<?php 

  include "backend/functions.php";
    session_start();
    print_r($_SESSION);
         if(isset($_POST['logout']))
             logout();
?>
<?php
// use be\kunstmaan\multichain\MultichainClient;
// use be\kunstmaan\multichain\MultichainHelper;

    //  $client = new MultichainClient('localhost:9254','akki','akshatah',3);
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
    <style type="text/css">
      body{
        overflow-x:hidden;
      }
    </style>
    <title>Blockchain Voting</title>
  </head>
  <body>
  
     <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">

        <a href="index.php" class="navbar-brand text-center">Voting with Blockchain</a> <!-- LOGO -->
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">   <span class="navbar-toggler-icon"></span> 
        </button>
        <div class="collapse navbar-collapse col-8" id="collapsibleNavbar">  <!-- Collapsible Navbar -->
          <ul class="offset-sm-1 navbar-nav">
          <li class="nav-item">
            <a href="index.php" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">About us</a>
          </li>
          <li class="nav-item">
            <a href="#" class="offset-6 font-weight-bold nav-link text-warning">Your Campaigns</a>
          </li>
          </ul>
        </div>
         <form action="loginSuccess.php" method="post" class="ml-5">
         <div class="dropdown">
        <button type="button" class="ml-5 btn btn-warning dropdown-toggle text-center" data-toggle="dropdown"><?php echo $_COOKIE['name']; ?></button>
        <div class="dropdown-menu dropdown-menu-right">
            <button class="dropdown-item" type="button" name="edit">Edit Profile</button>
            <button class="dropdown-item" type="button" name="create_camp" onclick="window.location.href='create_camp.php'">Create Campaign</button>
            <button class="dropdown-item" type="button" name="dashboard" onclick="window.location.href='Dashboard.php'">Dashboard</button>
            <button class="dropdown-item" type="submit" name="logout">Logout</button>
        </div>
        </div>
         </form>

      </nav>

      


      
      <div class="row m-0 mb-5">
      <!-- CAMPAIGN CARDS -->
      <?php 
        $query = "select * from campaign";
        $result = $conn->query($query);
        query_test($result);
        if($result)
        {
          foreach($result as $i)
          {
            if($i['campCat'] == 'Political')
              $bgcolor = 'bg-success';
            else if($i['campCat'] == 'Social')
              $bgcolor = 'bg-dark text-white';
            else if($i['campCat'] == 'Personal')
              $bgcolor = 'bg-warning';
            else if($i['campCat'] == 'Organisational')
              $bgcolor = 'bg-secondary text-white';
            else
              $bgcolor = 'bg-light';
          echo "<div class='col-sm-4 mt-3'>
                  <div class='card h-100 " . $bgcolor . " '>
      
                    <div class='card-header'>" . $i['campDd'] . "</div>
                      <div class='card-body'>
                        <h5 class='card-title'>Vote for " . $i['campName'] . "</h5>
                        <p class='card-text h-48'>".$i['campDesc']."</p>
                        <a href='election.php?id=" . $i['campId'] . "' class='btn btn-light w-25'>Vote</a>
                      </div>
                      <div class='card-footer'>Candidates: ". $i['candNum'] ."</div>
                      </div>
                  </div>";
          }
        }
      ?>
      </div>
        
    <!-- Optional JavaScript -->
    <script src="./index.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>