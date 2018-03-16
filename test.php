<?php
include "backend/connection.php";?>
<?php include
    "backend/functions.php";
    session_start();
    print_r($_SESSION);
    print_r($_POST);
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
  <style>
      .sstyle{
        margin-top:50px;
      }
      label{
      	font-weight: bold;
      }
      #create2{
      	display: none;
      }
      #create3{
      	display: none;
      }
      .dot {
  height: 20px;
  width: 20px;
  border: solid 1px #FFC107;
  border-radius: 50%;
  display: inline-block;
}

  </style>
  </head>
  <body>
<form class="form col-8 mt-4" action="test.php" method="POST">
     	<table class="table table-hover table-bordered text-center">
     		<thead class="thead-dark">
     			<th>Candidate Number</th>
     			<th>Candidate Name </th>
     			<th>Candidate Age </th>
     			<th>Candidate Photo </th>
     		</thead>
        <?php
          // AUTO TABLE GENERATION
          $rows = 3;
          $i=1;
          while($i<=$rows)
          {
            echo "<tr>
            <td>" .$i. "</td>
            <td><input type='text' name='cN" .$i."'></input></td>
            <td><input type='Number' name='cAg" .$i."'></input></td>
            <td><input type='file' name='cImg".$i."'></input></td>
            </tr>";
            $i++;
          }
        ?>
     	</table>
     	<button type="Submit" class="btn btn-primary mt-5 offset-10 col-2" name="Next2">Next</button>
     </form>
<?php
if(isset($_POST['Next2']))
{
    $rows = 3;
    $i=1;
    while($i<=$rows)
    {
      $cand = 'cand' . $i;
      $candAge = $cand . 'age';
      $candN = 'cN' . $i;
      $candA = 'cAg' . $i;
      $_SESSION[$cand] = $_POST[$candN];
      $_SESSION[$candAge] = $_POST[$candA];
      $i++;  
    }

}
$rows = 3;
      $i=1;
      while($i<=$rows)
      {
        $cand = 'cand' . $i;
        $candAge = $cand . 'age';
        $candN = 'cN' . $i;
        $candA = 'cAg' . $i;
        $_SESSION[$cand] = $_POST[$candN];
        $_SESSION[$candAge] = $_POST[$candA];
        $i++;  
      }
?>


</script> -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      </body>
      </html>