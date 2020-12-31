<?php

session_start();

$servername = "localhost"; // YOUR SERVER NAME
$dbusername = "root"; // YOUR DATABASE NAME
$dbpassword = "root"; // YOUR PASSWORD
$dbname = "attendence_system"; // YOUR DATABASE NAME

$conn = mysqli_connect($servername, $dbstudent_name, $dbpassword, $dbname);

if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

?>
