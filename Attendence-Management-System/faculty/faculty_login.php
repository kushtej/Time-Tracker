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

<li><a href="/Attendence-Management-System/faculty/faculty_signup.php">Faculty Signup</a></li>
<li><a href="/Attendence-Management-System/student/student_login.php">Student</a></li>
<li><a href="/Attendence-Management-System/index.php">Home</a></li>

</ul><br><br>


<div class='container'>
<h1> FACULTY LOGIN PAGE :</h1>
<form  class="col-2" method="POST" action="faculty_login.php">
    <label for="faculty_name">faculty Name:</label>
    <input type="text" id="faculty_name" placeholder="Enter faculty_name" name="faculty_name" value='faculty-01' required><br>
    <br>
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" value='a' required><br>
    <br>
    <input  type="submit" class="button2" name="login" value="login"/>
</form>
</div>

<?php

if(isset($_POST['login']))
{
    $faculty_name = $_POST['faculty_name'];
    $password = $_POST['password'];
    
    $sql     = "SELECT password FROM faculty WHERE faculty_name ='$faculty_name'";
    $result  = $conn->query($sql);
    $content = $result->fetch_assoc();
    
    if ($content['password'] == $password)
      {
        $_SESSION["faculty_name"] = $faculty_name;
        header("Location: /Attendence-Management-System/faculty/faculty_homepage.php");
      }
    else
      {
        echo "Error: " . $sql . "<br>" . $conn->error;
        $sql     = "SELECT count(*) AS count FROM faculty WHERE faculty_name ='$faculty_name'";
        $result  = $conn->query($sql);
        $content = $result->fetch_assoc();
        if ($content['count'] == 1)
          {
            echo "<center style='color:red;'>Incorrect Password! Try again..</center>";
          }
        else
          {
            echo "<center style='color:red;'>faculty_name not found! Try again..</center>";
          }
      }
  }
  $conn->close();
?>

</body>
</html>