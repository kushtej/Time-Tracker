<?php

session_start();

$servername = "localhost"; // YOUR SERVER NAME
$dbusername = "root"; // YOUR DATABASE NAME
$dbpassword = "root"; // YOUR PASSWORD
$dbname = "quote_management_system"; // YOUR DATABASE NAME

$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

function footer()
{
  echo "</body>";
  echo "</html>";

  $conn->close();
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>



<nav class="navbar navbar-default">
   <div class="container-fluid">
      <div class="navbar-base">
         <a class="navbar-brand" href="/Quotes/index.php">Project</a>
      </div>
      <ul class="nav navbar-nav">
      <?php if (isset($_SESSION['username']) && trim($_SESSION['username'])!=''){ ?>
          <li class="active"><a href="/Quotes/homepage.php">Quotes</a></li>
          <?php }else{ ?>
         <li class="active"><a href="/Quotes/index.php">Home</a></li>
      <?php } ?>

      </ul>
      <ul class="nav navbar-nav navbar-right">
      <?php if (isset($_SESSION['username']) && trim($_SESSION['username'])!=''){ ?>
          <li><a href="/Quotes/homepage.php?logout=true"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
          <?php }else{  ?>
          <li><a href="/Quotes/signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
          <li><a href="/Quotes/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          <?php  } ?>
      </ul>
   </div>
</nav>
