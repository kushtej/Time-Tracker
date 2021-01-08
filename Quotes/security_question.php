<div class="menu">
<?php include 'base.php';?>
</div>

<?php if(!isset($_SESSION["forgot_username"])){echo "access not permitted";exit;} ?>


<div class="container">
  <h2> SECURITY QUESTION :</h2>
  <form method="POST" action="security_question.php">
    <div class="form-group">
<?php
    $session_username = $_SESSION['forgot_username'];

    $sql     = "SELECT security_question,security_answer FROM users WHERE username ='$session_username'";
    $result  = $conn->query($sql);
    $content = $result->fetch_assoc();
    echo "<h4 for='security-question' >".$content['security_question']."</h4>";
?>
      <input type="text" class="form-control" id="security-answer" placeholder="Enter security answer" name="sa" required>
    </div>
    <input  type="submit" name="submit" class="btn btn-default">
  </form>
</div>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    $answer = $_POST['sa'];
    $username = $_SESSION["forgot_username"];

    $sql     = "SELECT security_question,security_answer FROM users WHERE username ='$username'";
    $result  = $conn->query($sql);
    $content = $result->fetch_assoc();
    
    if($content['security_answer'] == $answer)
    {
        header("Location: /Quotes/change_password.php");
    }
    else
    {
      echo "<center style='color:red;'>Invalid answer! Try again..</center>";
    }
  }
  footer();
  $conn->close();

?>

