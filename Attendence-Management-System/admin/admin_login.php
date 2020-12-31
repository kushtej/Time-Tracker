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
<li><a href="/Attendence-Management-System/faculty/faculty_login.php">Faculty</a></li>
<li><a href="/Attendence-Management-System/student/student_login.php">Student</a></li>


</ul><br><br>


<h1>ADMIN LOGIN PAGE :</h1>
<form method="POST" class='col-2' action="admin_login.php">
    <label for="admin_name">admin Name:</label>
    <input type="text" id="admin_name" placeholder="Enter admin_name" name="admin_name" value="admin" required><br>
    <br>
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" value="admin" required><br>
    <br>
    <input  type="submit" class='button2' name="submit">
</form>

<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    $admin_name = $_POST['admin_name'];
    $password = $_POST['password'];
    
    $sql     = "SELECT admin_password FROM admin WHERE admin_name ='$admin_name'";
    $result  = $conn->query($sql);
    $content = $result->fetch_assoc();
    
    if ($content['admin_password'] == $password)
      {
        $_SESSION["admin_username"] = $admin_name;
        header("Location: /Attendence-Management-System/admin/admin_homepage.php");
      }
    else
      {
        //echo "Error: " . $sql . "<br>" . $conn->error;
        $sql     = "SELECT count(*) AS count FROM admin WHERE admin_name ='$admin_name'";
        $result  = $conn->query($sql);
        $content = $result->fetch_assoc();
        if ($content['count'] == 1)
          {
            echo "<center style='color:red;'>Incorrect Password! Try again..</center>";
          }
        else
          {
            echo "<center style='color:red;'>Admin name not found! Try again..</center>";
          }
      }
  }
  $conn->close();

?>

</body>
</html>