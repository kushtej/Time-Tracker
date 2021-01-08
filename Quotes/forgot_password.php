<div class="menu">
<?php include 'base.php';?>
</div>



<div class="container">
  <h2> FORGOT PASSWORD :</h2>
  <form method="POST" action="forgot_password.php">
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" required>
    </div>
    <input  type="submit" name="submit" class="btn btn-default">
  </form>
</div>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    $username = $_POST['username'];
    $sql     = "SELECT security_question,security_answer FROM users WHERE username ='$username'";
    $result  = $conn->query($sql);
    $content = $result->fetch_assoc();
    
    if (isset($content['security_question']))
    {
      $_SESSION["forgot_username"] = $username;
      header("Location: /Quotes/security_question.php");
    }
    else
    {
      echo "<center style='color:red;'>Username not found! Try again..</center>";
    }
  }
  footer();
  $conn->close();
?>

