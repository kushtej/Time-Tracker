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

