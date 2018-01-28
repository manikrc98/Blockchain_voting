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
      #block{
        display: block;
      }
      #none{
        display: none;
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
        

        <div class="col-sm-8" action="/action_page.php" id="alrdlog">
         <label for="already" class="text-white offset-8">Already have an account?</label>
         <button onclick="login_visible()" type="button" class="btn btn-warning ml-3">Login</button>
         </div>
      </nav>
      <!-- SIGN UP FORM -->
      <div class="container" id="block">
        <div class="display-2 sstyle col-12 text-center ">Sign Up</div>
        <form class="mt-5 form offset-3 col-6 mb-5" action="/action_page.php">
        <div class="form-group">
          <label for="usr">Name </label>
          <input type="text" class="form-control" id="usr">
        </div>
        <div class="form-group">
          <label for="email">Email </label>
          <input type="email" class="form-control" id="email">
        </div>
        <div class="form-group">
          <label for="pwd">Password</label>
          <input type="Password" class="form-control" id="pwd">
        </div>
        <div class="form-group">
          <label for="cpwd">Confirm Password</label>
          <input type="Password" class="form-control" id="cpwd">
        </div>
        <div class="form-group">
          <label for="country">Country</label>
          <select id="country" class="form-control">
            <option selected>India</option>
            <option>USA</option>
            <option>UK</option>
          </select>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="checkbox" id="autoSizingCheck2">
        <label class="form-check-label" for="autoSizingCheck2">
          Remember me
        </label>
        </div>
        <button type="submit" class="btn btn-primary mt-5 col-12 text-center">Sign in</button>
        </form>
      </div>

      <!-- LOGIN FORM -->
      <div class="container" id="none">
        <div class="display-2 sstyle col-12 text-center">Log In</div>
        <form class="form offset-3 col-6" action="/action_page.php">
          <div class="form-group">
            <label for="usr">Username</label>
            <input type="email" class="form-control" id="usr">
          </div>
          <div class="form-group">
            <label for="pwd">Password</label>
            <input type="Password" class="form-control" id="pwd">
          </div>
          <a href="login_success.php"><button class="btn btn-primary offset-4 col-4">Log In</button></a>
        </form>
      </div>
    <script>
      function login_visible()
      {
          document.getElementById("block").style.display="none";
          document.getElementById("none").style.display="block"
          document.getElementById("alrdlog").style.display="none";
      }
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>