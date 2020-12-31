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

<?php if(!isset($_SESSION["admin_username"])){echo "access not permitted";exit;} ?>

<?php
  function logout() {
    session_destroy();
    header("Location: /Attendence-Management-System/admin/admin_login.php");   
  }

  if (isset($_GET['logout'])) {
    logout();
  }
?>


<ul>
<li><a href="/Attendence-Management-System/admin/admin_homepage.php?logout=true">Logout</a></li>


</ul><br><br>



<div class='container'>
<h1>Admin Homepage</h1>


<?php echo"<h3>Welcome ".$_SESSION['admin_username']. "</h3>"; ?>

<form method="POST" class='col-2' action="admin_homepage.php">
    
    
    <label for="faculty_name">Select A Faculty:</label>

    <select name="faculty_name" id="faculty_name" required>
    <option value="">Please select an option</option>
        
    <?php
        $sql     = "SELECT * FROM faculty";
        $result  = $conn->query($sql);

        if ($result->num_rows> 0)
        {
        while($row = $result->fetch_assoc())
        {
            echo '<option value="' . $row['faculty_name'] . '">'. $row['faculty_name'] .'</option>';
        }
        }

    ?>
    </select><br>

    <label for="class">Select A class:</label>
    <select name="class" id="class">
        <option disabled="disabled" selected="selected">Select an option.</option>
        <option value="c1">Class - 01</option>
        <option value="c2">Class - 02</option>
        <option value="c3">Class - 03</option>
    </select><br><br>

    
  <input type="submit" class='button3' value="Submit">

  </form>


  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    
    $faculty_name = $_POST['faculty_name'];
    $class = $_POST['class'];

    $sql     = "SELECT acc_id FROM faculty WHERE faculty_name ='$faculty_name'";
    $result  = $conn->query($sql);
    $content = $result->fetch_assoc();

    $faculty_id = $content['acc_id'];


    $sql = "UPDATE faculty SET faculty_class ='$class' WHERE acc_id = '$faculty_id'";
    
    if ($conn->query($sql) === true)
      {
        echo '<script>alert("Faculty class assigned")</script>';
      }
    else
      {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
  }
  $conn->close();

?>

</div>

</body>
</html>