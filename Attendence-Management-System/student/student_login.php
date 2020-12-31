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
<li><a href="/Attendence-Management-System/student/student_signup.php">Student Signup</a></li>
<li><a href="/Attendence-Management-System/faculty/faculty_login.php">Faculty</a></li>
<li><a href="/Attendence-Management-System/index.php">Home</a></li>


</ul><br><br>




<div class='container'>

<h1>STUDENT LOGIN PAGE :</h1>
<form method="POST" class="col-2" action="student_login.php">
    <label for="student_name">Student Name:</label>
    <input type="text" id="student_name" placeholder="Enter student_name" name="student_name" value='student-01' required><br>
    <br>
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" value='a' required><br>
    <br>
    <input  type="submit" class='button2' name="submit">
</form>
</div>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    $student_name = $_POST['student_name'];
    $password = $_POST['password'];
    
    $sql     = "SELECT password FROM student WHERE student_name ='$student_name'";
    $result  = $conn->query($sql);
    $content = $result->fetch_assoc();
    
    if ($content['password'] == $password)
      {
        $_SESSION["student_name"] = $student_name;
        header("Location: /Attendence-Management-System/student/student_homepage.php");
      }
    else
      {
        //echo "Error: " . $sql . "<br>" . $conn->error;
        $sql     = "SELECT count(*) AS count FROM student WHERE student_name ='$student_name'";
        $result  = $conn->query($sql);
        $content = $result->fetch_assoc();
        if ($content['count'] == 1)
          {
            echo "<center style='color:red;'>Incorrect Password! Try again..</center>";
          }
        else
          {
            echo "<center style='color:red;'>student_name not found! Try again..</center>";
          }
      }
  }
  $conn->close();
?>
</body>
</html>