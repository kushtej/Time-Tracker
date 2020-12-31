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
<li><a href="/Attendence-Management-System/student/student_login.php">Student Signin</a></li>
<li><a href="/Attendence-Management-System/faculty/faculty_login.php">Faculty</a></li>
<li><a href="/Attendence-Management-System/index.php">Home</a></li>

</ul><br><br>

<div class='container' style='margin-top:-50px;'>
<h1>STUDENT SIGNUP PAGE :</h1>
  <form method="POST" class='col-2' action="student_signup.php">
    
    <label for="student_name">Student Name:</label>
    <input type="text" id="student_name" name="student_name" required><br>

    <label for="class">Select a class:</label>
    <select name="class" id="class" required>
    <option value="">Please select an option</option>
        <option value="c1">Class - 01</option>
        <option value="c2">Class - 02</option>
        <option value="c3">Class - 03</option>
    </select><br>

    <label for="email">Enter your email:</label>
    <input type="email" id="email" name="email" required><br>
    
    <label for="father_name">Father Name:</label>
    <input type="text" id="father_name" name="father_name" required><br>

    <label for="mother_name">Mother Name:</label>
    <input type="text" id="mother_name" name="mother_name" required><br>
    

    
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br>

    <label for="repassword">Retype Password:</label>
    <input type="password" id="repassword" name="repassword" required><br><br>

    
  <input type="submit" class='button2' value="Submit">

  </form>
</div>
  <?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    $student_name  = $_POST['student_name'];
    $class = $_POST['class'];
    $email = $_POST['email'];
    $father_name = $_POST['father_name'];
    $mother_name = $_POST['mother_name'];
    $password  = $_POST['password'];
    $repassword = $_POST['repassword'];

   
    if ($password != $repassword)
      {
        echo "<center style='color:red;'>Passwords do not match!</center>";
      }
    else
      {
        $sql = "INSERT INTO student (student_name, password, class, email, father_name, mother_name) VALUES ('$student_name','$password','$class','$email','$father_name','$mother_name')";
        
        if ($conn->query($sql) === true)
          {
            $_SESSION["student_name"] = $student_name;
            header("Location: /Attendence-Management-System/student/student_homepage.php");
          }
        else
          {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
      }
  }

  $conn->close();
?>
</body>
</html>