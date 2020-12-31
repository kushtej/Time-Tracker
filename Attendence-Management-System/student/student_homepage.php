<?php



include($_SERVER['DOCUMENT_ROOT'] .'/Attendence-Management-System/dbconnection.php');

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Attendence System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="/Attendence-Management-System/static/css/main.css">

</head>
<body>

<?php if(!isset($_SESSION["student_name"])){echo "access not permitted";exit;} ?>


<?php
  function logout() {
    session_destroy();
    header("Location: /Attendence-Management-System/student/student_login.php");   
  }

  if (isset($_GET['logout'])) {
    logout();
  }
?>



<ul>
  <li><a href="/Attendence-Management-System/student/student_homepage.php?logout=true">Logout</a></li>
</ul><br><br>


<div class='container'>
<h1>Student Homepage</h1>
<h3>Welcome <?php echo $_SESSION["student_name"] ?> </h3>


<div style='margin-left:480px'>
<h3 style="margin-left:80px;">Attendence : </h3>

<?php
$session_student_name = $_SESSION['student_name'];

$sql= "SELECT s.acc_id,s.student_name,s.class,a.present_date,a.present FROM student s, attendence a WHERE s.acc_id=a.student_id AND s.student_name='$session_student_name'";
$result  = $conn->query($sql);
echo $conn->error;



if ($result->num_rows > 0) {

    echo "<table>";
    echo "<tr>";
    echo '<th>Student-ID</th><th>Student class</th><th>Date</th><th>Present</th></tr>';

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["acc_id"] . "</td>";
        echo "<td>"  . $row["class"] . "</td>";
        echo "<td>"  . $row["present_date"] . "</td>";
        echo "<td>";
        if($row["present"] == 0){echo "Absent";}else{echo "Present";}
         echo "</td></tr>";
    }
} else echo "<center style='color:red;margin-left:-550px;'>Attendence not yet Regularized!</center>";
echo "</table>";
$conn->close();

?>
</div>
</div>
</body>
</html>