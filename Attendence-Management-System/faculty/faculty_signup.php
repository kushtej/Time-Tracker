<?php


include($_SERVER['DOCUMENT_ROOT'] .'/Attendence-Management-System/dbconnection.php');

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Attendence System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/Attendence-Management-System/static/css/main.css">

</head>
<body>


<ul>
<li><a href="/Attendence-Management-System/faculty/faculty_login.php">Faculty Login</a></li>
<li><a href="/Attendence-Management-System/index.php">Home</a></li>

</ul><br><br>


<h1>FACULTY SIGNUP PAGE :</h1>
<div class='container'>

  <form class="col-2" method="POST" action="faculty_signup.php">
    
    <label for="faculty_name">Faculty Name:</label>
    <input type="text" id="faculty_name" name="faculty_name" value="faculty-04" required><br>
    <br>


    <label for="email">Enter your email:</label>
    <input type="email" id="email" name="email" value='asdf@asf.com' required><br>
    <br>


    <label for="password">Password:</label>
    <input type="password" id="password" name="password" value='a' required><br>
    <br>

    <label for="repassword">Retype Password:</label>
    <input type="password" id="repassword" name="repassword" value='a' required><br><br>
    <br>

    
  <input  class='button2' type="submit" value="Submit">

  </form>
</div>
  <?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    $faculty_name  = $_POST['faculty_name'];
    $email = $_POST['email'];

    $password  = $_POST['password'];
    $repassword = $_POST['repassword'];

   
    if ($password != $repassword)
      {
        echo "<center>Passwords do not match!";
      }
    else
      {
        $sql = "INSERT INTO faculty (faculty_name, password, email) VALUES ('$faculty_name','$password','$email')";
        
        if ($conn->query($sql) === true)
          {
            $_SESSION["faculty_name"] = $faculty_name;
            header("Location: /Attendence-Management-System/faculty/faculty_homepage.php");
          }
        else
          {
            // echo "Error: " . $sql . "<br>" . $conn->error;
            echo "<center style='color:red;'>Faculty already created!</center>";
          }
      }
  }

  $conn->close();
?>

</body>
</html>