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
  <script src="/Attendence-Management-System/static/js/main.js"></script>

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
  <li><a href="/Attendence-Management-System/faculty/faculty_homepage.php?logout=true">Logout</a></li>
  <li><a href="/Attendence-Management-System/faculty/faculty_student_details.php">View student details</a></li>
</ul><br><br>



<h1>Faculty Homepage</h1>

<div>
<h3>Welcome <?php echo $_SESSION["faculty_name"] ?> </h3>


<h3 style='margin-left:580px;'>Attendence : </h3>

<form method="POST" action="faculty_homepage.php" style='margin-left:400px;' >

<label for="start_date">From:</label>
<input type="date" id="start_date" name="start_date" value="<?php echo date('Y-m-d'); ?>">

<label for="end_date">To:</label>
<input type="date" id="end_date" name="end_date" value="<?php echo date('Y-m-d'); ?>">
<br><br>


<?php
$session_faculty_name = $_SESSION['faculty_name'];
$class_acc_id=array();


$sql     = "SELECT * FROM student WHERE class = (SELECT faculty_class FROM faculty WHERE faculty_name='$session_faculty_name');";
$result  = $conn->query($sql);



if ($result->num_rows > 0) {

  echo "<table>";
echo "<tr>";
echo '<th>Student-ID</th><th>Student Name</th><th>Present<input type="checkbox" name="select-all" id="select-all" /></th>';
echo '<th>Download attendence</th></tr>';

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["acc_id"] . "</td>";
        array_push($class_acc_id,$row["acc_id"]);
        echo "<td>" . $row["student_name"] . "</td>";
        echo '<td> <input type="checkbox" class="roles" name="check_list[]" value="'.$row["acc_id"].'" /></td>';
        echo '<td><input type="submit" value="Download-Attendence-'.$row["acc_id"].'" name="download_attendence"></td></tr>';
    }
} else {
  echo "<center style='color:red;margin-left:-550px;'>Students not yet assigned!</center>";
  $flag=1;

}
echo "</table>";

?>

<br>
<?php
if($flag==0)
  echo '<input type="submit" style="margin-left:150px;" class="button3" value="Regularize" name="submit">';
?>
</form>

</div>

<?php
if(isset($_POST['submit'])){

    $end_date=$_POST['end_date'];
    $end_date=new DateTime($end_date);
    $end_date->modify('+1 day');
    $end_date=$end_date->format('Y-m-d');



    
    $period = new DatePeriod(
      new DateTime($_POST['start_date']),
      new DateInterval('P1D'),
      new DateTime($end_date)
      );

    foreach ($period as $date) {
      $dates[] = $date->format("d-m-y");
    }


    $sql     = "SELECT acc_id FROM faculty WHERE faculty_name ='$session_faculty_name'";
    $result  = $conn->query($sql);
    $content = $result->fetch_assoc();
    $faculty_user_id = $content['acc_id'];
    
    
    for ($i = 0; $i < count($class_acc_id); $i++) {
      for ($j = 0; $j < count($dates); $j++){

        if (in_array($class_acc_id[$i], $_POST['check_list']))
        {
          $sql = "INSERT INTO attendence (student_id, faculty_id, present_date, present) VALUES ('$class_acc_id[$i]','$faculty_user_id','$dates[$j]','1')";
          if ($conn->query($sql) === true)
          {
            // echo 'Done';
          }
        else
          {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
        }
        else
        {
          $sql = "INSERT INTO attendence (student_id, faculty_id, present_date, present) VALUES ('$class_acc_id[$i]','$faculty_user_id','$dates[$j]','0')";
          if ($conn->query($sql) === true)
          {
            // echo 'Done';
          }
        else
          {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
        }
    }
    }
    echo '<script>alert("Attendence Regularized!")</script>';
}


function download_file()
{
    $file = $_SERVER['DOCUMENT_ROOT'] . '/Attendence-Management-System/faculty/file.csv';

    if(!file_exists($file)) die("I'm sorry, the file doesn't seem to exist.");

    $type = filetype($file);
    // Get a date and timestamp
    $today = date("F j, Y, g:i a");
    $time = time();
    // Send file headers
    header("Content-type: $type");


    header("Content-Disposition: attachment;filename=file.csv");
    header("Content-Transfer-Encoding: binary"); 
    header('Pragma: no-cache'); 
    header('Expires: 0');
    // Send the file contents.
    set_time_limit(0);
    ob_clean();
    flush();
    readfile($file);

    exit();

}

if(isset($_POST['download_attendence'])){



  $string=$_POST['download_attendence'];
  if(strlen($string)==21)
      $newstring = substr($string, -1);
  else
      $newstring = substr($string, -2);  
  // print_r($newstring);
  
  $student_id=$newstring;

  $sql     = "SELECT s.acc_id,s.student_name,a.present_date,a.present FROM student s, attendence a WHERE s.acc_id=a.student_id AND s.acc_id=$student_id";
  $result  = $conn->query($sql);


  $file = fopen($_SERVER['DOCUMENT_ROOT'] ."/Attendence-Management-System/faculty/file.csv", "w") or die("Unable to open file!");
  chmod($file, 0777);

  if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
      fputcsv($file, $row);
    }
  }

  fclose($file);

  download_file();
}
$conn->close();
?>

<script>

$("form").submit(function (e) {
  var start_date = $("#start_date").val();
  var end_date = $("#end_date").val();
  if(Date.parse(start_date) > Date.parse(end_date)) {
        alert("Invalid Date")
        e.preventDefault();
    }
});






  // Listen for click on toggle checkbox
$('#select-all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;                        
        });

    } else {
        $(':checkbox').each(function() {
            this.checked = false;                       
        });
    }
});
</script>



</body>
</html>