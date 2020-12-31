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

<?php if(!isset($_SESSION["faculty_name"])){echo "access not permitted";exit;} ?>


<?php
  function logout() {
    session_destroy();
    header("Location: /Attendence-Management-System/faculty/faculty_login.php");   
  }

  if (isset($_GET['logout'])) {
    logout();
  }
?>


<ul>
  <li><a href="/Attendence-Management-System/faculty/faculty_student_details.php?logout=true">Logout</a></li>
  <li><a href="/Attendence-Management-System/faculty/faculty_homepage.php">Hompage</a></li>
</ul><br><br>

<div >

<h1 style='text-align:center'>Student Details</h1>
<h3 style='text-align:center'>Teacher : <?php echo $_SESSION["faculty_name"] ?> </h3>

<?php
$session_faculty_name = $_SESSION['faculty_name'];

$sql     = "SELECT * FROM student WHERE class = (SELECT faculty_class FROM faculty WHERE faculty_name='$session_faculty_name');";
$result  = $conn->query($sql);


echo "<table style='margin-left:430px;'>";
echo "<tr>";
echo "<th>STUDENT NAME</th><th>EMAIL</th><th>FATHER NAME</th><th>MOTHER NAME </th></tr>";
if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["student_name"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["father_name"] . "</td>";
        echo "<td>" . $row["mother_name"] . "</td></tr>";
    }
} else echo "Table is Empty";
echo "</table>";
 
  $conn->close();
?>
</div>

</body>
</html>