<div class="menu">
<?php include 'base.php';?>
</div>

<?php if(!isset($_SESSION["forgot_username"])){echo "access not permitted";exit;} ?>


<div class="container">
  <h2> Update PASSWORD :</h2>
  <form method="POST" action="change_password.php">
  <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
    </div>
    <div class="form-group">
      <label for="pwd">Retype Password:</label>
      <input type="password" class="form-control" id="repassword" placeholder="Enter password" name="repassword" required>
    </div>
    <input  type="submit" name="submit" class="btn btn-default">
  </form>
</div>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')

  {
    if ($_POST['password'] != $_POST['repassword'])
    {
      echo "<center style='color:red;'>Passwords do not match! Try again..</center>";
    }
  else
    {
        $username = $_SESSION['forgot_username'];
        $password = $_POST['password'];
        $sql = "UPDATE users SET password = '$password' WHERE username = '$username'";
        
        if ($conn->query($sql) === true)
            {
                $_SESSION["username"] = $username;
                header("Location: /Quotes/homepage.php");
            }
        else
            {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }  
    }
  footer();
  $conn->close();
?>

