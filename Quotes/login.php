<div class="menu">
<?php include 'base.php';?>
</div>



<div class="container">
  <h2> LOGIN PAGE :</h2>
  <form method="POST" action="login.php">
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" required>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required>
    </div>
      <a class="nav-link" href="/Quotes/forgot_password.php">Forgot Password</a><br><br>

    <input  type="submit" name="submit" class="btn btn-default">
  </form>

</div>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    $username = $_POST['username'];
    $password = $_POST['pwd'];
    
    $sql     = "SELECT password FROM users WHERE username ='$username'";
    $result  = $conn->query($sql);
    $content = $result->fetch_assoc();
    
    if ($content['password'] == $password)
      {
        $_SESSION["username"] = $username;
        header("Location: /Quotes/homepage.php");
      }
    else
      {
        $sql     = "SELECT count(*) AS count FROM users WHERE username ='$username'";
        $result  = $conn->query($sql);
        $content = $result->fetch_assoc();
        if ($content['count'] == 1)
          {
            echo "<center style='color:red;'>Incorrect Password! Try again..</center>";
          }
        else
          {
            echo "<center style='color:red;'>Username not found! Try again..</center>";
          }
      }
  }
  footer();
?>

